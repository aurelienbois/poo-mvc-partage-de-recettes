<?php ob_start(); // start c'est comme une banane dans le pot d'échappement de PHP
?>
<h1>~ Accueil ~</h1>
<?php
$title = 'Accueil ~ Partage de recettes';
$content = ob_get_clean(); // clean c'est comme retirer la banane du pot d'échappement
require_once 'template.php';