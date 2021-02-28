<?php

require_once(dirname(__FILE__).'/../Model/Article.php');

require_once(dirname(__FILE__).'/../Model/Category.php');

$category = new Category();
$dataCategory = $category->findAll();

if(isset($_POST['picture']))
{
    $article = new Article();
    $article->setPictureUrl($_POST['picture']);
    $article->setName($_POST['name']);
    $article->setPrice($_POST['price']);
    $article->setDescription($_POST['description']);
    $article->setIdCategory($_POST['category']);
    $article->setStock($_POST['stock']);
    $article->setActive($_POST['active']);
    $article->setSex($_POST['sex']);
    $article->insertArticle();




    header("location:".  "index.php?page=article");
    exit();
}

require_once(dirname(__FILE__).'/../View/Html/articleAdd.php');
?>