<?php

// Load necessary dependencies
require 'vendor/autoload.php';

// Use the Parsedown class to convert Markdown to HTML
use Parsedown;

// Check if the 'dir' and 'file' parameters are set in the URL
if (isset($_GET['dir']) && isset($_GET['file'])) {
    // Decode the parameters to get the file path
    $directory = urldecode($_GET['dir']);
    $file = urldecode($_GET['file']);
    $fullPath = $directory . DIRECTORY_SEPARATOR . $file;

    // Check if the file exists
    if (file_exists($fullPath)) {
        // Get the file extension
        $fileExtension = pathinfo($file, PATHINFO_EXTENSION);

        // If the extension is 'md', it's a Markdown file
        if ($fileExtension == 'md') {
            // Read the content of the Markdown file
            $markdownContent = file_get_contents($fullPath);
            // Convert the Markdown to HTML
            $parsedown = new Parsedown();
            $htmlContent = $parsedown->text($markdownContent);

            // Display the HTML content
            echo $htmlContent;
        } else {
            // If it's not a Markdown file, display an error message
            echo 'The file is not a Markdown file.';
        }
    } else {
        // If the file doesn't exist, display an error message
        echo 'The specified file does not exist.';
    }
} else {
    // If no file is specified, include the script to list directories
    include "browse.php";
}
?>
