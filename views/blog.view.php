<?php
require_once ('models/Recipe.class.php');
ob_start(); // start c'est comme une banane dans le pot d'échappement de PHP
?>
<h1>Blog</h1>
<?php  foreach ($recipes as $r) { ?>
<div class="card mb-3">
    <a href="#" class="post text-body text-decoration-none">
        <img src="<?= $r->getRecipeImage() ?>" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $r->getRecipeTitle() ?></h5>
            <p class="card-text"><?= $r->getRecipeDescription() ?></p>
        </div>
        <div>
            <ul>
                <?php
                foreach ($r->getRecipeIngredients() as $ingredient){
                ?>
                <li><?= $ingredient ?></li>
                <?php
                };
                ?>
            </ul>
        </div>
        <div>
            <ul>
            <?php
                foreach ($r->getRecipeInstructions() as $instruction){
                ?>
                <li><?= $instruction ?></li>
                <?php
                };
                ?>
            </ul>
        </div>
    </a>
    <div class="card-body">
        <a href="#" class="card-link">Modifier</a>
        <a href="#" class="card-link">Supprimer</a>
    </div>
</div>
<?php } ?>
<a href="#"><button type="button" class="btn btn-secondary">Ajouter une recette</button></a>
<?php
$title = 'Blog ~ Partage de recettes';
$content = ob_get_clean(); // clean c'est comme retirer la banane du pot d'échappement
require_once 'template.php';