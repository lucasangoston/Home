<?php

require_once(dirname(__FILE__).'/../Model/Article.php');

$search = $_POST['search'];

$article = new Article();

if($article->findOneByName($search))
{
    require(dirname(__FILE__).'/detailArticle.php');
}
else{
    ob_start();
    ?>
    <h1 class="display-6">Article Introuvable...</h1>
        <br>
        <p> semblerait que l'article que vous cherchez ne soit pas disponible dans notre magasin.</p>
    <hr class="my-4">
    <p class="lead">
        <a href="index.php?page=shopFemme"> Retour Article </a>
    </p>
    <br>
    <p>
        <a href="index.php" > Retour Accueil </a>
    </p>
    <?php
    $content = ob_get_clean();

    require_once(dirname(__FILE__).'/../View//Html/templateError.php');
}

