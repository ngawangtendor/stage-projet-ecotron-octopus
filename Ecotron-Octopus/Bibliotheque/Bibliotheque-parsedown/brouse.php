<?php
// Fonction pour lister les fichiers et dossiers dans un répertoire donné


function list_dir($name) {
    // Ouvrir le répertoire spécifié
    if ($dir = opendir($name)) {
        echo "<ul style='list-style-type: none; padding: 0;'>";
        // Lire chaque fichier et dossier dans le répertoire
        while (($file = readdir($dir)) !== false) {
            // Ignorer les entrées "." et ".."
            if ($file != "." && $file != "..") {
                // Construire le chemin complet du fichier ou dossier
                $fullPath = $name . DIRECTORY_SEPARATOR . $file;

                // Vérifier si c'est un dossier
                if (is_dir($fullPath)) {
                    // Afficher un lien vers le dossier avec une icône de dossier
                    echo '<li>📁 <a href="brouse.php?dir=' . urlencode($fullPath) . '" target="_blank">' . htmlspecialchars($file) . '/</a></li>';
                } else {
                    // Afficher un lien vers le fichier avec une icône de fichier
                    echo '<li>📄 <a href="doc.php?dir=' . urlencode($name) . '&file=' . urlencode($file) . '" target="_blank">' . htmlspecialchars($file) . '</a></li>';
                }
            }
        }
        echo "</ul>";
        // Fermer le répertoire
        closedir($dir);
    }
}

// Vérifier si le paramètre 'dir' est défini dans l'URL
if (isset($_GET['dir'])) {
    // Décoder le paramètre pour obtenir le répertoire
    $directory = urldecode($_GET['dir']);
    // Lister les fichiers et dossiers dans le répertoire spécifié
    list_dir($directory);
} else {
    // Par défaut, lister les fichiers et dossiers dans le répertoire "Octopus"
    list_dir("Octopus");
}
?>