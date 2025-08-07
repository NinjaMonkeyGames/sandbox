<?php
// PHP logic to handle POST requests for file writing
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    $postData = file_get_contents('php://input');
    $request = json_decode($postData, true);

    if (isset($request['commitMessage'])) {
        $commitMessage = $request['commitMessage'];
        $filePath = '.git/EDIT_COMMITMSG';

        // Check if the .git directory exists before attempting to write
        if (!is_dir('.git')) {
            echo json_encode(['success' => false, 'error' => 'The current directory is not a Git repository.']);
            exit;
        }

        try {
            if (file_put_contents($filePath, $commitMessage) !== false) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => 'Failed to write to file. Check file permissions.']);
            }
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid request. Missing commitMessage.']);
    }
    exit;
}

// PHP functions to get and build the directory tree
function getDirectoryTree($directory) {
    $items = [];
    if (is_dir($directory)) {
        $dirHandle = opendir($directory);
        while (($file = readdir($dirHandle)) !== false) {
            if ($file != '.' && $file != '..') {
                $path = $directory . DIRECTORY_SEPARATOR . $file;
                $items[$file] = is_dir($path);
            }
        }
        closedir($dirHandle);
    }
    return $items;
}

// Function to parse a Markdown file and return its headings as a nested HTML list
function getMarkdownHeadings($filePath) {
    $content = file_get_contents($filePath);
    $lines = explode("\n", $content);

    $stack = []; // Stack to keep track of open lists and their levels
    $html = '';

    foreach ($lines as $line) {
        if (preg_match('/^(#+)\s(.+)/', $line, $matches)) {
            $headingLevel = strlen($matches[1]);
            $headingText = htmlspecialchars(trim($matches[2]));

            // Close any lists from higher levels
            while (!empty($stack) && $stack[count($stack) - 1] >= $headingLevel) {
                array_pop($stack);
                $html .= '</li></ul>';
            }

            // If the current level is higher, open a new list
            if (empty($stack) || $stack[count($stack) - 1] < $headingLevel) {
                $html .= '<ul class="nested-headings">';
                $stack[] = $headingLevel;
            } else {
                $html .= '</li>'; // Close the previous list item
            }
            
            $html .= '<li class="heading" data-path="' . htmlspecialchars($filePath) . '" data-level="' . $headingLevel . '" data-text="' . $headingText . '">' . $headingText;
        }
    }
    
    // Close any remaining open lists
    while (!empty($stack)) {
        array_pop($stack);
        $html .= '</li></ul>';
    }
    
    return $html;
}

