<?php
// --- PHP Backend Logic ---

/**
 * Handles POST requests. Currently a placeholder.
 */
function handle_post_request() {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return;
    }
    // Future server-side logic can go here.
    exit;
}

/**
 * Scans a directory and returns an array of its contents.
 * @param string $directory The path to the directory.
 * @return array Associative array where keys are item names and values are booleans (true if directory).
 */
function get_directory_tree($directory) {
    $items = [];
    if (!is_dir($directory)) {
        return $items;
    }

    $files = scandir($directory);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $path = $directory . DIRECTORY_SEPARATOR . $file;
            $items[$file] = is_dir($path);
        }
    }
    return $items;
}

/**
 * Recursively builds an HTML list representing the file structure.
 * @param string $directory The starting directory.
 * @param bool $isRoot Flag to determine if it's the root call.
 * @return string The generated HTML list.
 */
function build_list_items($directory, $isRoot = true) {
    $items = get_directory_tree($directory);
    ksort($items);

    $html = $isRoot ? '' : '<ul>';
    
    foreach ($items as $name => $isFolder) {
        $path = htmlspecialchars($directory . DIRECTORY_SEPARATOR . $name);
        $class = $isFolder ? 'folder' : 'file';
        $icon = $isFolder ? '&#x1F4C1;' : '&#x1F4C4;'; // Corrected File Emoji

        $html .= '<li class="' . $class . '" data-path="' . $path . '">';
        $html .= '<span class="name">' . $icon . ' ' . htmlspecialchars($name) . '</span>';
        
        if ($isFolder) {
            $html .= build_list_items($directory . DIRECTORY_SEPARATOR . $name, false);
        }
        $html .= '</li>';
    }

    $html .= $isRoot ? '' : '</ul>';
    return $html;
}

