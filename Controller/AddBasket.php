<?php

require(dirname(__FILE__).'/../Model//Parcel.php');
require(dirname(__FILE__).'/../Model//Article.php');
require(dirname(__FILE__).'/../Model//Basket.php');

$parceldetail = new Parcel();
$article = new Article();


$value = $_GET['id'];

$article->findOneById($value);
$stock = $article->getStock();

if($stock < 1)
{
    ob_start();
        ?>
            <h1 class="display-6">Oups..</h1>
            <p class="lead">Article épuisé. </p>
                <br>
                Tous nos articles sont uniques et disponibles en un seul exemplaire; il n'est donc pas possible de prendre le même article une deuxième fois.</p>
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

    require(dirname(__FILE__).'/../View//Html/templateError.php');

}
else
{
    array_push($_SESSION['parcel'],$value);

    $basket = new Basket();
    $basket->setIdArticle($value);
    $basket->insertBasket();

    $quantity = $stock - 1;
    $article->updateStock($quantity,$value);

    ob_start();
        ?>
            <h1 class="display-6">Félicitation !</h1>
            <p class="lead">Votre article à bien été ajouté à votre panier.</p>
            <hr class="my-4">
            <p class="lead">
                <a href="index.php?page=parcel"> Mon Panier </a>
            </p>
            <br>
            <p>
                <a href="index.php" > Retour Accueil </a>
            </p>
        <?php 
    $content = ob_get_clean();

    require(dirname(__FILE__).'/../View//Html/templateError.php');
}
