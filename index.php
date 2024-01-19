<?php

// activer les messages d'erreur
ini_set('display_errors', 1); // utile pour les développeurs
ini_set('display_startup_errors', 1); // utile pour les développeurs
error_reporting(E_ALL);

$url = explode(
    '/', // séparateur
    filter_var( // nettoyage
        $_SERVER['REQUEST_URI'], // url
        FILTER_SANITIZE_URL // nettoyage
    )
);

$lastUrl = end($url); // on récupère le dernier élément du tableau

$map = [
    'accueil' => ['accueil', 'accueil', ''],
    'blog' => ['blog', 'lire', ''],
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