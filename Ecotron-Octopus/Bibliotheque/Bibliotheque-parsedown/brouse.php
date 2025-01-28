<?php
// Configuration des images
$images = [
    'dossier' => 'image/folder_4673908.png',
    'fichier' => 'image/icons8-fichier-96.png',
    'pdf' => 'img/icons8-fichier-96.png',
    'image' => 'img/icons8-fichier-96.png',
    'default' => 'img/icons8-fichier-96.png'
];

function list_dir($name) {
    global $images;
    
    if ($dir = opendir($name)) {
        echo '<div class="container-fluid mt-3">';
        echo '<div class="row g-3">'; // g-3 pour l'espace entre les éléments
        
        while (($file = readdir($dir)) !== false) {
            if ($file != "." && $file != "..") {
                $fullPath = $name . '/' . $file;
                $isDir = is_dir($fullPath);
                
                // Déterminer l'image à utiliser
                $icon = $isDir ? $images['dossier'] : $images['fichier'];
                
                // Gestion des types de fichiers spécifiques
                if (!$isDir) {
                    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                    if ($ext === 'pdf') $icon = $images['pdf'];
                    if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) $icon = $images['image'];
                }

                echo '<div class="col-3 col-sm-2.5 col-md-1 col-lg-2">';
                echo '<div class="text-center p-2 file-item">';
                
                // Lien cliquable
                if ($isDir) {
                    echo '<a href="brouse.php?dir=' . urlencode($fullPath) . '" class="text-decoration-none text-dark">';
                } else {
                    echo '<a href="doc.php?dir=' . urlencode($name) . '&file=' . urlencode($file) . '" class="text-decoration-none text-dark">';
                }
                
                // Image avec hover effect
                echo '<img src="' . $icon . '" class="img-fluid mb-2 file-image" alt="' . htmlspecialchars($file) . '">';
                
                // Nom du fichier/dossier
                echo '<div class="file-name small">' . htmlspecialchars($file) . '</div>';
                echo '</a></div></div>';
            }
        }
        
        echo '</div></div>';
        closedir($dir);
    }
}

// Ajout du CSS Bootstrap + personnalisation
echo '
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
.file-image {
    width: 80px;
    height: 80px;
    object-fit: contain;
    transition: transform 0.2s;
}

.file-item:hover .file-image {
    transform: scale(1.1);
}

.file-name {
    word-break: break-word;
    max-width: 100px;
    margin: 0 auto;
}

.file-item {
    padding: 10px;
    border-radius: 8px;
}

.file-item:hover {
    background: #f8f9fa;
}
</style>';

// Sécurité et traitement
if (isset($_GET['dir'])) {
    $directory = urldecode($_GET['dir']);
    // Vérification de sécurité du chemin
    if(!verifyPath($directory)) {
        die('Accès non autorisé');
    }
    list_dir($directory);
} else {
    list_dir("Octopus");
}

// Fonction de vérification de sécurité
function verifyPath($path) {
    $base = realpath('Octopus');
    $userPath = realpath($path);
    return $userPath && strpos($userPath, $base) === 0;
}
?>