// Recursive function to build the nested list with proper hierarchy
function buildListItems($directory, $isRoot = true) {
    $items = getDirectoryTree($directory);
    ksort($items); // Sort the items alphabetically

    $html = $isRoot ? '' : '<ul>';
    
    foreach ($items as $name => $isFolder) {
        $path = htmlspecialchars($directory . DIRECTORY_SEPARATOR . $name);
        $class = $isFolder ? 'folder' : 'file';
        $icon = $isFolder ? '&#x1F4C1;' : '&#x1F4C4;'; // Folder or File emoji icon
        
        $isMarkdown = !$isFolder && pathinfo($name, PATHINFO_EXTENSION) === 'md';
        if ($isMarkdown) {
            $class .= ' markdown';
            $icon = '&#x1F4DC;'; // Document emoji icon
        }

        $html .= '<li class="' . $class . '" data-path="' . $path . '">';
        $html .= '<span class="name">' . $icon . ' ' . htmlspecialchars($name) . '</span>';
        
        if ($isFolder) {
            $html .= buildListItems($directory . DIRECTORY_SEPARATOR . $name, false);
        } else if ($isMarkdown) {
            // Pre-generate markdown headings and hide them. Removed the "hidden" class from here.
            $html .= '<div class="markdown-headings">' . getMarkdownHeadings($path) . '</div>';
        }
        $html .= '</li>';
    }

    $html .= $isRoot ? '' : '</ul>';
    return $html;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commit Message Generator</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800;900&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
            color: #1f2937;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding: 1rem;
        }

        .container {
            background-color: #ffffff;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            border-radius: 1.5rem;
            padding: 2rem;
            max-width: 96rem;
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .card {
            background-color: #f9fafb;
            padding: 1.5rem;
            border-radius: 0.75rem;
            box-shadow: inset 0 2px 4px 0 rgba(0, 0, 0, 0.06);
            border: 1px solid #e5e7eb;
        }
        
        .card-header {
            font-size: 1.25rem;
            font-weight: 700;
            color: #374151;
            margin-bottom: 1.5rem;
        }

        h1 {
            font-size: 2.25rem;
            font-weight: 800;
            text-align: center;
            margin-bottom: 1.5rem;
            color: #111827;
        }
        
        label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #4b5563;
            margin-bottom: 0.25rem;
        }

        input, select, textarea {
            width: 100%;
            padding: 0.5rem;
            border: 1.5px solid #d1d5db;
            border-radius: 0.5rem;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            transition: all 0.15s ease-in-out;
            font-family: 'Inter', sans-serif;
            color: #1f2937;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }

        .flex-row {
            display: flex;
            gap: 0.5rem;
        }

        .flex-row > div {
            flex: 1;
        }
        
        .hidden {
            display: none;
        }

        .file-list {
            list-style: disc;
            list-style-position: inside;
            margin-top: 1rem;
            font-size: 0.875rem;
            color: #374151;
            line-height: 1.5;
        }

        .btn {
            width: 100%;
            padding: 0.75rem;
            border-radius: 0.5rem;
            font-weight: 600;
            font-size: 1.125rem;
            transition: all 0.15s ease-in-out;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transform: scale(1);
        }

        .btn:hover {
            transform: scale(1.02);
        }
        
        .btn-sm {
            padding: 0.5rem;
            font-size: 0.875rem;
        }

        .btn-generate {
            background-color: #10b981;
            color: #ffffff;
        }

        .btn-generate:hover {
            background-color: #059669;
        }

        .btn-copy {
            background-color: #3b82f6;
            color: #ffffff;
        }

        .btn-copy:hover {
            background-color: #2563eb;
        }

        pre {
            white-space: pre-wrap;
            padding: 1rem;
            background-color: #f3f4f6;
            border-radius: 0.5rem;
            border: 1px solid #e5e7eb;
            font-family: 'Fira Code', 'Courier New', Courier, monospace;
            font-size: 0.875rem;
            color: #1f2937;
            height: 24rem;
            overflow: auto;
        }

        .alert-box {
            position: fixed;
            bottom: 1rem;
            right: 1rem;
            background-color: #10b981;
            color: #ffffff;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1-px rgba(0, 0, 0, 0.06);
            z-index: 50;
            animation: fadeInOut 3s forwards;
        }
        
        @keyframes fadeInOut {
            0% { opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { opacity: 0; }
        }
        
        .alert-box.error {
            background-color: #ef4444;
        }

        /* New styles for dynamic entries */
        .file-entry, .reference-entry {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            padding: 1rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            background-color: #ffffff;
        }
        .file-entry-header, .reference-entry-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .file-entry-header h3, .reference-entry-header h3 {
            font-size: 1rem;
            margin: 0;
        }
        .remove-btn {
            background-color: #ef4444;
            color: #ffffff;
            border: none;
            border-radius: 0.25rem;
            padding: 0.25rem 0.5rem;
            cursor: pointer;
        }
        .remove-btn:hover {
            background-color: #dc2626;
        }
        .add-file-action-btn, .add-reference-btn {
            background-color: #f9fafb;
            color: #374151;
            border: 1px dashed #d1d5db;
            padding: 0.75rem;
            border-radius: 0.5rem;
            cursor: pointer;
            text-align: center;
            font-weight: 500;
            transition: all 0.15s ease-in-out;
        }
        .add-file-action-btn:hover, .add-reference-btn:hover {
            background-color: #e5e7eb;
        }
        .add-file-action-btn[disabled], .add-reference-btn[disabled] {
            cursor: not-allowed;
            opacity: 0.5;
            background-color: #f3f4f6;
        }
        
        /* File Explorer Styles */
        .file-explorer {
            border: 1px solid #d1d5db;
            padding: 1rem;
            border-radius: 0.5rem;
            background-color: #ffffff;
            height: 15rem;
            overflow-y: auto;
        }
        .file-explorer ul {
            list-style-type: none;
            padding-left: 15px;
        }
        .file-explorer ul li {
            line-height: 1.5;
            cursor: pointer;
            user-select: none;
        }
        .file-explorer ul li .name {
            display: inline-block;
            padding: 2px 5px;
            border-radius: 3px;
        }
        .file-explorer ul li.selected > .name {
            background-color: #e0e0e0;
        }

        .file-explorer .folder > ul {
            display: none;
        }
        .file-explorer .folder.expanded > ul {
            display: block;
        }
        .file-explorer .markdown-headings {
            display: none;
        }
        .file-explorer .markdown.expanded > .markdown-headings {
            display: block;
        }
        .selected-files-list {
            margin-top: 1rem;
        }
        
        /* New styles for nested headings */
        .nested-headings {
            list-style-type: none;
            padding-left: 15px;
        }
        
        .heading > ul {
            display: none;
        }
        
        .heading.expanded > ul {
            display: block; /* Show child lists when parent is expanded */
        }
        
        .heading {
            position: relative;
        }

        .heading::before {
            content: '+';
            position: absolute;
            left: -15px;
            top: 2px;
            color: #6b7280;
            font-weight: bold;
            display: block;
        }

        .heading.expanded::before {
            content: '-';
        }
        .heading:not(:has(ul))::before {
            content: '';
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Commit Message Generator</h1>
        
        <div class="card">
            <div class="card-header">Commit Header</div>
            <div class="flex-row">
                <div>
                    <label for="commit-type">Type</label>
                    <select id="commit-type" required>
                        <option value="" selected disabled hidden>Select a type...</option>
                        <option value="feat">feat: A new feature</option>
                        <option value="fix">fix: A bug fix</option>
                        <option value="docs">docs: Documentation changes</option>
                        <option value="style">style: Code style changes</option>
                        <option value="refactor">refactor: Code change</option>
                        <option value="perf">perf: Performance improvements</option>
                        <option value="test">test: Adding or updating tests</option>
                        <option value="build">build: Build system changes</option>
                        <option value="ci">ci: CI configuration changes</option>
                        <option value="chore">chore: Other changes</option>
                        <option value="revert">revert: Reverts a previous commit</option>
                    </select>
                </div>
                <div>
                    <label for="scope">Scope</label>
                    <select id="scope" required>
                        <option value="" selected disabled hidden>Select a scope...</option>
                        <option value="core">core</option>
                        <option value="api">api</option>
                        <option value="ui">ui</option>
                        <option value="auth">auth</option>
                        <option value="db">db</option>
                        <option value="deps">deps</option>
                        <option value="tests">tests</option>
                        <option value="config">config</option>
                        <option value="security">security</option>
                        <option value="rebase">rebase</option>
                    </select>
                </div>
                <div>
                    <label for="description">Description</label>
                    <input type="text" id="description" value="" placeholder="Short summary of the change" required>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">File Changes</div>
            <div id="file-entries-container" class="flex-col gap-4">
                <?php
                    // The base directory to start from
                    $startDirectory = '.';

                    // The file explorer HTML, pre-generated by PHP
                    $fileExplorerHtml = '
                        <div class="file-explorer">
                            <ul>' . buildListItems($startDirectory) . '</ul>
                        </div>
                    ';
                    
                    // The HTML for a single file entry, used for both the first and dynamic ones
                    // This uses placeholders for the ID which will be replaced by JavaScript
                    $fileEntryTemplate = '
                        <div class="file-entry" data-id="{id}">
                            <div class="file-entry-header">
                                <h3>File Action #{displayId}</h3>
                                <button class="remove-btn">Remove</button>
                            </div>
                            <div class="flex-row">
                                <div>
                                    <label for="file-action-type-{id}">Action</label>
                                    <select id="file-action-type-{id}" required>
                                        </select>
                                </div>
                                <div style="flex: 2;">
                                    <label>File Explorer</label>
                                    ' . $fileExplorerHtml . '
                                </div>
                            </div>
                            <div class="selected-files-list">
                                <h4>Selected Files:</h4>
                                <ul id="file-list-{id}" class="file-list"></ul>
                            </div>
                            <div>
                                <label for="what-text-{id}" id="what-label-{id}">What?</label>
                                <textarea id="what-text-{id}" placeholder="Describe what was fixed..." rows="2" required></textarea>
                            </div>
                            <div>
                                <label for="why-text-{id}" id="why-label-{id}">Why?</label>
                                <textarea id="why-text-{id}" placeholder="Explain why this fix was necessary..." rows="2" required></textarea>
                            </div>
                        </div>
                    ';

                    // Echo the first file entry with ID 0
                    echo str_replace(['{id}', '{displayId}'], ['0', '1'], $fileEntryTemplate);
                ?>
            </div>
            <button id="add-file-action-btn" class="add-file-action-btn" style="margin-top: 1rem;">
                + Add File Action
            </button>
        </div>
        
        <div class="card">
            <div class="card-header">GitHub API Configuration</div>
            <div>
                <label for="repo-owner">Repository Owner</label>
                <input type="text" id="repo-owner" value="NinjaMonkeyGames" placeholder="e.g., github">
            </div>
            <div style="margin-top: 1rem;">
                <label for="repo-name">Repository Name</label>
                <input type="text" id="repo-name" value="full-stack-development-template" placeholder="e.g., docs">
            </div>
            <div style="margin-top: 1rem;">
                <label for="github-token">Personal Access Token (Optional)</label>
                <input type="text" id="github-token" placeholder="Leave empty for public repos">
            </div>
            <button id="fetch-issues-btn" class="btn btn-generate btn-sm" style="margin-top: 1rem;">
                Fetch Issues
            </button>
        </div>

        <div class="card">
            <div class="card-header">References & Sign-off</div>
            <div id="reference-entries-container" class="flex-col gap-4">
                </div>
            <button id="add-reference-btn" class="add-reference-btn" style="margin-top: 1rem;">
                + Add Reference
            </button>
            <div style="margin-top: 2rem;">
                <div>
                    <label for="sign-off-name">Signed-off-by Name</label>
                    <input type="text" id="sign-off-name" value="Daniel Mallett" placeholder="Your Name" required>
                </div>
                <div style="margin-top: 1rem;">
                    <label for="sign-off-email">Signed-off-by Email</label>
                    <input type="email" id="sign-off-email" value="daniel.mallett@ninjamonkeygames.com" placeholder="your.email@example.com" required>
                </div>
            </div>
        </div>

        <div class="flex-row" style="gap: 1rem;">
            <button id="generate-btn" class="btn btn-generate">
                Generate Commit Message
            </button>
            <button id="copy-btn" class="btn btn-copy">
                Copy to Clipboard
            </button>
        </div>

        <div class="card">
            <div class="card-header"><b>Preview</b></div>
            <pre id="output-message">Click "Generate Commit Message" to see the output here.</pre>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const getById = (id) => document.getElementById(id);
            const getBySelector = (selector, parent = document) => parent.querySelector(selector);
            const getAllBySelector = (selector, parent = document) => parent.querySelectorAll(selector);

            const commitType = getById('commit-type');
            const scope = getById('scope');
            const description = getById('description');
            const signOffName = getById('sign-off-name');
            const signOffEmail = getById('sign-off-email');
            const outputMessage = getById('output-message');
            const generateBtn = getById('generate-btn');
            const copyBtn = getById('copy-btn');
            
            const fileEntriesContainer = getById('file-entries-container');
            const addFileActionBtn = getById('add-file-action-btn');
            const referenceEntriesContainer = getById('reference-entries-container');
            const addReferenceBtn = getById('add-reference-btn');

            // GitHub API config fields
            const repoOwner = getById('repo-owner');
            const repoName = getById('repo-name');
            const githubToken = getById('github-token');
            const fetchIssuesBtn = getById('fetch-issues-btn');

            let issueList = []; // Global array to store fetched issues
            const allActionTypes = ['Fix', 'Update', 'Add', 'Delete'];

            // Store the PHP-generated file explorer HTML template
            const fileEntryTemplateHtml = `<?php echo addslashes(str_replace("\n", "", str_replace("'", "\'", $fileEntryTemplate))); ?>`;
            
            const referenceEntryTemplateHtml = `
                <div class="reference-entry" data-id="{id}">
                    <div class="reference-entry-header">
                        <h3>Reference #{displayId}</h3>
                        <button class="remove-btn">Remove</button>
                    </div>
                    <div class="flex-row">
                        <div>
                            <label for="reference-type-{id}">Reference Type</label>
                            <select id="reference-type-{id}" required>
                                <option value="Reference">Reference</option>
                                <option value="Fixes">Fixes</option>
                                <option value="Closes">Closes</option>
                            </select>
                        </div>
                        <div>
                            <label for="references-{id}">Issue #</label>
                            <select id="references-{id}" required>
                                <option value="" selected disabled>Loading issues...</option>
                            </select>
                        </div>
                    </div>
                </div>
            `;
            
            let fileEntryIdCounter = 1;
            let referenceEntryIdCounter = 0;

            // Function to fetch issues from the GitHub API
            const fetchIssues = async () => {
                const owner = repoOwner.value.trim();
                const name = repoName.value.trim();
                const token = githubToken.value.trim();
                
                if (owner === '' || name === '') {
                    displayAlert('Please provide a repository owner and name.', true);
                    return;
                }

                const url = `https://api.github.com/repos/${owner}/${name}/issues?state=open`;
                
                const headers = {
                    'Accept': 'application/vnd.github.v3+json'
                };
                if (token !== '') {
                    headers['Authorization'] = `token ${token}`;
                }
                
                try {
                    const response = await fetch(url, { headers });
                    if (!response.ok) {
                        const errorData = await response.json();
                        throw new Error(errorData.message || 'Failed to fetch issues.');
                    }
                    const issues = await response.json();
                    
                    issueList = issues.map(issue => ({
                        number: issue.number,
                        title: issue.title
                    }));
                    
                    // Update all existing and future comboboxes
                    getAllBySelector('select[id^="references-"]').forEach(selectElement => {
                        populateIssueCombobox(selectElement);
                    });

                    displayAlert('Successfully fetched open issues.', false);

                } catch (error) {
                    console.error('Error fetching issues:', error);
                    issueList = [];
                    getAllBySelector('select[id^="references-"]').forEach(selectElement => {
                        populateIssueCombobox(selectElement);
                        selectElement.innerHTML = `<option value="" selected disabled>Could not load issues.</option>`;
                    });
                    displayAlert(`Error fetching issues: ${error.message}`, true);
                }
            };
            
            // Function to populate a single combobox with the fetched issues
            const populateIssueCombobox = (selectElement) => {
                selectElement.innerHTML = '<option value="" selected disabled>Select an issue...</option>';
                selectElement.disabled = false;
                if (issueList.length === 0) {
                    selectElement.innerHTML = '<option value="" selected disabled>No open issues found.</option>';
                    selectElement.disabled = true;
                } else {
                    issueList.forEach(issue => {
                        const option = document.createElement('option');
                        option.value = issue.number;
                        option.textContent = `#${issue.number}: ${issue.title}`;
                        selectElement.appendChild(option);
                    });
                }
            };

            // This function builds the full path for a markdown heading, including all its parents
            const getMarkdownHierarchy = (headingItem) => {
                const filePath = headingItem.getAttribute('data-path');
                const headingText = headingItem.getAttribute('data-text');
                const hierarchy = [headingText];
                
                let parentListItem = headingItem.closest('ul.nested-headings')?.parentNode;

                // Traverse up the parent headings
                while (parentListItem && parentListItem.classList.contains('heading')) {
                    hierarchy.unshift(parentListItem.getAttribute('data-text'));
                    parentListItem = parentListItem.closest('ul.nested-headings')?.parentNode;
                }
                
                // Remove the top-level heading from the displayed hierarchy
                const displayedHierarchy = hierarchy.slice(1).join(' :: ');
                return `${filePath} :: ${displayedHierarchy}`;
            };
            
            // Function to handle rendering a file list
            const renderFileList = (files, listElement) => {
                listElement.innerHTML = '';
                if (files.length === 0) {
                    listElement.style.display = 'none';
                } else {
                    listElement.style.display = 'block';
                    files.forEach(file => {
                        const li = document.createElement('li');
                        li.textContent = file;
                        listElement.appendChild(li);
                    });
                }
            };
            
            // Function to attach event listeners to a file explorer
            const attachFileExplorerListeners = (entryElement) => {
                const fileExplorer = getBySelector('.file-explorer', entryElement);
                const fileList = getBySelector('.file-list', entryElement);
                
                fileExplorer.addEventListener('click', (event) => {
                    const clickedItem = event.target.closest('li');
                    if (!clickedItem) return;

                    // Handle folder expansion
                    if (clickedItem.classList.contains('folder')) {
                        clickedItem.classList.toggle('expanded');
                        clickedItem.classList.remove('selected');
                        return;
                    }

                    // Handle markdown file heading expansion/collapse
                    if (clickedItem.classList.contains('markdown')) {
                        clickedItem.classList.toggle('expanded');
                        clickedItem.classList.remove('selected');
                        return;
                    }
                    
                    // Toggle 'selected' class for regular files and headings
                    if (clickedItem.classList.contains('file') || clickedItem.classList.contains('heading')) {
                         // Find the existing item in the file list and remove it if it exists
                        const existingListItems = Array.from(fileList.children);
                        const itemText = clickedItem.classList.contains('heading') ? getMarkdownHierarchy(clickedItem) : clickedItem.getAttribute('data-path');
                        let isAlreadySelected = false;

                        existingListItems.forEach(item => {
                            if (item.textContent === itemText) {
                                item.remove();
                                isAlreadySelected = true;
                                clickedItem.classList.remove('selected');
                            }
                        });

                        // If it wasn't already in the list, add it and mark as selected
                        if (!isAlreadySelected) {
                            const li = document.createElement('li');
                            li.textContent = itemText;
                            fileList.appendChild(li);
                            clickedItem.classList.add('selected');
                        }
                        
                        renderFileList(Array.from(fileList.children).map(li => li.textContent), fileList);
                        event.stopPropagation();
                    }
                });
            };
            
            // Function to add a new file entry
            const addFileEntry = () => {
                const newId = fileEntryIdCounter++;
                const newEntryHtml = fileEntryTemplateHtml
                    .replace(/{id}/g, newId)
                    .replace(/{displayId}/g, newId + 1);
                
                const newEntryElement = document.createElement('div');
                newEntryElement.innerHTML = newEntryHtml;
                fileEntriesContainer.appendChild(newEntryElement.firstElementChild);
                
                // Add event listeners to the new entry's file explorer and remove button
                const addedEntry = getBySelector(`[data-id="${newId}"]`, fileEntriesContainer);
                attachFileExplorerListeners(addedEntry);
                attachFileActionListeners(addedEntry);

                // Add action type options to the new select box
                const actionSelect = getById(`file-action-type-${newId}`);
                populateFileActionTypes(actionSelect);
            };

            // Function to populate file action type dropdowns
            const populateFileActionTypes = (selectElement) => {
                selectElement.innerHTML = '<option value="" selected disabled hidden>Select an action...</option>';
                allActionTypes.forEach(action => {
                    const option = document.createElement('option');
                    option.value = action.toLowerCase();
                    option.textContent = action;
                    selectElement.appendChild(option);
                });
            };
            
            // Function to attach listeners to file action entries
            const attachFileActionListeners = (entryElement) => {
                const removeBtn = getBySelector('.remove-btn', entryElement);
                const actionSelect = getBySelector('select[id^="file-action-type-"]', entryElement);
                const whatLabel = getBySelector('label[id^="what-label-"]', entryElement);
                const whyLabel = getBySelector('label[id^="why-label-"]', entryElement);
                const whatTextarea = getBySelector('textarea[id^="what-text-"]', entryElement);

                removeBtn.addEventListener('click', () => {
                    entryElement.remove();
                });
                
                actionSelect.addEventListener('change', () => {
                    const action = actionSelect.value;
                    let whatText;
                    let whyText;

                    switch (action) {
                        case 'fix':
                            whatText = "Describe what was fixed...";
                            whyText = "Explain why this fix was necessary...";
                            break;
                        case 'update':
                            whatText = "Describe what was updated...";
                            whyText = "Explain why this update was necessary...";
                            break;
                        case 'add':
                            whatText = "Describe what was added...";
                            whyText = "Explain why this addition was necessary...";
                            break;
                        case 'delete':
                            whatText = "Describe what was deleted...";
                            whyText = "Explain why this deletion was necessary...";
                            break;
                        default:
                            whatText = "Describe the change...";
                            whyText = "Explain why this change was necessary...";
                            break;
                    }

                    whatLabel.textContent = `What? (${action})`;
                    whyLabel.textContent = `Why? (${action})`;
                    whatTextarea.placeholder = whatText;
                });
            };
            
            // Function to add a new reference entry
            const addReferenceEntry = () => {
                const newId = referenceEntryIdCounter++;
                const newEntryHtml = referenceEntryTemplateHtml
                    .replace(/{id}/g, newId)
                    .replace(/{displayId}/g, newId + 1);
                
                const newEntryElement = document.createElement('div');
                newEntryElement.innerHTML = newEntryHtml;
                referenceEntriesContainer.appendChild(newEntryElement.firstElementChild);
                
                const addedEntry = getBySelector(`[data-id="${newId}"]`, referenceEntriesContainer);
                attachReferenceListeners(addedEntry);

                // Populate the new issue combobox if issues have been fetched
                const newIssueSelect = getById(`references-${newId}`);
                populateIssueCombobox(newIssueSelect);
            };

            // Function to attach listeners to reference entries
            const attachReferenceListeners = (entryElement) => {
                const removeBtn = getBySelector('.remove-btn', entryElement);
                removeBtn.addEventListener('click', () => {
                    entryElement.remove();
                });
            };

            // Initial setup
            const firstFileEntry = getBySelector('.file-entry');
            attachFileExplorerListeners(firstFileEntry);
            attachFileActionListeners(firstFileEntry);
            const firstActionSelect = getById('file-action-type-0');
            populateFileActionTypes(firstActionSelect);
            addReferenceEntry(); // Add the first reference entry

            // Event listeners for adding new entries
            addFileActionBtn.addEventListener('click', addFileEntry);
            addReferenceBtn.addEventListener('click', addReferenceEntry);
            fetchIssuesBtn.addEventListener('click', fetchIssues);

            // Function to generate the commit message
            const generateCommitMessage = () => {
                const type = commitType.value;
                const selectedScope = scope.value;
                const desc = description.value.trim();
                const name = signOffName.value.trim();
                const email = signOffEmail.value.trim();

                if (!type || !selectedScope || !desc || !name || !email) {
                    displayAlert('Please fill out all required fields.', true);
                    return;
                }

                let header = `${type}(${selectedScope}): ${desc}\n\n`;
                let body = '';
                let references = '';
                let signOff = `Signed-off-by: ${name} <${email}>`;
                
                // Process file action entries
                const fileEntries = getAllBySelector('.file-entry');
                fileEntries.forEach(entry => {
                    const actionType = getBySelector('select[id^="file-action-type-"]', entry).value;
                    const whatText = getBySelector('textarea[id^="what-text-"]', entry).value.trim();
                    const whyText = getBySelector('textarea[id^="why-text-"]', entry).value.trim();
                    const fileList = Array.from(getBySelector('ul.file-list', entry).children).map(li => li.textContent);
                    
                    if (whatText || whyText || fileList.length > 0) {
                        body += `${actionType.charAt(0).toUpperCase() + actionType.slice(1)}:\n\n`;
                        if (whatText) {
                            body += `${whatText}\n\n`;
                        }
                        if (whyText) {
                            body += `${whyText}\n\n`;
                        }
                        if (fileList.length > 0) {
                            body += `Affected files:\n`;
                            fileList.forEach(file => {
                                body += ` - ${file}\n`;
                            });
                            body += '\n';
                        }
                    }
                });

                // Process reference entries
                const referenceEntries = getAllBySelector('.reference-entry');
                const uniqueReferences = new Set();
                referenceEntries.forEach(entry => {
                    const refType = getBySelector('select[id^="reference-type-"]', entry).value;
                    const refNumber = getBySelector('select[id^="references-"]', entry).value;
                    if (refNumber) {
                        const referenceString = `${refType}: #${refNumber}`;
                        uniqueReferences.add(referenceString);
                    }
                });
                
                if (uniqueReferences.size > 0) {
                    references = Array.from(uniqueReferences).join('\n') + '\n\n';
                }

                outputMessage.textContent = `${header}${body}${references}${signOff}`.trim();
            };

            // Event listeners for buttons
            generateBtn.addEventListener('click', generateCommitMessage);

            copyBtn.addEventListener('click', () => {
                const message = outputMessage.textContent;
                if (message.trim() === 'Click "Generate Commit Message" to see the output here.') {
                    displayAlert('No commit message to copy.', true);
                    return;
                }
                navigator.clipboard.writeText(message)
                    .then(() => displayAlert('Commit message copied to clipboard!'))
                    .catch(err => displayAlert('Failed to copy message.', true));
            });

            // Alert box
            const displayAlert = (message, isError = false) => {
                let alertBox = getBySelector('.alert-box');
                if (!alertBox) {
                    alertBox = document.createElement('div');
                    alertBox.classList.add('alert-box');
                    document.body.appendChild(alertBox);
                }
                
                alertBox.textContent = message;
                alertBox.classList.toggle('error', isError);
                alertBox.style.opacity = '1';
                alertBox.style.animation = 'none'; // Reset animation
                setTimeout(() => {
                    alertBox.style.animation = 'fadeInOut 3s forwards';
                }, 10);
            };
        });
    </script>
</body>
</html>