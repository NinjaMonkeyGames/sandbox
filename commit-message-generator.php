<?php
session_start();

// Helper function to get a flat list of all file paths
function getAllFilePaths($dir, &$results = []) {
    $files = scandir($dir);
    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!$path) continue; // Skip if path is invalid

        // Exclude the .git directory and its contents
        if (basename($path) === '.git') {
            continue;
        }

        if (!is_dir($path)) {
            // Normalize path for cross-platform consistency
            $relativePath = str_replace('\\', '/', substr($path, strlen(realpath(__DIR__)) + 1));
            $results[] = './' . $relativePath;
        } else if ($value != "." && $value != "..") {
            getAllFilePaths($path, $results);
        }
    }
    return $results;
}

// Helper function to parse headings with their full hierarchy from a single file
function parseHeadingsWithHierarchy($filePath) {
    if (!file_exists($filePath) || !is_readable($filePath)) {
        return [];
    }
    $content = file_get_contents($filePath);
    $lines = explode("\n", $content);
    $results = [];
    $stack = []; // To track parent headings
    $normalizedPath = './' . str_replace('\\', '/', substr(realpath($filePath), strlen(realpath(__DIR__)) + 1));

    foreach ($lines as $line) {
        if (preg_match('/^(#+)\s(.+)/', $line, $matches)) {
            $level = strlen($matches[1]);
            $text = trim($matches[2]);

            // Pop from stack until the parent level is correct
            while (!empty($stack) && $stack[count($stack) - 1]['level'] >= $level) {
                array_pop($stack);
            }

            $hierarchy = array_map(function($item) { return $item['text']; }, $stack);
            $hierarchy[] = $text;
            
            $fullPath = $normalizedPath . ' :: ' . implode(' :: ', $hierarchy);
            $results[] = $fullPath;

            // Push current heading onto stack
            $stack[] = ['level' => $level, 'text' => $text];
        }
    }
    return $results;
}

// Helper function to get all markdown headings from all files recursively
function getAllMarkdownHeadingsRecursive($dir, &$results = []) {
    $items = scandir($dir);
    foreach ($items as $item) {
        if ($item == '.' || $item == '..') continue;
        $path = realpath($dir . DIRECTORY_SEPARATOR . $item);
        if (!$path || basename($path) === '.git') continue;

        if (is_dir($path)) {
            getAllMarkdownHeadingsRecursive($path, $results);
        } elseif (pathinfo($path, PATHINFO_EXTENSION) === 'md') {
            $headings = parseHeadingsWithHierarchy($path);
            $results = array_merge($results, $headings);
        }
    }
    return $results;
}


// Handle the file watcher API request
if (isset($_GET['action']) && $_GET['action'] === 'watch') {
    header('Content-Type: application/json');
    
    // --- File watching ---
    $currentFiles = getAllFilePaths(__DIR__);
    sort($currentFiles);
    $previousFiles = $_SESSION['file_state'] ?? $currentFiles;
    $addedFiles = array_values(array_diff($currentFiles, $previousFiles));
    $deletedFiles = array_values(array_diff($previousFiles, $currentFiles));
    if (!empty($addedFiles) || !empty($deletedFiles)) {
        $_SESSION['file_state'] = $currentFiles;
    }

    // --- Heading watching ---
    $currentHeadings = getAllMarkdownHeadingsRecursive(__DIR__);
    sort($currentHeadings);
    $previousHeadings = $_SESSION['heading_state'] ?? $currentHeadings;
    $addedHeadings = array_values(array_diff($currentHeadings, $previousHeadings));
    $deletedHeadings = array_values(array_diff($previousHeadings, $currentHeadings));
    if (!empty($addedHeadings) || !empty($deletedHeadings)) {
        $_SESSION['heading_state'] = $currentHeadings;
    }
    
    echo json_encode([
        'added' => $addedFiles, 
        'deleted' => $deletedFiles,
        'addedHeadings' => $addedHeadings,
        'deletedHeadings' => $deletedHeadings
    ]);
    exit;
}

