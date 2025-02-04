<?php
// Configuration of image icons for various file types
$images = [
    'dossier' => 'image/folder_4673908.png',  // Icon for folders
    'fichier' => 'image/icons8-fichier-96.png',  // Default icon for files
    'pdf' => 'image/icons8-fichier-96.png',  // Icon for PDF files
    'image' => 'image/icons8-fichier-96.png',  // Icon for image files (jpg, png, etc.)
    'default' => 'image/icons8-fichier-96.png'  // Default fallback icon
];

// Function to list the contents of a directory
function list_dir($name) {
    global $images;
    
    // Check if the directory can be opened
    if ($dir = opendir($name)) {
        echo '<div class="container-fluid mt-3">';
        echo '<div class="row g-3">'; // g-3 for spacing between items
        
        // Loop through all files and directories in the given directory
        while (($file = readdir($dir)) !== false) {
            // Skip the current directory (.) and parent directory (..)
            if ($file != "." && $file != "..") {
                $fullPath = $name . '/' . $file;  // Build the full path to the file
                $isDir = is_dir($fullPath);  // Check if the item is a directory
                
                // Determine the appropriate icon to use
                $icon = $isDir ? $images['dossier'] : $images['fichier'];
                
                // Handle specific file types for non-directories
                if (!$isDir) {
                    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));  // Get the file extension
                    // Change the icon for PDF files
                    if ($ext === 'pdf') $icon = $images['pdf'];
                    // Change the icon for image files (jpg, jpeg, png, gif)
                    if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) $icon = $images['image'];
                }

                // Output the HTML for each item in the directory
                echo '<div class="col-3 col-sm-2.5 col-md-1 col-lg-2">';
                echo '<div class="text-center p-2 file-item">';
                
                // Create a link for directories and files
                if ($isDir) {
                    echo '<a href="browse.php?dir=' . urlencode($fullPath) . '" class="text-decoration-none text-dark">';
                } else {
                    echo '<a href="doc.php?dir=' . urlencode($name) . '&file=' . urlencode($file) . '" class="text-decoration-none text-dark">';
                }
                
                // Display the icon image with a hover effect
                echo '<img src="' . $icon . '" class="img-fluid mb-2 file-image" alt="' . htmlspecialchars($file) . '">';
                
                // Display the name of the file or folder
                echo '<div class="file-name small">' . htmlspecialchars($file) . '</div>';
                echo '</a></div></div>';
            }
        }
        
        echo '</div></div>';
        closedir($dir);  // Close the directory
    }
}

// Adding Bootstrap CSS and custom styles for the page
echo 
'
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .file-image {
        width: 80px;  // Set the image width
        height: 80px;  // Set the image height
        object-fit: contain;  // Ensure image fits within the container without distortion
        transition: transform 0.2s;  // Smooth transition for hover effect
    }

    .file-item:hover .file-image {
        transform: scale(1.1);  // Scale the image on hover
    }

    .file-name {
        word-break: break-word;  // Break long words to prevent overflow
        max-width: 100px;  // Limit the width of file name
        margin: 0 auto;  // Center the file name
    }

    .file-item {
        padding: 10px;  // Padding inside each item
        border-radius: 8px;  // Rounded corners for each item
    }

    .file-item:hover {
        background: #f8f9fa;  // Light background on hover
        }
</style>';

    // Security check and directory listing
    if (isset($_GET['dir'])) {  // Check if 'dir' is passed in the URL
        $directory = urldecode($_GET['dir']);  // Decode the directory parameter
        // Verify the directory path is within the allowed base directory
        if (!verifyPath($directory)) {
            die('Access denied');  // If the path is not valid, deny access
        }
        list_dir($directory);  // List the contents of the directory
    } else {
        list_dir("Octopus");  // If no directory is specified, list the contents of the "Octopus" folder
    }

    // Function to check if the path is within the allowed directory
    function verifyPath($path) {
        $base = realpath('Octopus');  // Get the real path of the base directory
        $userPath = realpath($path);  // Get the real path of the requested directory
        return $userPath && strpos($userPath, $base) === 0;  // Ensure the path is inside the base directory
    }
    
?>
