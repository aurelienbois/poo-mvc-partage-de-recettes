<?php
require_once('models/RecipeManager.class.php');
class BlogController
{
    private $recipeManager; // permet d'accéder aux méthodes de la classe PostManager
    public function __construct()
    {
        $this->recipeManager = new RecipeManager();
        $this->recipeManager->getRecipesFromDb();
    }
    public function displayRecipes()
    {
        global $posts; // on récupère la variable globale $posts en la créant dans l'espace de nom global
        $posts = $this->recipeManager->getRecipes(); // on récupère les posts depuis la base de données
        require_once('views/blog.view.php');
    }
}