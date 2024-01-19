<?php
require_once('models/Model.class.php');
require_once('models/Recipe.class.php');

class RecipeManager extends Model {
    private $recipes = [];

    public function getRecipes() {
        return $this->recipes;
    }

    public function addRecipe(Recipe $recipe) {
        // Obtient l'instance de PDO
        $pdo = $this->getBdd();

        // Prépare la requête SQL
        $stmt = $pdo->prepare("INSERT INTO recipes (recipe_title, recipe_description, recipe_ingredients, recipe_instructions, recipe_image) VALUES (?, ?, ?, ?, ?)");

        // Lie les paramètres à la requête
        $stmt->bindValue(1, $recipe->getRecipeTitle());
        $stmt->bindValue(2, $recipe->getRecipeDescription());
        $stmt->bindValue(3, $recipe->getRecipeIngredients());
        $stmt->bindValue(4, $recipe->getRecipeInstructions());
        $stmt->bindValue(5, $recipe->getRecipeImage());

        // Exécute la requête
        $stmt->execute();
    }

    public function getRecipesFromDb() {
        // Vide le tableau $recipes
        $this->recipes = [];

        $req = $this->getBdd()->prepare('SELECT * FROM recipes');
        $req->execute();
        $recipes = $req->fetchAll(PDO::FETCH_ASSOC); 

        foreach ($recipes as $r) {
            $this->recipes[] = new Recipe(
                $r['id'],
                $r['recipe_title'],
                $r['recipe_description'],
                $r['recipe_ingredients'],
                $r['recipe_instructions'],
                $r['recipe_image']
            );
        }

        // Renvoie le tableau de recettes
        return $this->recipes;
    }

    public function getRecipe($id) {
        // Obtient l'instance de PDO
        $pdo = $this->getBdd();
    
        // Prépare la requête SQL
        $stmt = $pdo->prepare("SELECT * FROM recipes WHERE id = ?");
    
        // Lie les paramètres à la requête
        $stmt->bindValue(1, $id);
    
        // Exécute la requête
        $stmt->execute();
    
        // Récupère la recette
        $recipe = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Retourne la recette
        return $recipe;
    }

    public function updateRecipe($id, Recipe $recipe) {
        // Obtient l'instance de PDO
        $pdo = $this->getBdd();
    
        // Prépare la requête SQL
        $stmt = $pdo->prepare("UPDATE recipes SET title = ?, description = ?, image = ?, ingredients = ?, instructions = ? WHERE id = ?");
    
        // Lie les paramètres à la requête
        $stmt->bindValue(1, $recipe->getRecipeTitle());
        $stmt->bindValue(2, $recipe->getRecipeDescription());
        $stmt->bindValue(3, $recipe->getRecipeImage());
        $stmt->bindValue(4, $recipe->getRecipeIngredients());
        $stmt->bindValue(5, $recipe->getRecipeInstructions());
        $stmt->bindValue(6, $id);
    
        // Exécute la requête
        $stmt->execute();
    }

    public function deleteRecipe($id) {
        // Obtient l'instance de PDO
        $pdo = $this->getBdd();
    
        // Prépare la requête SQL
        $stmt = $pdo->prepare("DELETE FROM recipes WHERE id = ?");
    
        // Lie le paramètre à la requête
        $stmt->bindValue(1, $id);
    
        // Exécute la requête
        $stmt->execute();
    }
}