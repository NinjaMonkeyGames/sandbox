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

            // Close any lists from higher or equal levels
            while (!empty($stack) && $stack[count($stack) - 1] >= $headingLevel) {
                $html .= '</li></ul>';
                array_pop($stack);
            }

            // Open a new list if the current level is higher
            if (empty($stack) || $stack[count($stack) - 1] < $headingLevel) {
                $html .= '<ul class="nested-headings">';
                $stack[] = $headingLevel;
            } else {
                $html .= '</li>'; // Close the previous list item if it's at the same level
            }
            
            $html .= '<li class="heading" data-path="' . htmlspecialchars($filePath) . '" data-level="' . $headingLevel . '" data-text="' . $headingText . '"><span>' . $headingText . '</span>';
        }
    }
    
    // Close any remaining open lists
    while (!empty($stack)) {
        $html .= '</li></ul>';
        array_pop($stack);
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
            min-height: 10vh;
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
        
        .description-container {
            display: flex;
            flex-direction: column;
        }
        
        .description-container label {
            margin-bottom: 0;
        }

        .char-counter {
            font-size: 0.75rem;
            color: #6b7280;
            align-self: flex-end;
            margin-top: 0.25rem;
        }
        
        .char-counter.error {
            color: #ef4444;
            font-weight: bold;
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
            list-style: none;
            margin-top: 1rem;
            font-size: 0.875rem;
            color: #374151;
            line-height: 1.5;
            padding-left: 0;
        }
        .file-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-left: 1rem;
            position: relative;
        }
        .file-list li::before {
            content: '•';
            position: absolute;
            left: 0;
            top: 0;
        }
        .remove-file-btn {
            background: none;
            border: none;
            color: #ef4444;
            font-size: 1.25rem;
            cursor: pointer;
            line-height: 1;
            font-weight: bold;
            padding: 0 0.5rem;
            transition: color 0.15s ease-in-out;
        }
        .remove-file-btn:hover {
            color: #b91c1c;
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
            padding: 2px 5px;
            border-radius: 3px;
            user-select: none;
        }
        /* Added hover effect to all list items for better visual feedback */
        .file-explorer ul li:hover {
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
        
        /* Style for the expand/collapse icon on folder and heading items */
        .folder > .name::before, .heading > span::before {
            content: '+';
            position: absolute;
            left: -15px;
            top: 2px;
            color: #6b7280;
            font-weight: bold;
            display: block;
        }
        
        .folder.expanded > .name::before, .heading.expanded > span::before {
            content: '-';
        }
        .heading:not(:has(ul)) > span::before {
             content: '';
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Commit Message Generator</h1>
        
        <!-- Commit Header -->
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
                <div class="description-container">
                    <label for="description">Description</label>
                    <input type="text" id="description" value="" placeholder="Short summary of the change" required>
                    <span id="char-counter" class="char-counter">0 / 50</span>
                </div>
            </div>
        </div>

        <!-- Dynamic File Actions Section -->
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
                                        <option value="" selected disabled hidden>Select an action...</option>
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
                                <textarea id="what-text-{id}" placeholder="Describe what was changed..." rows="2" required></textarea>
                            </div>
                            <div>
                                <label for="why-text-{id}" id="why-label-{id}">Why?</label>
                                <textarea id="why-text-{id}" placeholder="Explain why this change was necessary..." rows="2" required></textarea>
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
        
        <!-- GitHub API Integration for References -->
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

        <!-- References & Sign-off -->
        <div class="card">
            <div class="card-header">References & Sign-off</div>
            <div id="reference-entries-container" class="flex-col gap-4">
                <!-- The first reference entry is created dynamically by JS -->
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

        <!-- Generate/Copy buttons -->
        <div class="flex-row" style="gap: 1rem;">
            <button id="generate-btn" class="btn btn-generate">
                Generate Commit Message
            </button>
            <button id="copy-btn" class="btn btn-copy">
                Copy to Clipboard
            </button>
        </div>

        <!-- Output Section with 'Preview' title -->
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
            const charCounter = getById('char-counter');
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
            const fileEntryTemplate = `
                <div class="file-entry" data-id="{id}">
                    <div class="file-entry-header">
                        <h3>File Action #{displayId}</h3>
                        <button class="remove-btn">Remove</button>
                    </div>
                    <div class="flex-row">
                        <div>
                            <label for="file-action-type-{id}">Action</label>
                            <select id="file-action-type-{id}" required>
                                <option value="" selected disabled hidden>Select an action...</option>
                            </select>
                        </div>
                        <div style="flex: 2;">
                            <label>File Explorer</label>
                            <div class="file-explorer">
                                <ul><?php echo addslashes(str_replace("\n", "", str_replace("'", "\'", buildListItems('.')))); ?></ul>
                            </div>
                        </div>
                    </div>
                    <div class="selected-files-list">
                        <h4>Selected Files:</h4>
                        <ul id="file-list-{id}" class="file-list"></ul>
                    </div>
                    <div>
                        <label for="what-text-{id}" id="what-label-{id}">What?</label>
                        <textarea id="what-text-{id}" placeholder="Describe what was changed..." rows="2" required></textarea>
                    </div>
                    <div>
                        <label for="why-text-{id}" id="why-label-{id}">Why?</label>
                        <textarea id="why-text-{id}" placeholder="Explain why this change was necessary..." rows="2" required></textarea>
                    </div>
                </div>
            `;
            
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
            const MAX_TITLE_LENGTH = 50;
            const MAX_BODY_WRAP_LENGTH = 72;
            
            // Function to sanitize the description input by converting to lowercase
            // and removing characters outside the standard printable ASCII range.
            const sanitizeDescription = () => {
                const inputValue = description.value;
                let sanitizedValue = '';
                for (let i = 0; i < inputValue.length; i++) {
                    const char = inputValue[i];
                    const charCode = char.charCodeAt(0);
                    // Check for printable ASCII characters (from space ' ' to tilde '~')
                    if (charCode >= 32 && charCode <= 126) {
                        sanitizedValue += char;
                    }
                }
                // Convert to lowercase and update the input value
                description.value = sanitizedValue.toLowerCase();
            };

            // Function to update the character counter and enforce the limit
            const updateCharCounter = () => {
                // Ensure input is sanitized before calculation
                sanitizeDescription();

                const typeVal = commitType.value;
                const scopeVal = scope.value;
                const descriptionVal = description.value;
                
                // Calculate the length of the fixed part of the header
                // The format is "type(scope): description"
                const fixedLength = typeVal.length + (scopeVal ? scopeVal.length + 2 : 0) + (scopeVal && descriptionVal ? 2 : 0);
                const totalLength = fixedLength + descriptionVal.length;
                
                let remaining = MAX_TITLE_LENGTH - totalLength;
                charCounter.textContent = `${totalLength} / ${MAX_TITLE_LENGTH}`;
                
                if (totalLength > MAX_TITLE_LENGTH) {
                    // Trim the description to fit
                    const maxDescriptionLength = MAX_TITLE_LENGTH - fixedLength;
                    description.value = descriptionVal.substring(0, Math.max(0, maxDescriptionLength));
                    charCounter.classList.add('error');
                    charCounter.textContent = `${MAX_TITLE_LENGTH} / ${MAX_TITLE_LENGTH}`;
                } else {
                    charCounter.classList.remove('error');
                }
            };

            // Event listeners for real-time character counting and limiting
            commitType.addEventListener('change', updateCharCounter);
            scope.addEventListener('change', updateCharCounter);
            description.addEventListener('input', updateCharCounter);
            
            // Function to handle real-time text wrapping in a textarea
            const realTimeWrap = (event) => {
                const textarea = event.target;
                const lines = textarea.value.split('\n');
                let newText = [];
                
                lines.forEach(line => {
                    let words = line.split(' ');
                    let currentLine = '';
                    
                    for (const word of words) {
                        // Check if the current line plus the new word will be too long
                        if (currentLine.length + (currentLine.length > 0 ? 1 : 0) + word.length > MAX_BODY_WRAP_LENGTH) {
                            // If the word itself is too long, break it
                            if (word.length > MAX_BODY_WRAP_LENGTH) {
                                if (currentLine.length > 0) {
                                    newText.push(currentLine);
                                }
                                let tempWord = word;
                                while (tempWord.length > MAX_BODY_WRAP_LENGTH) {
                                    newText.push(tempWord.substring(0, MAX_BODY_WRAP_LENGTH));
                                    tempWord = tempWord.substring(MAX_BODY_WRAP_LENGTH);
                                }
                                currentLine = tempWord;
                            } else {
                                // Just break the line and start a new one
                                newText.push(currentLine);
                                currentLine = word;
                            }
                        } else {
                            // Append the word to the current line
                            currentLine += (currentLine.length > 0 ? ' ' : '') + word;
                        }
                    }
                    if (currentLine.length > 0) {
                        newText.push(currentLine);
                    }
                });
                
                // Get current cursor position to preserve it after wrapping
                const cursorPosition = textarea.selectionStart;
                const originalText = textarea.value;

                // Update the textarea value
                textarea.value = newText.join('\n');
                
                // Recalculate cursor position
                const newTextLines = newText.join('\n');
                let newCursorPosition = newTextLines.length < originalText.length ? cursorPosition - (originalText.length - newTextLines.length) : cursorPosition;
                textarea.setSelectionRange(newCursorPosition, newCursorPosition);
            };

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
                        const fileNameSpan = document.createElement('span');
                        fileNameSpan.textContent = file;

                        const removeBtn = document.createElement('button');
                        removeBtn.innerHTML = '&times;';
                        removeBtn.classList.add('remove-file-btn');
                        removeBtn.title = `Remove '${file}'`;

                        removeBtn.addEventListener('click', (event) => {
                            event.stopPropagation(); // Prevent the parent li from being triggered
                            li.remove();
                            
                            // Re-hide the list if it's empty
                            if (listElement.children.length === 0) {
                                listElement.style.display = 'none';
                            }
                        });
                        
                        li.appendChild(fileNameSpan);
                        li.appendChild(removeBtn);
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

                    const currentFiles = Array.from(fileList.children).map(li => getBySelector('span', li).textContent);
                    
                    // Handle folder expansion and selection
                    if (clickedItem.classList.contains('folder')) {
                        const filePath = clickedItem.getAttribute('data-path');
                        const isAlreadySelected = currentFiles.includes(filePath);
                        clickedItem.classList.toggle('expanded');
                        
                        if (!isAlreadySelected) {
                            currentFiles.push(filePath);
                            renderFileList(currentFiles, fileList);
                        } else {
                            const newFiles = currentFiles.filter(item => item !== filePath);
                            renderFileList(newFiles, fileList);
                        }
                        event.stopPropagation();
                        return;
                    }

                    // Handle markdown file heading expansion/collapse
                    if (clickedItem.classList.contains('markdown')) {
                        clickedItem.classList.toggle('expanded');
                        return;
                    }
                    
                    // Handle heading click events
                    if (clickedItem.classList.contains('heading')) {
                        const childList = clickedItem.querySelector('ul.nested-headings');
                        
                        // Always add the heading to the list
                        const combinedPath = getMarkdownHierarchy(clickedItem);
                        if (!currentFiles.includes(combinedPath)) {
                            currentFiles.push(combinedPath);
                            renderFileList(currentFiles, fileList);
                        }
                        
                        // Toggle expansion if there are sub-headings
                        if (childList) {
                            clickedItem.classList.toggle('expanded');
                        }
                        event.stopPropagation();
                        return;
                    }

                    // Handle regular file selection
                    if (clickedItem.classList.contains('file')) {
                        const filePath = clickedItem.getAttribute('data-path');
                        const isAlreadySelected = currentFiles.includes(filePath);
                        if (!isAlreadySelected) {
                            currentFiles.push(filePath);
                            renderFileList(currentFiles, fileList);
                        }
                    }
                });
            };

            const getUsedActionTypes = () => {
                const usedTypes = new Set();
                getAllBySelector('select[id^="file-action-type-"]').forEach(select => {
                    if (select.value) {
                        usedTypes.add(select.value);
                    }
                });
                return usedTypes;
            };

            // Helper function to get the past tense of a verb
            const getPastTense = (action) => {
                switch(action.toLowerCase()) {
                    case 'add': return 'added';
                    case 'update': return 'updated';
                    case 'delete': return 'deleted';
                    case 'fix': return 'fixed';
                    default: return 'changed'; // Fallback for other types or initial state
                }
            };

            const updateActionTypeSelects = () => {
                const usedTypes = getUsedActionTypes();
                const availableTypes = allActionTypes.filter(type => !usedTypes.has(type));

                getAllBySelector('select[id^="file-action-type-"]').forEach(select => {
                    const selectedValue = select.value;
                    const isNewEntry = !selectedValue;
                    
                    select.innerHTML = '';
                    
                    if (isNewEntry || !selectedValue) {
                        select.innerHTML = '<option value="" selected disabled hidden>Select an action...</option>';
                    }
                    
                    allActionTypes.forEach(type => {
                        const isSelected = type === selectedValue;
                        const isAvailable = !usedTypes.has(type) || isSelected;
                        
                        if (isAvailable) {
                            const option = document.createElement('option');
                            option.value = type;
                            option.textContent = type;
                            if (isSelected) {
                                option.selected = true;
                            }
                            select.appendChild(option);
                        }
                    });
                });

                if (usedTypes.size >= allActionTypes.length) {
                    addFileActionBtn.disabled = true;
                } else {
                    addFileActionBtn.disabled = false;
                }
            };
            
            // This function handles the dynamic creation of new file entries.
            const createFileEntry = () => {
                const usedTypes = getUsedActionTypes();
                if (usedTypes.size >= allActionTypes.length) {
                    displayAlert('Cannot add more file actions. All types are in use.', true);
                    return;
                }

                const id = fileEntryIdCounter++;
                const newEntryHtml = fileEntryTemplate.replace(/{id}/g, id).replace(/{displayId}/g, id + 1);
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = newEntryHtml;
                const newEntry = tempDiv.firstElementChild;
                
                fileEntriesContainer.appendChild(newEntry);

                // Re-attach event listeners for the new elements
                const fileActionType = getBySelector('select[id^="file-action-type-"]', newEntry);
                const whatTextarea = getBySelector('textarea[id^="what-text-"]', newEntry);
                const whatLabel = getBySelector('label[id^="what-label-"]', newEntry);
                const whyTextarea = getBySelector('textarea[id^="why-text-"]', newEntry);
                const whyLabel = getBySelector('label[id^="why-label-"]', newEntry);

                whatTextarea.addEventListener('input', realTimeWrap);
                whyTextarea.addEventListener('input', realTimeWrap);


                fileActionType.addEventListener('change', (e) => {
                    const action = e.target.value;
                    const pastTenseAction = getPastTense(action);
                    whatTextarea.placeholder = `Describe what was ${pastTenseAction}...`;
                    whatLabel.textContent = `What was ${pastTenseAction}?`;
                    whyTextarea.placeholder = `Explain why this ${pastTenseAction} was necessary...`;
                    whyLabel.textContent = `Why was it ${pastTenseAction}?`;
                    updateActionTypeSelects();
                });

                getBySelector('.remove-btn', newEntry).addEventListener('click', () => {
                    newEntry.remove();
                    updateActionTypeSelects();
                });
                
                attachFileExplorerListeners(newEntry);
                updateActionTypeSelects();
            };
            
            // This function handles the dynamic creation of new reference entries.
            const createReferenceEntry = () => {
                const id = referenceEntryIdCounter++;
                const newEntryHtml = referenceEntryTemplateHtml.replace(/{id}/g, id).replace(/{displayId}/g, id + 1);
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = newEntryHtml;
                const newEntry = tempDiv.firstElementChild;
                
                referenceEntriesContainer.appendChild(newEntry);

                // Populate the new combobox
                const newCombobox = getBySelector('select[id^="references-"]', newEntry);
                populateIssueCombobox(newCombobox);
                
                getBySelector('.remove-btn', newEntry).addEventListener('click', () => {
                    newEntry.remove();
                });
            };

            // Initial setup functions
            attachFileExplorerListeners(getById('file-entries-container').firstElementChild);
            createReferenceEntry(); // Create the first reference entry on load
            addFileActionBtn.addEventListener('click', createFileEntry);
            addReferenceBtn.addEventListener('click', createReferenceEntry);
            fetchIssuesBtn.addEventListener('click', fetchIssues);

            // Add event listener for the initial PHP-generated entry
            const initialEntry = getBySelector('.file-entry[data-id="0"]');
            const initialFileActionType = getBySelector('select[id="file-action-type-0"]', initialEntry);
            
            initialFileActionType.addEventListener('change', (e) => {
                const action = e.target.value;
                const pastTenseAction = getPastTense(action);
                const whatTextarea = getBySelector('textarea[id="what-text-0"]', initialEntry);
                const whatLabel = getBySelector('label[id="what-label-0"]', initialEntry);
                const whyTextarea = getBySelector('textarea[id="why-text-0"]', initialEntry);
                const whyLabel = getBySelector('label[id="why-label-0"]', initialEntry);

                whatTextarea.placeholder = `Describe what was ${pastTenseAction}...`;
                whatLabel.textContent = `What was ${pastTenseAction}?`;
                whyTextarea.placeholder = `Explain why this ${pastTenseAction} was necessary...`;
                whyLabel.textContent = `Why was it ${pastTenseAction}?`;
                updateActionTypeSelects();
            });
            
            // Set up the available options for the first select on load
            updateActionTypeSelects();
            // Call updateCharCounter initially to set the counter
            updateCharCounter();
            
            // Add real-time wrapping to the initial textareas
            getById('what-text-0').addEventListener('input', realTimeWrap);
            getById('why-text-0').addEventListener('input', realTimeWrap);


            // New function to wrap text at a specified character limit, now handles long words
            const wrapText = (text, maxLength, prefix = '', indent = '  ') => {
                const lines = text.split('\n');
                let wrappedText = '';

                lines.forEach((line, index) => {
                    let words = line.split(' ');
                    let currentLine = '';
                    
                    for (const word of words) {
                        // Check if the word itself is longer than a single line
                        if (word.length > maxLength) {
                            if (currentLine.length > 0) {
                                wrappedText += currentLine.trim() + '\n';
                            }
                            let tempWord = word;
                            while (tempWord.length > 0) {
                                wrappedText += prefix + tempWord.substring(0, maxLength - prefix.length) + '\n';
                                tempWord = tempWord.substring(maxLength - prefix.length);
                            }
                            currentLine = '';
                            continue;
                        }

                        // Normal wrapping logic
                        if (currentLine.length + (currentLine.length > 0 ? 1 : 0) + word.length > maxLength - prefix.length) {
                            wrappedText += currentLine.trim() + '\n';
                            currentLine = prefix + word;
                        } else {
                            currentLine += (currentLine.length > 0 ? ' ' : '') + word;
                        }
                    }
                    if (currentLine.length > 0) {
                        wrappedText += currentLine.trim();
                    }
                    if (index < lines.length - 1) {
                        wrappedText += '\n';
                    }
                });
                
                return wrappedText;
            };


            // Validation function
            const validateForm = () => {
                const requiredFields = [
                    commitType,
                    scope,
                    description,
                    signOffName,
                    signOffEmail
                ];

                for (const field of requiredFields) {
                    if (field.value.trim() === '') {
                        field.focus();
                        return { valid: false, message: `Please fill out the '${field.id}' field.` };
                    }
                }

                // New validation for commit title length
                const header = `${commitType.value}(${scope.value}): ${description.value}`;
                if (header.length > 50) {
                    description.focus();
                    return { valid: false, message: 'The commit title cannot be longer than 50 characters.' };
                }
                
                // Final check to ensure description is lowercase and valid characters
                if (/[A-Z]/.test(description.value)) {
                    description.focus();
                    return { valid: false, message: 'The description must be entirely in lowercase.' };
                }

                const fileEntries = getAllBySelector('.file-entry');
                if (fileEntries.length === 0) {
                    return { valid: false, message: 'Please add at least one file action.' };
                }

                for (const entry of fileEntries) {
                    const actionType = getBySelector('select[id^="file-action-type-"]', entry);
                    if (actionType.value.trim() === '') {
                        actionType.focus();
                        return { valid: false, message: 'Please select an action type for all file actions.' };
                    }
                    
                    const fileListElement = getBySelector('.file-list', entry);
                    if (fileListElement.children.length === 0) {
                        entry.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        return { valid: false, message: 'Please select at least one file for each file action.' };
                    }

                    const whatTextarea = getBySelector('textarea[id^="what-text-"]', entry);
                    if (whatTextarea.value.trim() === '') {
                        whatTextarea.focus();
                        return { valid: false, message: `Please fill out the 'What?' field for file action.` };
                    }

                    const whyTextarea = getBySelector('textarea[id^="why-text-"]', entry);
                    if (whyTextarea.value.trim() === '') {
                        whyTextarea.focus();
                        return { valid: false, message: `Please fill out the 'Why?' field for file action.` };
                    }
                }

                // Validate dynamic reference entries
                const referenceEntries = getAllBySelector('.reference-entry');
                if (referenceEntries.length === 0) {
                     return { valid: false, message: 'Please add at least one reference.' };
                }
                for (const entry of referenceEntries) {
                    const referencesInput = getBySelector('select[id^="references-"]', entry);
                    if (referencesInput.value.trim() === '') {
                        referencesInput.focus();
                        return { valid: false, message: `Please select an issue for the reference.` };
                    }
                }

                return { valid: true, message: '' };
            };
            
            const displayAlert = (message, isError) => {
                const alertBox = document.createElement('div');
                alertBox.textContent = message;
                alertBox.classList.add('alert-box');
                if (isError) {
                    alertBox.classList.add('error');
                }
                document.body.appendChild(alertBox);
                setTimeout(() => {
                    alertBox.remove();
                }, 3000);
            };

            generateBtn.addEventListener('click', async () => {
                const validationResult = validateForm();
                
                if (!validationResult.valid) {
                    displayAlert(validationResult.message, true);
                    return;
                }
                
                const typeVal = commitType.value.trim();
                const scopeVal = scope.value.trim();
                const descriptionVal = description.value.trim();
                
                let header = `${typeVal}(${scopeVal}): ${descriptionVal}`;
                let message = `${header}\n\n`;

                const filesByAction = { Add: [], Fix: [], Update: [], Delete: [] };
                const descriptionsByAction = { Add: [], Fix: [], Update: [], Delete: [] };
                const justificationsByAction = { Add: [], Fix: [], Update: [], Delete: [] };

                // Iterate over each dynamic file entry
                getAllBySelector('.file-entry').forEach(entry => {
                    const actionType = getBySelector('select[id^="file-action-type-"]', entry).value;
                    const whatText = getBySelector('textarea[id^="what-text-"]', entry).value.trim();
                    const whyText = getBySelector('textarea[id^="why-text-"]', entry).value.trim();
                    const fileListElement = getBySelector('.file-list', entry);
                    const files = Array.from(fileListElement.children).map(li => getBySelector('span', li).textContent);
                    
                    if (files.length > 0) {
                        filesByAction[actionType].push(...files);
                        if (whatText !== '') {
                            descriptionsByAction[actionType].push(whatText);
                        }
                        if (whyText !== '') {
                            justificationsByAction[actionType].push(whyText);
                        }
                    }
                });

                // Append the lists and descriptions to the message in the new order
                const appendFileListAndDescriptions = (title, files, descriptions, justifications) => {
                    if (files.length > 0) {
                        message += `### ${title}\n\n`;
                        message += 'Files:\n';
                        files.forEach(file => {
                            // Use the new wrapText function with a 72-character limit and a custom prefix
                            message += wrapText(file, 72, '- ', '  ') + '\n';
                        });
                        message += '\n';

                        if (descriptions.length > 0) {
                             message += `What was ${getPastTense(title)}?\n\n`;
                             descriptions.forEach(desc => message += wrapText(desc, 72) + '\n\n');
                        }
                        if (justifications.length > 0) {
                            message += `Why was it ${getPastTense(title)}?\n\n`;
                            justifications.forEach(just => message += wrapText(just, 72) + '\n\n');
                        }
                    }
                };
                
                appendFileListAndDescriptions('Add', filesByAction.Add, descriptionsByAction.Add, justificationsByAction.Add);
                appendFileListAndDescriptions('Fix', filesByAction.Fix, descriptionsByAction.Fix, justificationsByAction.Fix);
                appendFileListAndDescriptions('Update', filesByAction.Update, descriptionsByAction.Update, justificationsByAction.Update);
                appendFileListAndDescriptions('Delete', filesByAction.Delete, descriptionsByAction.Delete, justificationsByAction.Delete);

                // Append dynamic references
                getAllBySelector('.reference-entry').forEach(entry => {
                    const refType = getBySelector('select[id^="reference-type-"]', entry).value;
                    const refs = getBySelector('select[id^="references-"]', entry).value.trim();

                    if (refs !== '') {
                        message += `${refType} #${refs}\n`;
                    }
                });

                if (signOffName.value.trim() !== '' && signOffEmail.value.trim() !== '') {
                    message += `\nSigned-off-by: ${signOffName.value.trim()} <${signOffEmail.value.trim()}>`;
                }

                outputMessage.textContent = message;

                // Send the commit message to the server for file writing
                try {
                    const response = await fetch(window.location.href, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ commitMessage: message })
                    });

                    const result = await response.json();
                    if (result.success) {
                        displayAlert('Commit message written to .git/EDIT_COMMITMSG!', false);
                    } else {
                        displayAlert(`Error: ${result.error}`, true);
                    }
                } catch (error) {
                    console.error('Error writing file via API:', error);
                    displayAlert('An unexpected error occurred while writing the file.', true);
                }
            });

            copyBtn.addEventListener('click', () => {
                const textToCopy = outputMessage.textContent;
                const textarea = document.createElement('textarea');
                textarea.value = textToCopy;
                document.body.appendChild(textarea);
                textarea.select();
                document.execCommand('copy');
                document.body.removeChild(textarea);

                displayAlert('Commit message copied to clipboard!', false);
            });
            
            // Call fetchIssues on page load
            fetchIssues();
        });
    </script>
</body>
</html>
