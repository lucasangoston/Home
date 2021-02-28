<?php
require(dirname(__FILE__).'/../Model/Article.php');

    $article = new Article();

    $data = $article->findAllManArticle();

require(dirname(__FILE__).'/../View//Html/shopHomme.php');