<?php
// Function to get all files and folders in a directory
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
function buildListItems($directory) {
    $items = getDirectoryTree($directory);
    ksort($items); // Sort the items alphabetically

    foreach ($items as $name => $isFolder) {
        $path = htmlspecialchars($directory . DIRECTORY_SEPARATOR . $name);
        $class = $isFolder ? 'folder' : 'file';

        // Add a "li" element for each item
        echo '<li class="' . $class . '" data-path="' . $path . '">';

        // Add the icon and name
        if ($isFolder) {
            echo '<span class="name">&#x1F4C1; ' . htmlspecialchars($name) . '</span>';
            echo '<ul>'; // Start a new nested list for sub-items
            buildListItems($directory . DIRECTORY_SEPARATOR . $name);
            echo '</ul>'; // Close the nested list
        } else {
            echo '<span class="name">&#x1F4C4; ' . htmlspecialchars($name) . '</span>';
        }
        echo '</li>';
    }
}

// Start with the current directory
$startDirectory = '.';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File and Folder Explorer</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
        }

        .file-explorer {
            width: 300px;
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #f9f9f9;
        }

        .file-explorer ul {
            list-style-type: none;
            padding-left: 15px; /* Indent sub-lists */
        }

        .file-explorer ul li {
            line-height: 1.5;
            cursor: pointer;
            padding: 2px 5px; /* Add some padding for a better click area */
            border-radius: 3px;
        }

        /* Highlight the selected item */
        .file-explorer ul li.selected {
            background-color: #e0e0e0;
        }

        /* Change cursor to pointer for all list items */
        .file-explorer .folder,
        .file-explorer .file {
            cursor: pointer;
        }

        /* Hide nested lists by default */
        .file-explorer .folder > ul {
            display: none;
        }

        /* Show nested lists when the folder is expanded */
        .file-explorer .folder.expanded > ul {
            display: block;
        }

        .file-explorer .name {
            user-select: none; /* Prevent text selection */
        }
    </style>
</head>
<body>

<h1>File and Folder Explorer</h1>

<div class="file-explorer">
    <ul>
        <?php buildListItems($startDirectory); ?>
    </ul>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const fileExplorer = document.querySelector('.file-explorer');

        fileExplorer.addEventListener('click', (event) => {
            const clickedItem = event.target.closest('li');

            if (clickedItem) {
                // First, remove the 'selected' class from all other items
                document.querySelectorAll('.file-explorer ul li').forEach(item => {
                    item.classList.remove('selected');
                });

                // Add the 'selected' class to the item that was just clicked
                clickedItem.classList.add('selected');

                // If the clicked item is a folder, toggle the expanded state
                if (clickedItem.classList.contains('folder')) {
                    clickedItem.classList.toggle('expanded');
                }
            }
        });
    });
</script>

</body>
</html>