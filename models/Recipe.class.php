<?php

class Recipe {
    private $id;
    private $recipe_title;
    private $recipe_description;
    private $recipe_ingredients;
    private $recipe_instructions;
    private $recipe_image;

    // static public $posts = array(); // utilisé plus loin via self::$posts

    public function __construct($id, $recipe_title, $recipe_description, $recipe_ingredients, $recipe_instructions, $recipe_image) {
        $this->id = $id;
        $this->recipe_title = $recipe_title;
        $this->recipe_description = $recipe_description;
        $this->recipe_ingredients = $recipe_ingredients;
        $this->recipe_instructions = $recipe_instructions;
        $this->recipe_image = $recipe_image;
    }

    public function getId() { return $this->id; }
    public function getRecipeTitle() { return $this->recipe_title; }
    public function setRecipeTitle($recipe_title) { $this->recipe_title = $recipe_title; }
    public function getRecipeDescription() { return $this->recipe_description; }
    public function setRecipeDescription($recipe_description) { $this->recipe_description = $recipe_description; }
    public function getRecipeIngredients() { return $this->recipe_ingredients; }
    public function setRecipeIngredients($recipe_ingredients) { $this->recipe_ingredients = $recipe_ingredients; }
    public function getRecipeInstructions() { return $this->recipe_instructions; }
    public function setRecipeInstructions($recipe_instructions) { $this->recipe_instructions = $recipe_instructions; }
    public function getRecipeImage() { return $this->recipe_image; }
    public function setRecipeImage($recipe_image) { $this->recipe_image = $recipe_image; }
}