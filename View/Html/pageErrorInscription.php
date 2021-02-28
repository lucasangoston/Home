<?php ob_start(); ?>
<h1 class="display-6">Oups..</h1>
<p class="lead">Il semblerait que cette adresse mail <span id='mailUser'> <?= $_POST['mail'] ?> </span> soit déjà reliée à un compte.</p>
<hr class="my-4">
<p class="lead">
    <a href="index.php?page=inscription"> Retour Inscription </a>
</p>
<br>
<p>
    <a href="index.php" > Retour Accueil </a>
</p>
<?php 

$content = ob_get_clean();

require(dirname(__FILE__).'/templateError.php');
?>