// Initialize file and heading states on first load
if (!isset($_SESSION['file_state'])) {
    $_SESSION['file_state'] = getAllFilePaths(__DIR__);
    sort($_SESSION['file_state']);
}
if (!isset($_SESSION['heading_state'])) {
    $_SESSION['heading_state'] = getAllMarkdownHeadingsRecursive(__DIR__);
    sort($_SESSION['heading_state']);
}


// PHP logic to handle POST requests for file writing
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    $postData = file_get_contents('php://input');
    $request = json_decode($postData, true);

    if (isset($request['commitMessage'])) {
        $commitMessage = $request['commitMessage'];
        $filePath = '.git/COMMIT_EDITMSG'; // Updated file path

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
            if ($file != '.' && $file != '..' && $file != '.git') { // Exclude .git directory
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
    if (!file_exists($filePath) || !is_readable($filePath)) {
        return '';
    }
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
            // Pre-generate markdown headings and hide them.
            $html .= '<div class="markdown-headings">' . getMarkdownHeadings($directory . DIRECTORY_SEPARATOR . $name) . '</div>';
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
            background-color: #fff;
            box-sizing: border-box; /* Ensures padding doesn't affect width */
        }
        
        textarea {
            resize: vertical; /* Allow manual vertical resizing */
            overflow-y: hidden; /* Hide scrollbar by default, JS will manage height */
            min-height: 4rem; /* Set a minimum height */
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }
        
        .description-container {
            display: flex;
            flex-direction: column;
            flex: 2;
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
            gap: 1rem;
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

        .btn-clear {
            background-color: #ef4444;
            color: #ffffff;
        }

        .btn-clear:hover {
            background-color: #dc2626;
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
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
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

        /* Styles for dynamic entries */
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
        .file-explorer ul li:hover > .name,
        .file-explorer ul li:hover > span {
            background-color: #f3f4f6;
        }

        .file-explorer .selected > .name,
        .file-explorer .selected > span {
            background-color: #dbeafe; /* A light blue highlight */
            font-weight: 600;
            border-radius: 3px;
            padding-left: 3px;
            padding-right: 3px;
            margin-left: -3px; /* Offset padding to maintain alignment */
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

        <div class="card">
            <div class="card-header">File Changes</div>
            <div id="file-entries-container" style="display: flex; flex-direction: column; gap: 1rem;">
                <?php
                    $startDirectory = '.';
                    $fileExplorerHtml = '<div class="file-explorer"><ul>' . buildListItems($startDirectory) . '</ul></div>';
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
                                <h4>Selected File:</h4>
                                <ul id="file-list-{id}" class="file-list"></ul>
                            </div>
                            <div>
                                <label for="what-text-{id}" id="what-label-{id}">What?</label>
                                <textarea id="what-text-{id}" placeholder="Describe what was changed..." rows="4" required></textarea>
                            </div>
                            <div>
                                <label for="why-text-{id}" id="why-label-{id}">Why?</label>
                                <textarea id="why-text-{id}" placeholder="Explain why this change was necessary..." rows="4" required></textarea>
                            </div>
                        </div>
                    ';
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
                <input type="password" id="github-token" placeholder="Leave empty for public repos">
            </div>
            <button id="fetch-issues-btn" class="btn btn-generate btn-sm" style="margin-top: 1rem;">
                Fetch Issues
            </button>
        </div>

        <div class="card">
            <div class="card-header">References & Sign-off</div>
            <div id="reference-entries-container" style="display: flex; flex-direction: column; gap: 1rem;">
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
            <button id="clear-btn" class="btn btn-clear">
                Clear All Fields
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
            const charCounter = getById('char-counter');
            const signOffName = getById('sign-off-name');
            const signOffEmail = getById('sign-off-email');
            const outputMessage = getById('output-message');
            const generateBtn = getById('generate-btn');
            const copyBtn = getById('copy-btn');
            const clearBtn = getById('clear-btn');
            
            const fileEntriesContainer = getById('file-entries-container');
            const addFileActionBtn = getById('add-file-action-btn');
            const referenceEntriesContainer = getById('reference-entries-container');
            const addReferenceBtn = getById('add-reference-btn');

            const repoOwner = getById('repo-owner');
            const repoName = getById('repo-name');
            const githubToken = getById('github-token');
            const fetchIssuesBtn = getById('fetch-issues-btn');

            let issueList = [];
            const allActionTypes = ['Fix', 'Update', 'Add', 'Delete'];
            let handledFileChanges = new Set(); // Tracks files handled by the watcher

            const fileExplorerHtml = `
                <div class="file-explorer">
                    <ul><?php echo addslashes(str_replace(["\r", "\n"], '', buildListItems('.'))); ?></ul>
                </div>
            `;
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
                            ${fileExplorerHtml}
                        </div>
                    </div>
                    <div class="selected-files-list">
                        <h4>Selected File:</h4>
                        <ul id="file-list-{id}" class="file-list"></ul>
                    </div>
                    <div>
                        <label for="what-text-{id}" id="what-label-{id}">What?</label>
                        <textarea id="what-text-{id}" placeholder="Describe what was changed..." rows="4" required></textarea>
                    </div>
                    <div>
                        <label for="why-text-{id}" id="why-label-{id}">Why?</label>
                        <textarea id="why-text-{id}" placeholder="Explain why this change was necessary..." rows="4" required></textarea>
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
                        <div style="flex:2;">
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
            
            const toSentenceCase = (str) => {
                if (!str) return '';
                let result = str.trim();
                // Don't convert to lowercase here, just capitalize the first letter
                result = result.charAt(0).toUpperCase() + result.slice(1);
                if (!/[.!?]$/.test(result)) result += '.';
                return result;
            };
            
            const sanitizeDescription = () => {
                const start = description.selectionStart;
                const end = description.selectionEnd;
                const inputValue = description.value;
                let sanitizedValue = '';
                for (let i = 0; i < inputValue.length; i++) {
                    const char = inputValue[i];
                    const charCode = char.charCodeAt(0);
                    if (charCode >= 32 && charCode <= 126) {
                        sanitizedValue += char;
                    }
                }
                // Enforce lowercase
                description.value = sanitizedValue.toLowerCase();
                description.setSelectionRange(start, end);
            };

            const updateCharCounter = () => {
                sanitizeDescription(); // This now also enforces lowercase
                const typeVal = commitType.value;
                const scopeVal = scope.value;
                const descriptionVal = description.value;
                const fixedLength = typeVal.length + (scopeVal ? scopeVal.length + 2 : 0) + (descriptionVal ? 2 : 0);
                const totalLength = fixedLength + descriptionVal.length;
                
                charCounter.textContent = `${totalLength} / ${MAX_TITLE_LENGTH}`;
                
                if (totalLength > MAX_TITLE_LENGTH) {
                    const maxDescriptionLength = MAX_TITLE_LENGTH - fixedLength;
                    description.value = descriptionVal.substring(0, Math.max(0, maxDescriptionLength));
                    charCounter.classList.add('error');
                    charCounter.textContent = `${MAX_TITLE_LENGTH} / ${MAX_TITLE_LENGTH}`;
                } else {
                    charCounter.classList.remove('error');
                }
            };

            commitType.addEventListener('change', updateCharCounter);
            scope.addEventListener('change', updateCharCounter);
            description.addEventListener('input', updateCharCounter);

            const autoResizeTextarea = (textarea) => {
                textarea.style.height = 'auto'; // Reset height
                textarea.style.height = `${textarea.scrollHeight}px`; // Set to content height
            };
            
            const realTimeWrap = (event) => {
                const textarea = event.target;
                const lines = textarea.value.split('\n');
                let newText = [];
                
                lines.forEach(line => {
                    let words = line.split(' ');
                    let currentLine = '';
                    
                    for (const word of words) {
                        if (currentLine.length + (currentLine.length > 0 ? 1 : 0) + word.length > MAX_BODY_WRAP_LENGTH) {
                            if (word.length > MAX_BODY_WRAP_LENGTH) {
                                if (currentLine.length > 0) newText.push(currentLine);
                                let tempWord = word;
                                while (tempWord.length > MAX_BODY_WRAP_LENGTH) {
                                    newText.push(tempWord.substring(0, MAX_BODY_WRAP_LENGTH));
                                    tempWord = tempWord.substring(MAX_BODY_WRAP_LENGTH);
                                }
                                currentLine = tempWord;
                            } else {
                                newText.push(currentLine);
                                currentLine = word;
                            }
                        } else {
                            currentLine += (currentLine.length > 0 ? ' ' : '') + word;
                        }
                    }
                    if (currentLine.length > 0) newText.push(currentLine);
                });
                
                const cursorPosition = textarea.selectionStart;
                const originalText = textarea.value;
                textarea.value = newText.join('\n');
                const newTextValue = newText.join('\n');
                let newCursorPosition = cursorPosition - (originalText.length - newTextValue.length);
                textarea.setSelectionRange(newCursorPosition, newCursorPosition);
            };

            const fetchIssues = async () => {
                const owner = repoOwner.value.trim();
                const name = repoName.value.trim();
                const token = githubToken.value.trim();
                
                if (!owner || !name) {
                    displayAlert('Please provide a repository owner and name.', true);
                    return;
                }

                const url = `https://api.github.com/repos/${owner}/${name}/issues?state=open`;
                const headers = { 'Accept': 'application/vnd.github.v3+json' };
                if (token) headers['Authorization'] = `token ${token}`;
                
                try {
                    const response = await fetch(url, { headers });
                    if (!response.ok) {
                        const errorData = await response.json();
                        throw new Error(errorData.message || 'Failed to fetch issues.');
                    }
                    const issues = await response.json();
                    issueList = issues.map(issue => ({ number: issue.number, title: issue.title }));
                    getAllBySelector('select[id^="references-"]').forEach(populateIssueCombobox);
                    displayAlert('Successfully fetched open issues.', false);
                } catch (error) {
                    console.error('Error fetching issues:', error);
                    issueList = [];
                    getAllBySelector('select[id^="references-"]').forEach(select => {
                        select.innerHTML = `<option value="" selected disabled>Could not load issues.</option>`;
                    });
                    displayAlert(`Error fetching issues: ${error.message}`, true);
                }
            };
            
            const populateIssueCombobox = (selectElement) => {
                selectElement.innerHTML = '<option value="" selected disabled>Select an issue...</option>';
                selectElement.disabled = issueList.length === 0;
                if (issueList.length === 0) {
                    selectElement.innerHTML = '<option value="" selected disabled>No open issues found.</option>';
                } else {
                    issueList.forEach(issue => {
                        const option = document.createElement('option');
                        option.value = issue.number;
                        option.textContent = `#${issue.number}: ${issue.title}`;
                        selectElement.appendChild(option);
                    });
                }
            };

            const getMarkdownHierarchy = (headingItem) => {
                const filePath = headingItem.dataset.path;
                const headingText = headingItem.dataset.text;
                const hierarchy = [headingText];
                let parentListItem = headingItem.closest('ul.nested-headings')?.parentNode;
                while (parentListItem && parentListItem.classList.contains('heading')) {
                    hierarchy.unshift(parentListItem.dataset.text);
                    parentListItem = parentListItem.closest('ul.nested-headings')?.parentNode;
                }
                const displayedHierarchy = hierarchy.join(' :: ');
                return `${filePath} :: ${displayedHierarchy}`;
            };
            
            const renderFileList = (files, listElement) => {
                listElement.innerHTML = '';
                const parentContainer = listElement.closest('.selected-files-list');
                if (files.length === 0) {
                    if(parentContainer) parentContainer.style.display = 'none';
                } else {
                    if(parentContainer) parentContainer.style.display = 'block';
                    files.forEach(file => {
                        const li = document.createElement('li');
                        const fileNameSpan = document.createElement('span');
                        fileNameSpan.textContent = file;
                        const removeBtn = document.createElement('button');
                        removeBtn.innerHTML = '&times;';
                        removeBtn.classList.add('remove-file-btn');
                        removeBtn.title = `Remove '${file}'`;
                        removeBtn.onclick = (event) => {
                            event.stopPropagation();
                            li.remove();
                            handledFileChanges.delete(file); // Allow watcher to pick it up again if needed
                            if (listElement.children.length === 0) {
                                if(parentContainer) parentContainer.style.display = 'none';
                            }
                        };
                        li.append(fileNameSpan, removeBtn);
                        listElement.appendChild(li);
                    });
                }
            };
            
            const attachFileExplorerListeners = (entryElement) => {
                const fileExplorer = getBySelector('.file-explorer', entryElement);
                const fileList = getBySelector('.file-list', entryElement);
                
                const handleSelection = (clickedItem, path) => {
                    const isDeselecting = clickedItem.classList.contains('selected');
                    const previouslySelected = fileExplorer.querySelector('li.selected');
                    if (previouslySelected) {
                        previouslySelected.classList.remove('selected');
                    }
                    if (isDeselecting) {
                        renderFileList([], fileList);
                    } else {
                        clickedItem.classList.add('selected');
                        renderFileList([path], fileList);
                    }
                };
            
                fileExplorer.addEventListener('click', (event) => {
                    const clickedItem = event.target.closest('li');
                    if (!clickedItem) return;
                    event.stopPropagation();
            
                    if (clickedItem.classList.contains('heading')) {
                        const combinedPath = getMarkdownHierarchy(clickedItem);
                        handleSelection(clickedItem, combinedPath);
                        if (clickedItem.querySelector('ul.nested-headings')) {
                            clickedItem.classList.toggle('expanded');
                        }
                        return;
                    }
                    if (clickedItem.classList.contains('file') && !clickedItem.classList.contains('markdown')) {
                        handleSelection(clickedItem, clickedItem.dataset.path);
                        return;
                    }
                    if (clickedItem.classList.contains('markdown')) {
                        handleSelection(clickedItem, clickedItem.dataset.path);
                        clickedItem.classList.toggle('expanded');
                        return;
                    }
                    if (clickedItem.classList.contains('folder')) {
                        handleSelection(clickedItem, clickedItem.dataset.path);
                        clickedItem.classList.toggle('expanded');
                    }
                });
            };

            const getUsedActionTypes = () => {
                const usedTypes = new Set();
                getAllBySelector('select[id^="file-action-type-"]').forEach(select => {
                    if (select.value) usedTypes.add(select.value);
                });
                return usedTypes;
            };

            const getPastTense = (action) => {
                const tenses = { add: 'added', update: 'updated', delete: 'deleted', fix: 'fixed' };
                return tenses[action.toLowerCase()] || 'changed';
            };
            
            const updateActionTypeSelects = () => {
                const usedTypes = getUsedActionTypes();
                getAllBySelector('.file-entry').forEach(entry => {
                    const select = getBySelector('select[id^="file-action-type-"]', entry);
                    const selectedValue = select.value;
                    select.innerHTML = '<option value="" selected disabled hidden>Select an action...</option>';
                    allActionTypes.forEach(type => {
                        if (type === selectedValue || !usedTypes.has(type)) {
                            const option = document.createElement('option');
                            option.value = type;
                            option.textContent = type;
                            if (type === selectedValue) option.selected = true;
                            select.appendChild(option);
                        }
                    });
                });
                addFileActionBtn.disabled = usedTypes.size >= allActionTypes.length;
            };
            
            const createFileEntry = () => {
                if (getUsedActionTypes().size >= allActionTypes.length) {
                    displayAlert('Cannot add more file actions. All types are in use.', true);
                    return null;
                }
                const id = fileEntryIdCounter++;
                const newEntryHtml = fileEntryTemplate.replace(/{id}/g, id).replace(/{displayId}/g, id + 1);
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = newEntryHtml;
                const newEntry = tempDiv.firstElementChild;
                fileEntriesContainer.appendChild(newEntry);
                setupFileEntry(newEntry);
                return newEntry;
            };

            const setupFileEntry = (entry) => {
                const fileActionType = getBySelector('select[id^="file-action-type-"]', entry);
                const whatTextarea = getBySelector('textarea[id^="what-text-"]', entry);
                const whatLabel = getBySelector('label[id^="what-label-"]', entry);
                const whyTextarea = getBySelector('textarea[id^="why-text-"]', entry);
                const whyLabel = getBySelector('label[id^="why-label-"]', entry);

                const handleTextareaInput = (event) => {
                    realTimeWrap(event);
                    autoResizeTextarea(event.target);
                };

                whatTextarea.addEventListener('input', handleTextareaInput);
                whyTextarea.addEventListener('input', handleTextareaInput);

                whatTextarea.addEventListener('blur', () => whatTextarea.value = toSentenceCase(whatTextarea.value));
                whyTextarea.addEventListener('blur', () => whyTextarea.value = toSentenceCase(whyTextarea.value));

                fileActionType.addEventListener('change', (e) => {
                    const pastTenseAction = getPastTense(e.target.value);
                    whatLabel.textContent = `What was ${pastTenseAction}?`;
                    whyLabel.textContent = `Why was it ${pastTenseAction}?`;
                    updateActionTypeSelects();
                });

                getBySelector('.remove-btn', entry).addEventListener('click', () => {
                    const fileList = getBySelector('.file-list', entry);
                    const file = fileList.querySelector('span')?.textContent;
                    if (file) {
                        handledFileChanges.delete(file);
                    }
                    entry.remove();
                    updateActionTypeSelects();
                });
                
                attachFileExplorerListeners(entry);
                updateActionTypeSelects();
                renderFileList([], getBySelector('.file-list', entry));
            };
            
            const createReferenceEntry = () => {
                const id = referenceEntryIdCounter++;
                const newEntryHtml = referenceEntryTemplateHtml.replace(/{id}/g, id).replace(/{displayId}/g, id + 1);
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = newEntryHtml;
                const newEntry = tempDiv.firstElementChild;
                referenceEntriesContainer.appendChild(newEntry);
                populateIssueCombobox(getBySelector('select[id^="references-"]', newEntry));
                getBySelector('.remove-btn', newEntry).addEventListener('click', () => newEntry.remove());
            };

            const resetForm = () => {
                commitType.value = '';
                scope.value = '';
                description.value = '';
                repoOwner.value = 'NinjaMonkeyGames';
                repoName.value = 'full-stack-development-template';
                githubToken.value = '';
                signOffName.value = 'Daniel Mallett';
                signOffEmail.value = 'daniel.mallett@ninjamonkeygames.com';
                outputMessage.textContent = 'Click "Generate Commit Message" to see the output here.';

                fileEntryIdCounter = 1;
                referenceEntryIdCounter = 0;
                handledFileChanges.clear();

                fileEntriesContainer.innerHTML = '';
                referenceEntriesContainer.innerHTML = '';

                const firstFileEntry = createFileEntry();
                createReferenceEntry();

                updateCharCounter();
                displayAlert('All fields have been cleared.', false);
            };

            const displayAlert = (message, isError) => {
                const alertBox = document.createElement('div');
                alertBox.textContent = message;
                alertBox.className = `alert-box ${isError ? 'error' : ''}`;
                document.body.appendChild(alertBox);
                setTimeout(() => alertBox.remove(), 3000);
            };

            const isDefaultEntryModified = () => {
                const defaultEntry = getBySelector('.file-entry[data-id="0"]');
                if (!defaultEntry) return true; // It's been removed or changed, so it counts as modified.

                const actionSelect = getBySelector('select[id^="file-action-type-"]', defaultEntry);
                const fileList = getBySelector('.file-list', defaultEntry);
                const whatText = getBySelector('textarea[id^="what-text-"]', defaultEntry);
                const whyText = getBySelector('textarea[id^="why-text-"]', defaultEntry);

                // It's unmodified if action is empty, no file is selected, and both text areas are empty.
                const isUnmodified = !actionSelect.value && fileList.children.length === 0 && !whatText.value.trim() && !whyText.value.trim();
                
                return !isUnmodified;
            };

            const watchFiles = async () => {
                try {
                    const response = await fetch('?action=watch');
                    const { added, deleted, addedHeadings, deletedHeadings } = await response.json();

                    const allDeleted = [...deleted, ...deletedHeadings];
                    const allAdded = [...added, ...addedHeadings];

                    allDeleted.forEach(item => {
                        let entryFoundAndRemoved = false;
                        const allEntries = getAllBySelector('.file-entry');
                        for (const entry of allEntries) {
                            const actionSelect = getBySelector('select[id^="file-action-type-"]', entry);
                            const fileList = getBySelector('.file-list', entry);
                            const listedItem = fileList.querySelector('span')?.textContent;

                            if (listedItem === item && actionSelect.value === 'Add') {
                                entry.remove();
                                handledFileChanges.delete(item);
                                entryFoundAndRemoved = true;
                                break;
                            }
                        }

                        if (!entryFoundAndRemoved && !handledFileChanges.has(item)) {
                            handleNewChange(item, 'Delete');
                        }
                    });

                    allAdded.forEach(item => {
                        handleNewChange(item, 'Add');
                    });

                } catch (error) {
                    console.error('File watcher error:', error);
                    clearInterval(fileWatcherInterval);
                }
            };

            const handleNewChange = (item, action) => {
                if (handledFileChanges.has(item)) return;

                let targetEntry = null;
                const defaultEntry = getBySelector('.file-entry[data-id="0"]');

                if (defaultEntry && !isDefaultEntryModified()) {
                    targetEntry = defaultEntry;
                } else {
                    targetEntry = createFileEntry();
                }

                if (targetEntry) {
                    const actionSelect = getBySelector('select[id^="file-action-type-"]', targetEntry);
                    actionSelect.value = action;
                    actionSelect.dispatchEvent(new Event('change'));
                    
                    const fileList = getBySelector('.file-list', targetEntry);
                    renderFileList([item], fileList);
                    
                    if (action === 'Add' && !item.includes(' :: ')) {
                         const fileItem = getBySelector(`.file-explorer li[data-path="${item}"]`, targetEntry);
                         if (fileItem) {
                             fileItem.classList.add('selected');
                         }
                    }
                    
                    handledFileChanges.add(item);
                }
            };

            // Initial setup calls
            setupFileEntry(getBySelector('.file-entry[data-id="0"]'));
            createReferenceEntry();
            addFileActionBtn.addEventListener('click', createFileEntry);
            addReferenceBtn.addEventListener('click', createReferenceEntry);
            fetchIssuesBtn.addEventListener('click', fetchIssues);
            clearBtn.addEventListener('click', resetForm);
            updateCharCounter();
            fetchIssues();

            // Start the file watcher
            const fileWatcherInterval = setInterval(watchFiles, 3000); // Check every 3 seconds
            
            const wrapText = (text, maxLength) => {
                const lines = text.split('\n');
                let wrappedText = [];
                lines.forEach(line => {
                    let currentLine = '';
                    const words = line.split(' ');
                    for (const word of words) {
                        if (word.length > maxLength) {
                            if (currentLine) wrappedText.push(currentLine.trim());
                            let tempWord = word;
                            while(tempWord.length > 0) {
                                wrappedText.push(tempWord.substring(0, maxLength));
                                tempWord = tempWord.substring(maxLength);
                            }
                            currentLine = '';
                        } else if (currentLine.length + word.length + 1 > maxLength) {
                            wrappedText.push(currentLine.trim());
                            currentLine = word;
                        } else {
                            currentLine += (currentLine ? ' ' : '') + word;
                        }
                    }
                    if (currentLine) wrappedText.push(currentLine.trim());
                });
                return wrappedText.join('\n');
            };

            const validateForm = () => {
                const fields = {
                    "Commit Type": commitType, "Scope": scope, "Description": description,
                    "Sign-off Name": signOffName, "Sign-off Email": signOffEmail
                };
                for (const [name, field] of Object.entries(fields)) {
                    if (!field.value.trim()) return { valid: false, message: `Please fill out the '${name}' field.` };
                }
                if ((`${commitType.value}(${scope.value}): ${description.value}`).length > 50) {
                    return { valid: false, message: 'The commit title cannot be longer than 50 characters.' };
                }
                if (/[A-Z]/.test(description.value)) {
                    return { valid: false, message: 'The description must be entirely in lowercase.' };
                }
                const fileEntries = getAllBySelector('.file-entry');
                if (fileEntries.length === 0) return { valid: false, message: 'Please add at least one file action.' };
                for (const entry of fileEntries) {
                    if (!getBySelector('select[id^="file-action-type-"]', entry).value) return { valid: false, message: 'Please select an action type for all file actions.' };
                    if (getBySelector('.file-list', entry).children.length === 0) return { valid: false, message: 'Please select a file for each file action.' };
                    if (!getBySelector('textarea[id^="what-text-"]', entry).value.trim()) return { valid: false, message: `Please fill out the 'What?' field.` };
                    if (!getBySelector('textarea[id^="why-text-"]', entry).value.trim()) return { valid: false, message: `Please fill out the 'Why?' field.` };
                }
                for (const entry of getAllBySelector('.reference-entry')) {
                    if (!getBySelector('select[id^="references-"]', entry).value) return { valid: false, message: `Please select an issue for the reference.` };
                }
                return { valid: true };
            };
            
            generateBtn.addEventListener('click', async () => {
                const validation = validateForm();
                if (!validation.valid) {
                    displayAlert(validation.message, true);
                    return;
                }
                
                let header = `${commitType.value}(${scope.value}): ${description.value.trim()}`;
                let message = `${header}\n\n`;

                const actions = { Add: [], Fix: [], Update: [], Delete: [] };
                getAllBySelector('.file-entry').forEach(entry => {
                    const actionType = getBySelector('select[id^="file-action-type-"]', entry).value;
                    actions[actionType].push({
                        files: Array.from(getBySelector('.file-list', entry).children).map(li => li.querySelector('span').textContent),
                        what: toSentenceCase(getBySelector('textarea[id^="what-text-"]', entry).value),
                        why: toSentenceCase(getBySelector('textarea[id^="why-text-"]', entry).value)
                    });
                });

                const appendActionDetails = (title, actionItems) => {
                    if (actionItems.length === 0) return;
                    message += `${title}:\n\n`;
                    actionItems.forEach(item => {
                        message += item.files.map(f => wrapText(f, 72)).join('\n') + '\n\n';
                        message += `What was ${getPastTense(title)}?\n\n${wrapText(item.what, 72)}\n\n`;
                        message += `Why was it ${getPastTense(title)}?\n\n${wrapText(item.why, 72)}\n\n`;
                    });
                };
                
                appendActionDetails('Add', actions.Add);
                appendActionDetails('Fix', actions.Fix);
                appendActionDetails('Update', actions.Update);
                appendActionDetails('Delete', actions.Delete);

                getAllBySelector('.reference-entry').forEach(entry => {
                    const refType = getBySelector('select[id^="reference-type-"]', entry).value;
                    const refNum = getBySelector('select[id^="references-"]', entry).value;
                    if (refNum) message += `${refType} #${refNum}\n`;
                });

                if (signOffName.value && signOffEmail.value) {
                    message += `\nSigned-off-by: ${signOffName.value.trim()} <${signOffEmail.value.trim()}>`;
                }

                outputMessage.textContent = message;

                try {
                    const response = await fetch(window.location.href, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ commitMessage: message })
                    });
                    const result = await response.json();
                    displayAlert(result.success ? 'Commit message written to .git/COMMIT_EDITMSG!' : `Error: ${result.error}`, !result.success);
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
                try {
                    document.execCommand('copy');
                    displayAlert('Commit message copied to clipboard!', false);
                } catch (err) {
                    displayAlert('Failed to copy text.', true);
                }
                document.body.removeChild(textarea);
            });
            
        });
    </script>
</body>
</html>
