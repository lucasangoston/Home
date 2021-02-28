<?php

require(dirname(__FILE__).'/../Model/Article.php');

$article = new Article();
$data = $article->findAll(); 

$value = $_GET['id'];

if($value == 'add')
{
    require(dirname(__FILE__).'/../Controller/articleAdd.php');
}   
else if($value == 'update')
{
    require(dirname(__FILE__).'/../Controller/articleUpdate.php');
}
else if($value == 'delete')
{
    require(dirname(__FILE__).'/../View//Html/articleDelete.php');
}
else
{
    require(dirname(__FILE__).'/../View//Html/article.php');
}

