<?php
ob_start();
?>

<form action="blog/storeRecipe" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="recipe_title">Titre de la recette</label>
        <input type="text" class="form-control" id="recipe_title" name="recipe_title" required>
    </div>
    <div class="form-group">
        <label for="recipe_description">Description</label>
        <textarea class="form-control" id="recipe_description" name="recipe_description" required></textarea>
    </div>
    <div class="form-group">
        <label for="recipe_ingredients">Ingrédients</label>
        <textarea class="form-control" id="recipe_ingredients" name="recipe_ingredients" required></textarea>
    </div>
    <div class="form-group">
        <label for="recipe_instructions">Instructions</label>
        <textarea class="form-control" id="recipe_instructions" name="recipe_instructions" required></textarea>
    </div>
    <div class="form-group">
        <label for="recipe_image">Image</label>
        <input type="file" class="form-control-file" id="recipe_image" name="recipe_image">
    </div>
    <button type="submit" class="btn btn-primary">Ajouter la recette</button>
</form>

<?php
$title = 'Ajouter une recette';
$content = ob_get_clean();
require_once 'template.php';
?>