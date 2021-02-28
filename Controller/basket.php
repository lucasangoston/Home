<?php

require(dirname(__FILE__).'/../Model//Article.php');
require(dirname(__FILE__).'/../Model//Basket.php');

$basket =  new Basket();
$data_basket = $basket->findAllByUser();

if (isset($_GET['id'])){
    $basket->deleteArticleById($_GET['id'],$_SESSION['idUser']);
    $delai=0;
    $url='index.php?page=basket';
    header("Refresh: $delai;url=$url");
}

function total()
{
    $basket =  new Basket();
    $data_basket = $basket->findAllByUser();
    for($nb=0;$nb<sizeof($data_basket);$nb=$nb+1)
    {
        $article = new Article();
        $data = $article->findAllbyUser($data_basket[$nb]);
        for($i=0;$i<sizeof($data);$i=$i+1)
        {

           $total[]=$data[$i]['price'];
        }
    }

    $total = array_sum($total);

    echo  $total.'€';
}

require(dirname(__FILE__).'/../View//Html/basket.php');





