<?php
require 'vendor/autoload.php';

use Parsedown;

$parsedown = new Parsedown();

$directories = [
    'Octopus/Vikunja' => 'Vikunja',
    'Octopus/Vikunja/README.md' => 'Vikunja',

    'Octopus/Gitlab' => 'Gitlab',
    'Octopus/Gitlab/README.md' => 'Gitlab',

    'Octopus/Portainer' => 'Portainer',
    'Octopus/Portainer/README.md' => 'Portainer',
 
    'Octopus/Facebook' => 'Facebook'
];
// Vérifie si le paramètre 'lien' est défini dans l'URL
if (isset($_GET['lien'])) {
    $lien = $_GET['lien'];

    if (file_exists($lien)) { 
        $markdown = file_get_contents($lien); // Lire le contenu du fichier
        $html = $parsedown->text($markdown); // Convertir en HTML
    } else {
        $html = "<p>Le fichier spécifié n'existe pas.</p>";
    }
} else {
    $html = "";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta nom$nom="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de serveurs disponibles</title>
</head>
<body>
    <?php if (empty($html)): ?>

        <h1>Liste de serveurs disponibles</h1>

        <?php foreach ($directories as $repertoir => $nom): ?>
            
            <?php if (is_dir($repertoir)): ?>
                <h2>

                    <a href="http://<?php echo strtolower($nom); ?>.octopus.cnrs.fr/login" target ="_blank"><?php echo $nom; ?> </a><br>
            
                    <!--Tous les README.md -->
                    <?php if (file_exists($repertoir . '/README.md')): ?>
                        <a href="index.php?lien=<?php echo $repertoir; ?>/README.md" target="_blank"><?php echo $nom; ?>-README.md</a>
                    <?php endif; ?>
                </h2>
            <?php endif; ?>
        <?php endforeach; ?>

    <!--
        <h2><a href="http://vikunja.octopus.cnrs.fr/login" target="_blank">Vikunja</a> <br>
        <a href="index.php?lien=Octopus/Vikunja/README.md" target="_blank">Vikunja-README.md</a>
        </h2>
        <h2><a href="http://gitlab.octopus.cnrs.fr/users/sign_in" target="_blank">Gitlab</a><br>
        <a href="index.php?lien=Octopus/Gitlab/README.md" target="_blank">Gitlab-README.md</a>
        </h2>
        <h2><a href="https://www.portainer.io/" target="_blank">Portainer</a><br>
        <a href="index.php?lien=Octopus/Portainer/README.md" target="_blank">Portainer-README.me</a>
        </h2>
    -->
    <?php else: ?>
        <?php echo $html; ?>
    <?php endif; ?>
</body>
</html>


