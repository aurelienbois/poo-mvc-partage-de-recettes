<?php
require_once ('models/Recipe.class.php');
ob_start(); // start c'est comme une banane dans le pot d'échappement de PHP
?>
<h1>Liste de nos recettes</h1>
<div class="allCards" style="display: flex; flex-wrap: nowrap; justify-content: space-evenly; align-items: center; flex-direction: row;">
    <?php  foreach ($recipes as $r) { ?>
    <div class="card mb-5 ml-5" style="width: 600px;">
        <a href="#" class="post text-body text-decoration-none" style="display:flex;flex-direction:row;">
            <img src="<?= $r->getRecipeImage() ?>" alt="..." style="border-radius: 15px;">
            <div class="content">
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
            </div>
        </a>
        <div class="card-body">
            <a href="blog/editRecipe?id=<?= $r->getId() ?>" class="card-link">Modifier</a>
            <a href="blog/deleteRecipe?id=<?= $r->getId() ?>" class="card-link">Supprimer</a>
        </div>
    </div>
    <?php } ?>
</div>

<a href="blog/addRecipe"><button type="button" class="btn btn-secondary">Ajouter une recette</button></a>
<?php
$title = 'Blog ~ Partage de recettes';
$content = ob_get_clean(); // clean c'est comme retirer la banane du pot d'échappement
require_once 'template.php';