<?php

require(dirname(__FILE__).'/../Model/Parcel.php');
require(dirname(__FILE__).'/../Model/Basket.php');
require(dirname(__FILE__).'/../Model/Article.php');
require(dirname(__FILE__).'/../Model/ParcelDetail.php');

$parcel = new Parcel();
$dateParcel = $parcel->getDate();
$parcel->insertParcel();

$basket  =  new Basket();
$items = $basket->findAllByUser();

foreach($items as $key => $value){

    $article = new Article();
    $item = $article->findOneById($value);

    $parcelDetail = new ParcelDetail();
    $parcelDetail->setIdArticle($value);

    $idParcel = $parcel->findOneByIdUser($dateParcel);
    $parcelDetail->setIdParcel($idParcel->getIdParcel());
    $parcelDetail->setTotal($item->getPrice());
    $parcelDetail->insertParcelDetail();

    $basket->deleteArticleById($value,$_SESSION['idUser']);
}

require(dirname(__FILE__).'/../View/Html/parcel.php');





