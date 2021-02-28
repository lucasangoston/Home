<?php ob_start(); ?>
<h3 class="display-6">Votre compte à bien été créer !</h3>
<br>
<p class="lead">Félicitations <span id='mailUser'> <?= $_POST['firstName'] ?> </span> ! Vous n'avez plus qu'à vous connectez pour profitez des nombreux avantages !</p>
<hr class="my-4">
<br>
<p>
    <a href="index.php" > Retour Accueil </a>
</p>
<?php 

$content = ob_get_clean();

require(dirname(__FILE__).'/template.php');
?>