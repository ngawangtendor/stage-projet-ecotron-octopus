<?php

// Charger les dépendances nécessaires
require 'vendor/autoload.php';

// Utiliser la classe Parsedown pour convertir le Markdown en HTML
use Parsedown;

// Vérifier si les paramètres 'dir' et 'file' sont définis dans l'URL
if (isset($_GET['dir']) && isset($_GET['file'])) {
    // Décoder les paramètres pour obtenir le chemin du fichier
    $directory = urldecode($_GET['dir']);
    $file = urldecode($_GET['file']);
    $fullPath = $directory . DIRECTORY_SEPARATOR . $file;

    // Vérifier si le fichier existe
    if (file_exists($fullPath)) {
        // Obtenir l'extension du fichier
        $fileExtension = pathinfo($file, PATHINFO_EXTENSION);

        // Si l'extension est 'md', c'est un fichier Markdown
        if ($fileExtension == 'md') {
            // Lire le contenu du fichier Markdown
            $markdownContent = file_get_contents($fullPath);
            // Convertir le Markdown en HTML
            $parsedown = new Parsedown();
            $htmlContent = $parsedown->text($markdownContent);

            // Afficher le contenu HTML
            echo $htmlContent;
        } else {
            // Si ce n'est pas un fichier Markdown, afficher un message d'erreur
            echo 'Le fichier n\'est pas un fichier markdown.';
        }
    } else {
        // Si le fichier n'existe pas, afficher un message d'erreur
        echo 'Le fichier spécifié n\'existe pas.';
    }
} else {
    // Si aucun fichier n'est spécifié, inclure le script pour lister les dossiers
    include "browse.php";
}
?>