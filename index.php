<?php
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

// Recursive function to build the nested list with proper hierarchy
function buildListItems($directory, $isRoot = true) {
    $items = getDirectoryTree($directory);
    ksort($items); // Sort the items alphabetically

    $html = $isRoot ? '' : '<ul>';
    
    foreach ($items as $name => $isFolder) {
        $path = htmlspecialchars($directory . DIRECTORY_SEPARATOR . $name);
        $class = $isFolder ? 'folder' : 'file';
        $icon = $isFolder ? '&#x1F4C1;' : '&#x1F4C4;'; // Folder or File emoji icon
        $html .= '<li class="' . $class . '" data-path="' . $path . '">';
        $html .= '<span class="name">' . $icon . ' ' . htmlspecialchars($name) . '</span>';
        if ($isFolder) {
            $html .= buildListItems($directory . DIRECTORY_SEPARATOR . $name, false);
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

        @media (min-width: 768px) {
            .container {
                flex-direction: row;
            }
        }

        .form-section, .output-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .card {
            background-color: #f9fafb;
            padding: 1.5rem;
            border-radius: 0.75rem;
            box-shadow: inset 0 2px 4px 0 rgba(0, 0, 0, 0.06);
            border: 1px solid #e5e7eb;
        }

        h1 {
            font-size: 2.25rem;
            font-weight: 800;
            text-align: center;
            margin-bottom: 1.5rem;
            color: #111827;
        }

        h2 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #374151;
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

        /* New styles for dynamic entries */
        .file-entry {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            padding: 1rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            background-color: #ffffff;
        }
        .file-entry-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .file-entry-header h3 {
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
        .add-file-action-btn {
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
        .add-file-action-btn:hover {
            background-color: #e5e7eb;
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
        .file-explorer ul li.selected {
            background-color: #e0e0e0;
        }
        .file-explorer .folder > ul {
            display: none;
        }
        .file-explorer .folder.expanded > ul {
            display: block;
        }
        .selected-files-list {
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Form Section -->
        <div class="form-section">
            <h1>Commit Message Generator</h1>
            
            <!-- Commit Header -->
            <div class="card">
                <h2>Commit Header</h2>
                <div class="flex-row">
                    <div>
                        <label for="commit-type">Type</label>
                        <select id="commit-type">
                            <option value="feat">feat: A new feature</option>
                            <option value="fix">fix: A bug fix</option>
                            <option value="docs" selected>docs: Documentation changes</option>
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
                        <select id="scope">
                            <option value="core" selected>core</option>
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
                        <input type="text" id="description" value="update developer documentation" placeholder="Short summary of the change">
                    </div>
                </div>
            </div>

            <!-- Dynamic File Actions Section -->
            <div class="card">
                <h2>File Changes</h2>
                <div id="file-entries-container" class="flex-col gap-4">
                    <?php
                        // We will render the first file entry with the PHP file explorer here
                        $startDirectory = '.';
                        $firstEntryHtml = '
                            <div class="file-entry" data-id="0">
                                <div class="file-entry-header">
                                    <h3>File Action #1</h3>
                                    <button class="remove-btn">Remove</button>
                                </div>
                                <div class="flex-row">
                                    <div>
                                        <label for="file-action-type-0">Action</label>
                                        <select id="file-action-type-0">
                                            <option value="Fixed" selected>Fixed</option>
                                            <option value="Updated">Updated</option>
                                            <option value="Added">Added</option>
                                            <option value="Deleted">Deleted</option>
                                        </select>
                                    </div>
                                    <div style="flex: 2;">
                                        <label>File Explorer</label>
                                        <div class="file-explorer">
                                            <ul>' . buildListItems($startDirectory) . '</ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="selected-files-list">
                                    <h4>Selected Files:</h4>
                                    <ul id="file-list-0" class="file-list"></ul>
                                </div>
                                <div>
                                    <label for="what-text-0" id="what-label-0">What?</label>
                                    <textarea id="what-text-0" placeholder="Describe what was fixed..." rows="2"></textarea>
                                </div>
                                <div>
                                    <label for="why-text-0" id="why-label-0">Why?</label>
                                    <textarea id="why-text-0" placeholder="Explain why this fix was necessary..." rows="2"></textarea>
                                </div>
                            </div>
                        ';
                        echo $firstEntryHtml;
                    ?>
                </div>
                <button id="add-file-action-btn" class="add-file-action-btn" style="margin-top: 1rem;">
                    + Add File Action
                </button>
            </div>

            <!-- References & Sign-off -->
            <div class="card">
                <h2>References & Sign-off</h2>
                <div>
                    <label for="references">References (Issue #)</label>
                    <input type="text" id="references" value="5" placeholder="e.g., 5, 6, 7">
                </div>
                <div>
                    <label for="sign-off-name">Signed-off-by Name</label>
                    <input type="text" id="sign-off-name" value="Daniel Mallett" placeholder="Your Name">
                </div>
                <div>
                    <label for="sign-off-email">Signed-off-by Email</label>
                    <input type="email" id="sign-off-email" value="daniel.mallett@ninjamonkeygames.com" placeholder="your.email@example.com">
                </div>
            </div>

            <button id="generate-btn" class="btn btn-generate">
                Generate Commit Message
            </button>
        </div>

        <!-- Output Section -->
        <div class="output-section">
            <h2 class="hidden md:block">Generated Message</h2>
            <pre id="output-message">Click "Generate Commit Message" to see the output here.</pre>
            <button id="copy-btn" class="btn btn-copy">
                Copy to Clipboard
            </button>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const getById = (id) => document.getElementById(id);

            const commitType = getById('commit-type');
            const scope = getById('scope');
            const description = getById('description');
            const references = getById('references');
            const signOffName = getById('sign-off-name');
            const signOffEmail = getById('sign-off-email');
            const outputMessage = getById('output-message');
            const generateBtn = getById('generate-btn');
            const copyBtn = getById('copy-btn');
            
            const fileEntriesContainer = getById('file-entries-container');
            const addFileActionBtn = getById('add-file-action-btn');

            let entryId = 1;

            // This function handles the dynamic creation of new file entries.
            // These new entries use a standard file input, as PHP cannot be
            // dynamically generated by JavaScript.
            const createFileEntry = () => {
                const id = entryId++;
                const entry = document.createElement('div');
                entry.classList.add('file-entry');
                entry.setAttribute('data-id', id);

                const actionType = 'Fixed';
                const lowercaseAction = actionType.toLowerCase();

                entry.innerHTML = `
                    <div class="file-entry-header">
                        <h3>File Action #${id + 1}</h3>
                        <button class="remove-btn">Remove</button>
                    </div>
                    <div class="flex-row">
                        <div>
                            <label for="file-action-type-${id}">Action</label>
                            <select id="file-action-type-${id}">
                                <option value="Fixed" selected>Fixed</option>
                                <option value="Updated">Updated</option>
                                <option value="Added">Added</option>
                                <option value="Deleted">Deleted</option>
                            </select>
                        </div>
                        <div style="flex: 2;">
                            <label for="file-input-${id}">Files</label>
                            <div class="drop-zone" onclick="document.getElementById('file-input-${id}').click()">
                                <p>Drag & drop files here, or click to browse</p>
                                <input type="file" multiple class="hidden" id="file-input-${id}">
                            </div>
                        </div>
                    </div>
                    <div class="selected-files-list">
                        <h4>Selected Files:</h4>
                        <ul id="file-list-${id}" class="file-list"></ul>
                    </div>
                    <div>
                        <label for="what-text-${id}" id="what-label-${id}">What?</label>
                        <textarea id="what-text-${id}" placeholder="Describe what was ${lowercaseAction}..." rows="2"></textarea>
                    </div>
                    <div>
                        <label for="why-text-${id}" id="why-label-${id}">Why?</label>
                        <textarea id="why-text-${id}" placeholder="Explain why this ${lowercaseAction} was necessary..." rows="2"></textarea>
                    </div>
                `;
                
                // Add to the DOM
                fileEntriesContainer.appendChild(entry);

                // Add event listeners for the new elements
                const fileInput = getById(`file-input-${id}`);
                const fileList = getById(`file-list-${id}`);
                const fileActionType = getById(`file-action-type-${id}`);
                const whatLabel = getById(`what-label-${id}`);
                const whatTextarea = getById(`what-text-${id}`);
                const whyLabel = getById(`why-label-${id}`);
                const whyTextarea = getById(`why-text-${id}`);


                fileInput.addEventListener('change', (e) => {
                    const files = Array.from(e.target.files).map(file => file.name);
                    renderFileList(files, fileList);
                });
                
                fileActionType.addEventListener('change', (e) => {
                    const action = e.target.value;
                    const lowercaseAction = action.toLowerCase();
                    whatTextarea.placeholder = `Describe what was ${lowercaseAction}...`;
                    whyTextarea.placeholder = `Explain why this ${lowercaseAction} was necessary...`;
                });

                entry.querySelector('.remove-btn').addEventListener('click', () => {
                    entry.remove();
                });
                
                // Initial file list render
                renderFileList([], fileList);
            };

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
            
            // Handle the PHP-generated file explorer
            const handlePhpFileExplorer = () => {
                const phpExplorer = fileEntriesContainer.querySelector('.file-explorer');
                if (phpExplorer) {
                    phpExplorer.addEventListener('click', (event) => {
                        const clickedItem = event.target.closest('li');
                        if (!clickedItem) return;

                        // Toggle expanded state for folders
                        if (clickedItem.classList.contains('folder')) {
                            clickedItem.classList.toggle('expanded');
                            return;
                        }

                        // Add/remove file from the selected list
                        const fileList = getById('file-list-0');
                        const filePath = clickedItem.getAttribute('data-path');
                        // Use the full file path for the list item content
                        
                        let isAlreadySelected = false;
                        for (const item of fileList.children) {
                            if (item.textContent === filePath) {
                                isAlreadySelected = true;
                                item.remove();
                                break;
                            }
                        }

                        if (!isAlreadySelected) {
                            const li = document.createElement('li');
                            li.textContent = filePath;
                            fileList.appendChild(li);
                        }

                        // Update selected file list visibility
                        renderFileList(Array.from(fileList.children).map(li => li.textContent), fileList);
                    });
                }
            };

            // Call initial setup functions
            handlePhpFileExplorer();
            addFileActionBtn.addEventListener('click', createFileEntry);

            // Add event listener for the initial PHP-generated entry
            const initialFileActionType = getById('file-action-type-0');
            const initialWhatTextarea = getById('what-text-0');
            const initialWhyTextarea = getById('why-text-0');

            initialFileActionType.addEventListener('change', (e) => {
                const action = e.target.value;
                const lowercaseAction = action.toLowerCase();
                initialWhatTextarea.placeholder = `Describe what was ${lowercaseAction}...`;
                initialWhyTextarea.placeholder = `Explain why this ${lowercaseAction} was necessary...`;
            });
            
            generateBtn.addEventListener('click', () => {
                let message = `${commitType.value}(${scope.value}): ${description.value}\n\n`;
                const filesByAction = { Fixed: [], Updated: [], Added: [], Deleted: [] };
                const descriptionsByAction = { Fixed: [], Updated: [], Added: [], Deleted: [] };
                const justificationsByAction = { Fixed: [], Updated: [], Added: [], Deleted: [] };

                // Iterate over each dynamic file entry
                fileEntriesContainer.querySelectorAll('.file-entry').forEach(entry => {
                    const id = entry.getAttribute('data-id');
                    const actionType = getById(`file-action-type-${id}`).value;
                    const fileListElement = getById(`file-list-${id}`);
                    const files = Array.from(fileListElement.children).map(li => li.textContent);
                    const whatText = getById(`what-text-${id}`).value.trim();
                    const whyText = getById(`why-text-${id}`).value.trim();
                    
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

                // Append the lists and descriptions to the message
                const appendFileListAndDescriptions = (title, files, descriptions, justifications) => {
                    if (files.length > 0) {
                        message += `${title}:\n\n`;
                        files.forEach(file => message += `- ${file}\n`);
                        message += '\n';

                        if (descriptions.length > 0) {
                             message += `What was ${title.toLowerCase()}?\n\n`;
                             descriptions.forEach(desc => message += `${desc}\n\n`);
                        }
                        if (justifications.length > 0) {
                            message += `Why was ${title.toLowerCase()}?\n\n`;
                            justifications.forEach(just => message += `${just}\n\n`);
                        }
                    }
                };

                appendFileListAndDescriptions('Fixed', filesByAction.Fixed, descriptionsByAction.Fixed, justificationsByAction.Fixed);
                appendFileListAndDescriptions('Updated', filesByAction.Updated, descriptionsByAction.Updated, justificationsByAction.Updated);
                appendFileListAndDescriptions('Added', filesByAction.Added, descriptionsByAction.Added, justificationsByAction.Added);
                appendFileListAndDescriptions('Deleted', filesByAction.Deleted, descriptionsByAction.Deleted, justificationsByAction.Deleted);
                
                if (references.value.trim() !== '') {
                    message += `References #${references.value.trim()}\n\n`;
                }

                if (signOffName.value.trim() !== '' && signOffEmail.value.trim() !== '') {
                    message += `Signed-off-by: ${signOffName.value.trim()} <${signOffEmail.value.trim()}>`;
                }

                outputMessage.textContent = message;
            });

            copyBtn.addEventListener('click', () => {
                const textToCopy = outputMessage.textContent;
                const textarea = document.createElement('textarea');
                textarea.value = textToCopy;
                document.body.appendChild(textarea);
                textarea.select();
                document.execCommand('copy');
                document.body.removeChild(textarea);

                const alertBox = document.createElement('div');
                alertBox.textContent = 'Commit message copied to clipboard!';
                alertBox.classList.add('alert-box');
                document.body.appendChild(alertBox);
                setTimeout(() => {
                    alertBox.remove();
                }, 3000);
            });
        });
    </script>
</body>
</html>
