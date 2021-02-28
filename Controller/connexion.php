<?php

require(dirname(__FILE__).'/../Model/User.php');

if(empty($_POST))
{
    require(dirname(__FILE__).'/../View//Html/connexion.php');
}
else
{
    $mail = $_POST['mail'];

    $password = $_POST['password'];

    $user = new User();

    $connexion = $user->findOneByMailAndPassword($mail,$password);

    if(!$connexion)
    {
        require(dirname(__FILE__).'/../View//Html/pageErrorConnexion.php');
    }
    else
    {
        $user->logIn();

        header('Location: index.php');
        exit();
    }
}