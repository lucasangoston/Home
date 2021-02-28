<?php

require_once(dirname(__FILE__).'/../Model/Article.php');

$id = $_GET['id'];

$article = new Article();
$article-> findOneById($id);


$picture = $article->getPictureUrl();
$name = $article->getName();
$price = $article->getPrice();
$description = $article->getDescription();
$active = $article->getActive();
$sex = $article->getSex();

require_once(dirname(__FILE__).'/../View/Html/articleUpdate.php');

?>