<?php
// Load necessary dependencies
require 'Parsedown.php';

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

        // Si c'est un fichier Markdown, convertir et afficher
        if ($fileExtension == 'md') {
            $markdownContent = file_get_contents($fullPath);
            $parsedown = new Parsedown();
            $htmlContent = $parsedown->text($markdownContent);
            echo $htmlContent;
        } 
        // Pour les fichiers images, envoyer le bon en-tête et le contenu
        else {
            // Déterminer le type MIME de l'image
            $contentType = 'application/octet-stream';
            switch ($fileExtension) {
                case 'jpg':
                case 'jpeg':
                    $contentType = 'image/jpeg';
                    break;
                case 'png':
                    $contentType = 'image/png';
                    break;
                case 'gif':
                    $contentType = 'image/gif';
                    break;
                case 'bmp':
                    $contentType = 'image/bmp';
                    break;
                case 'webp':
                    $contentType = 'image/webp';
                    break;
                case 'canvas':
                    $contentType = 'canvas';
                    break;
                // Ajoutez d'autres types d'images si nécessaire
            }

            // Envoyer l'en-tête Content-Type
            header('Content-Type: ' . $contentType);

            // Envoyer le contenu de l'image
            readfile($fullPath);
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