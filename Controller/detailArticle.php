<?php
require_once('Model/Article.php');

$value = $_GET['id'];
$article = new Article();
if($article->findOneById($value) || $article->findOneByName($search))
{
    $name = $article->getName();
    $picture = $article->getPictureUrl();
    $price = $article->getPrice();
    $description = $article->getDescription();

    require_once('View/Html/detailArticle.php');
}


