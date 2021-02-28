<?php ob_start(); ?>
<h1 class="display-6">Oups..</h1>
<p class="lead">Il semblerait que votre mot de passe ou votre adresse mail soit incorrecte ...</p>
<hr class="my-4">
<p class="lead">
    <a href="index.php?page=connexion"> Retour Connexion </a>
</p>
<br>
<p>
    <a href="index.php" > Retour Accueil </a>
</p>
<?php 
$content = ob_get_clean();

require(dirname(__FILE__).'/templateError.php');
?>