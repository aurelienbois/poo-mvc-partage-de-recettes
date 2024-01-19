<?php
require_once('models/RecipeManager.class.php');

class BlogController {
    private $recipeManager;

    public function __construct() {
        $this->recipeManager = new RecipeManager();
    }

    public function displayRecipes() {
        $recipes = $this->recipeManager->getRecipesFromDb();
        require_once('views/blog.view.php');
    }

    public function create() {
        include('views/crud/recipe_create.view.php');
    }

    public function store() {
        var_dump($_POST);
        $title = $_POST['title'];
        $description = $_POST['description'];
        $ingredients = $_POST['ingredients'];
        $instructions = $_POST['instructions'];
        $image = $_POST['image'];

        $recipe = new Recipe($title, $description, $image, $ingredients, $instructions, $image);
        $this->recipeManager->addRecipe($recipe);

        header('Location: index.php');
    }

    public function edit($id) {
        $recipe = $this->recipeManager->getRecipe($id);
        require_once('views/crud/recipe_edit.view.php');
    }

    public function update($id) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $ingredients = $_POST['ingredients'];
        $instructions = $_POST['instructions'];
        $image = $_POST['image'];

        $recipe = new Recipe($title, $description, $image, $ingredients, $instructions, $image);
        $this->recipeManager->updateRecipe($id, $recipe);

        header('Location: index.php');
    }

    public function delete($id) {
        $this->recipeManager->deleteRecipe($id);
        header('Location: index.php');
    }
}