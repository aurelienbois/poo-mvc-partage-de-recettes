<?php

// activer les messages d'erreur
ini_set('display_errors', 1); // utile pour les développeurs
ini_set('display_startup_errors', 1); // utile pour les développeurs
error_reporting(E_ALL);

//url = /recipe/lire/titre-de-la-recette
echo $_SERVER['REQUEST_URI'];

$url = explode(
    '/', // séparateur
    filter_var( // nettoyage
        $_SERVER['REQUEST_URI'], // url
        FILTER_SANITIZE_URL // nettoyage
    )
);

$lastUrl = end($url); // on récupère le dernier élément du tableau8

echo '<pre>';
echo 'lastUrl : ' . $lastUrl . '<br>';
echo '</pre>';

$map = [
    'accueil' => ['acceuil', 'accueil', ''],
    'blog' => ['blog', 'blog', ''],
    'contact' => ['contact', 'contact', ''],
    '' => ['accueil', 'accueil', ''],
];

if (is_numeric($lastUrl)) {
    $controller = 'blog';
    $action = 'lire';
    $id = $lastUrl;
} elseif (isset($map[$lastUrl])) {
    list($controller, $action, $id) = $map[$lastUrl];
} else {
    $controller = 'accueil';
    $action = 'accueil';
    $id = '';
}



//on ne garde que les 3 derniers éléments du tableau
list($controller,$action,$id) = array_slice($url, -3, 3, false);

echo '<pre>';
print_r($url);
echo '</pre>';

// routeur
switch ($controller) {
    case 'accueil':
        require_once 'views/accueil.view.php';
        break;
    case 'blog':
        require_once 'controllers/Blog.controller.php';
        $blogController = new BlogController();
        $blogController->displayRecipes();
        break;
    default:
        require_once 'views/accueil.view.php'; // page par défaut
        break;
}

?>