// --- Main Execution ---
handle_post_request();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artefact Generator</title>
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
            background-color: #fff;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }
        
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }
        
        .full-width {
            grid-column: 1 / -1;
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
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
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
            word-wrap: break-word;
            padding: 1rem;
            background-color: #f3f4f6;
            border-radius: 0.5rem;
            border: 1px solid #e5e7eb;
            font-family: 'Fira Code', 'Courier New', Courier, monospace;
            font-size: 0.875rem;
            color: #1f2937;
            min-height: 24rem;
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
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            z-index: 50;
            animation: fadeInOut 3s forwards;
        }
        
        @keyframes fadeInOut {
            0% { opacity: 0; transform: translateY(10px); }
            10% { opacity: 1; transform: translateY(0); }
            90% { opacity: 1; transform: translateY(0); }
            100% { opacity: 0; transform: translateY(10px); }
        }
        
        .alert-box.error {
            background-color: #ef4444;
        }

        /* --- File Explorer Styles --- */
        .file-explorer-container {
            position: relative;
        }

        #relative-path-display {
            cursor: pointer;
            background-color: #fff;
            padding: 0.5rem;
            border: 1.5px solid #d1d5db;
            border-radius: 0.5rem;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            min-height: 38px; /* Match input height */
            display: flex;
            align-items: center;
        }
        #relative-path-display.open {
             border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }

        .file-explorer {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            max-height: 250px;
            overflow-y: auto;
            background-color: #fff;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            z-index: 10;
            margin-top: 4px;
        }
        .file-explorer.open {
            display: block;
        }
        .file-explorer ul {
            list-style-type: none;
            padding: 0.5rem;
            margin: 0;
        }
        .file-explorer ul li {
            line-height: 1.5;
            cursor: pointer;
            padding: 4px 8px;
            border-radius: 3px;
            user-select: none;
        }
        .file-explorer .folder > ul {
            display: none;
            padding-left: 15px;
        }
        .file-explorer .folder.expanded > ul {
            display: block;
        }
        .file-explorer .selected > .name {
            background-color: #dbeafe;
            font-weight: 600;
        }
        .file-explorer ul li:hover > .name {
            background-color: #f3f4f6;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Artefact Generator</h1>
        
        <div class="card">
            <div class="card-header">Artefact Details</div>
            <div class="grid">
                <div>
                    <label for="asset-name">Asset Name</label>
                    <input type="text" id="asset-name" placeholder="e.g., my-file.txt">
                </div>
                <div class="file-explorer-container">
                    <label for="relative-path-display">Relative Path</label>
                    <div id="relative-path-display" tabindex="0">Select a path...</div>
                    <div id="file-explorer" class="file-explorer">
                        <ul>
                            <?php echo build_list_items('.'); ?>
                        </ul>
                    </div>
                </div>
                <div>
                    <label for="asset-type">Asset Type</label>
                    <select id="asset-type">
                        <option value="" selected disabled hidden>Select type...</option>
                        <option>FOLDER</option>
                        <option>FILE</option>
                    </select>
                </div>
                 <div>
                    <label for="ci-scope">CI Scope</label>
                    <select id="ci-scope">
                        <option value="" selected disabled hidden>Select scope...</option>
                        <option>core</option>
                        <option>api</option>
                        <option>ui</option>
                        <option>auth</option>
                        <option>db</option>
                        <option>deps</option>
                        <option>tests</option>
                        <option>config</option>
                        <option>security</option>
                    </select>
                </div>
                <div>
                    <label for="hidden">Hidden</label>
                    <select id="hidden">
                        <option value="" selected disabled hidden>Select...</option>
                        <option>Yes</option>
                        <option>No</option>
                        <option>Inherited</option>
                    </select>
                </div>
                <div>
                    <label for="include-in-repo">Include in Repository</label>
                    <select id="include-in-repo">
                        <option value="" selected disabled hidden>Select...</option>
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>
                <div>
                    <label for="managed">Managed</label>
                    <select id="managed">
                        <option value="" selected disabled hidden>Select...</option>
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>
                <div class="full-width">
                    <label for="asset-purpose">Asset Purpose</label>
                    <textarea id="asset-purpose" rows="3" placeholder="Describe the purpose of this asset..."></textarea>
                </div>
                <div class="full-width">
                    <label for="asset-contents">Asset Contents Description</label>
                    <textarea id="asset-contents" rows="3" placeholder="Describe the contents of this asset..."></textarea>
                </div>
                 <div class="full-width">
                    <label for="back-to-top-link">Back to Top Link</label>
                    <input type="text" id="back-to-top-link" value="markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual">
                </div>
            </div>
        </div>

        <div style="display: flex; gap: 1rem;">
            <button id="generate-btn" class="btn btn-generate">
                Generate Artefact
            </button>
            <button id="copy-btn" class="btn btn-copy">
                Copy to Clipboard
            </button>
        </div>

        <div class="card">
            <div class="card-header"><b>Preview</b></div>
            <pre id="output-preview">Click "Generate Artefact" to see the output here.</pre>
        </div>
    </div>
    
    <script>
    (() => {
        // --- DOM Elements ---
        const D = {
            assetName: document.getElementById('asset-name'),
            relativePathDisplay: document.getElementById('relative-path-display'),
            fileExplorer: document.getElementById('file-explorer'),
            assetType: document.getElementById('asset-type'),
            ciScope: document.getElementById('ci-scope'),
            hidden: document.getElementById('hidden'),
            includeInRepo: document.getElementById('include-in-repo'),
            managed: document.getElementById('managed'),
            assetPurpose: document.getElementById('asset-purpose'),
            assetContents: document.getElementById('asset-contents'),
            backToTopLink: document.getElementById('back-to-top-link'),
            generateBtn: document.getElementById('generate-btn'),
            copyBtn: document.getElementById('copy-btn'),
            outputPreview: document.getElementById('output-preview'),
        };

        // --- Utility Functions ---
        const displayAlert = (message, isError = false) => {
            const alertBox = document.createElement('div');
            alertBox.textContent = message;
            alertBox.className = `alert-box ${isError ? 'error' : ''}`;
            document.body.appendChild(alertBox);
            setTimeout(() => alertBox.remove(), 3000);
        };

        const toSentenceCase = (str) => {
            if (!str || typeof str.trim() !== 'string' || str.trim().length === 0) return '';
            let result = str.trim();
            result = result.charAt(0).toUpperCase() + result.slice(1);
            if (!/[.!?]$/.test(result)) {
                result += '.';
            }
            return result;
        };

        const wrapText = (text, maxLength) => {
            if (!text) return '';
            const lines = text.split('\n');
            let wrappedLines = [];
            lines.forEach(line => {
                let currentLine = '';
                const words = line.split(' ');
                for (const word of words) {
                    if (word.length > maxLength) {
                        if (currentLine) wrappedLines.push(currentLine.trim());
                        let tempWord = word;
                        while(tempWord.length > 0) {
                            wrappedLines.push(tempWord.substring(0, maxLength));
                            tempWord = tempWord.substring(maxLength);
                        }
                        currentLine = '';
                    } else if (currentLine.length + word.length + 1 > maxLength) {
                        wrappedLines.push(currentLine.trim());
                        currentLine = word;
                    } else {
                        currentLine += (currentLine ? ' ' : '') + word;
                    }
                }
                if (currentLine) wrappedLines.push(currentLine.trim());
            });
            return wrappedLines.join('\n');
        };

        // --- Core Application Logic ---
        const generateArtefactMarkdown = () => {
            const values = {
                name: D.assetName.value.trim(),
                path: D.relativePathDisplay.textContent.trim(),
                type: D.assetType.value,
                scope: D.ciScope.value,
                isHidden: D.hidden.value,
                inRepo: D.includeInRepo.value,
                isManaged: D.managed.value,
                purpose: D.assetPurpose.value.trim(),
                contents: D.assetContents.value.trim(),
                backToTop: D.backToTopLink.value.trim(),
            };

            const requiredFields = {
                "Asset Name": values.name, "Relative Path": values.path, "Asset Type": values.type,
                "CI Scope": values.scope, "Hidden": values.isHidden, "Include in Repository": values.inRepo,
                "Managed": values.isManaged, "Asset Purpose": values.purpose, "Asset Contents": values.contents,
                "Back to Top Link": values.backToTop,
            };

            for (const [key, value] of Object.entries(requiredFields)) {
                if (!value || value === 'Select a path...') {
                    displayAlert(`${key} is required.`, true);
                    return null;
                }
            }

            const icon = values.type === 'FOLDER' ? '📁' : '📄';
            
            const markdown = `
### ${values.type} [${values.name}] ${icon}

#### Attribute Table : [${values.name}]

| Attribute             | Value             |
|-----------------------|-------------------|
| Asset Name            | ${values.name}            |
| Relative Path         | ${values.path}            |
| Hidden                | ${values.isHidden}             |
| Include in Repository | ${values.inRepo}       |
| Managed               | ${values.isManaged}             |
| Asset Type            | ${values.type}            |
| CI Scope              | ${values.scope}            |

#### Asset Purpose : [${values.name}]

${wrapText(values.purpose, 120)}

#### Asset Contents Description : [${values.name}]

${wrapText(values.contents, 120)}

---

[BACK TO TOP](#${values.backToTop})

---
            `.trim();

            return markdown;
        };

        const handleGenerateClick = () => {
            const markdown = generateArtefactMarkdown();
            if (markdown) {
                D.outputPreview.textContent = markdown;
            }
        };

        const handleCopyClick = () => {
            if (D.outputPreview.textContent === 'Click "Generate Artefact" to see the output here.') {
                displayAlert('Nothing to copy. Please generate the artefact first.', true);
                return;
            }
            navigator.clipboard.writeText(D.outputPreview.textContent)
                .then(() => displayAlert('Artefact Markdown copied to clipboard!'))
                .catch(err => {
                    console.error('Failed to copy text: ', err);
                    displayAlert('Failed to copy text.', true);
                });
        };

        const toggleFileExplorer = (forceClose = false) => {
            if (forceClose) {
                D.fileExplorer.classList.remove('open');
                D.relativePathDisplay.classList.remove('open');
            } else {
                D.fileExplorer.classList.toggle('open');
                D.relativePathDisplay.classList.toggle('open');
            }
        };

        const attachFileExplorerListeners = () => {
            D.relativePathDisplay.addEventListener('click', (e) => {
                e.stopPropagation();
                toggleFileExplorer();
            });

            D.fileExplorer.addEventListener('click', (e) => {
                const target = e.target.closest('li');
                if (!target) return;

                const fullPath = target.dataset.path;
                const isFolder = target.classList.contains('folder');
                const nameSpan = target.querySelector('.name');
                
                const nameParts = nameSpan.textContent.trim().split(' ');
                const assetName = nameParts[nameParts.length - 1];

                D.assetName.value = assetName;
                D.relativePathDisplay.textContent = fullPath;
                D.assetType.value = isFolder ? 'FOLDER' : 'FILE';

                let hiddenStatus = 'No';
                if (assetName.startsWith('.')) {
                    hiddenStatus = 'Yes';
                } else {
                    const normalizedPath = fullPath.replace(/\\/g, '/');
                    const pathParts = normalizedPath.split('/');
                    for (let i = 0; i < pathParts.length - 1; i++) {
                        if (pathParts[i].startsWith('.')) {
                            hiddenStatus = 'Inherited';
                            break; 
                        }
                    }
                }
                D.hidden.value = hiddenStatus;

                const previouslySelected = D.fileExplorer.querySelector('.selected');
                if (previouslySelected) {
                    previouslySelected.classList.remove('selected');
                }
                target.classList.add('selected');
                
                if (target.classList.contains('folder')) {
                    target.classList.toggle('expanded');
                }
                
                setTimeout(() => {
                    toggleFileExplorer(true);
                }, 100); 
            });

            document.addEventListener('click', () => toggleFileExplorer(true));
        };

        // --- Initializer ---
        const init = () => {
            D.generateBtn.addEventListener('click', handleGenerateClick);
            D.copyBtn.addEventListener('click', handleCopyClick);

            D.assetPurpose.addEventListener('blur', () => {
                D.assetPurpose.value = toSentenceCase(D.assetPurpose.value);
            });
            D.assetContents.addEventListener('blur', () => {
                D.assetContents.value = toSentenceCase(D.assetContents.value);
            });

            attachFileExplorerListeners();
        };

        init();
    })();
    </script>
</body>
</html>
