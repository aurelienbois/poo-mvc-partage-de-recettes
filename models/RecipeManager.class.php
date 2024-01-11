<?php
require_once('models/Model.class.php');
require_once('models/Recipe.class.php');
class RecipeManager extends Model { // le extends ajoute les propriétés et méthodes de Model à PostManager soit $pdo, setBdd() et getBdd(). C'est l'héritage.
    private $recipes = [];
    public function getRecipes() { return $this->recipes; }
    public function addRecipe(Recipe $recipe) { $this->recipes[] = $recipe; }
    public function getRecipesFromDb() {
        $req = $this->getBdd()->prepare('SELECT * FROM recipes');
        $req->execute();
        $recipes = $req->fetchAll(PDO::FETCH_ASSOC); 
        foreach ($recipes as $r) {
            $this->addRecipe(new Recipe(
                $r['id'],
                $r['recipe_title'],
                $r['recipe_description'],
                $r['recipe_ingredients'],
                $r['recipe_instructions'],
                $r['recipe_image']
            ));
        }
    }
}