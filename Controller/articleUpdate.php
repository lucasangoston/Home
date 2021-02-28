<?php

    require_once(dirname(__FILE__).'/../Model/Article.php');
    require_once(dirname(__FILE__).'/../Model/Category.php');

    $id = $_GET['id'];

    $article = new Article();
    $article-> findOneById($id);

    $category = new Category();
    $dataCategory = $category->findAll();

    if(isset($_POST['picture']))
    {
        $article->setPictureUrl($_POST['picture']);
        $article->setName($_POST['name']);
        $article->setPrice($_POST['price']);
        $article->setDescription($_POST['description']);
        $article->setIdCategory($_POST['category']);
        $article->setStock($_POST['stock']);
        $article->setActive($_POST['active']);
        $article->setSex($_POST['sex']);
        $article->updateArticle($id);

        header("location:".  "index.php?page=article");
        exit();
    }
    else{
        $picture = $article->getPictureUrl();
        $name = $article->getName();
        $price = $article->getPrice();
        $description = $article->getDescription();
        $category = $article->getIdCategory();
        $stock = $article->getStock();
        $active = $article->getActive();
        $sex = $article->getSex();
    }

    require_once(dirname(__FILE__).'/../View/Html/articleUpdate.php');
?>