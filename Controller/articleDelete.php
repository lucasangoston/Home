<?php
require(dirname(__FILE__).'/../Model/Article.php');

$id = $_GET['id']; 

$article = new Article();
$article-> deleteArticle($id);

header('Location: index.php?page=article');
exit();

  /**
   * https://fr.louisvuitton.com/images/is/image/lv/1/PP_VP_L/louis-vuitton-chemise-en-denim-galaxy-pr%C3%AAt-%C3%A0-porter--HGA05WJHZ650_PM2_Front%20view.jpg?wid=1056&hei=1056
   * Chemise en denim galaxy
   * 
   * 
   * Cette chemise en denim Galaxy illustre le thème de l’espace choisi pour cette saison, avec un motif imprimé par rongeage inspiré des étoiles et de la voie lactée. De coupe légèrement ample, elle comporte une fermeture à glissière en palladium brillant sur la poitrine. La poche avant passepoilée est recouverte de denim alors que la signature de la Maison est rappelée par un logo LV noir.
   * 
   * 1400
   */
?>
