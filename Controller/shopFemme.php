<?php

require(dirname(__FILE__).'/../Model/Article.php');

    $article = new Article();

    $data = $article->findAllWomanArticle(); 

require(dirname(__FILE__).'/../View//Html/shopFemme.php');
