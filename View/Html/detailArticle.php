<html>
<head>
<title></title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="View/Css/theme.css">
<link rel="stylesheet" type="text/css" href="View/Css/accueil.css">
<link rel="stylesheet" type="text/css" href="View/Css/detailArticle.css">
<script src="https://kit.fontawesome.com/4d9375cbea.js"></script>
</head>
<body>

   <?php include('banniere.php') ?>

    <div class="align">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h3>- COLLECTION HOME - </h3>
        <h4> <?php echo $name ?> </h4>
        <ul>
            <div class = "encadrer_produit">
                <img src="<?php echo $picture ?>" width="500px">
            </div>
            <div>
                <br>
                <br>
                <h3><?php echo $price ?>€</h3>
                <br>
                <div sizeof="500px">
                    <p><?php echo $description ?></p>
            </div>
            <br/>
            <br/>
            <br/>
                <?php
                    if($_SESSION){
                        ?>
                            <form method="post" action="index.php?page=AddBasket&amp;id=<?=$value?>">
                                </fieldset>
                                    <button type="submit" class="btn btn-primary" width="16">Ajouter au panier</button>
                                </fieldset>
                            </form>
                        <?php
                    }
                    else{
                        ?>
                        <h6>Vous devez être connecté pour ajouter cet article à votre panier.</h6>
                        <br>
                        <br>
                        <form method="post" action="index.php?page=inscription">
                            </fieldset>
                            <button type="submit" class="btn btn-primary">INSCRIPTION</button>
                            </fieldset>
                        </form>
                        <br>
                        <p class ='paragraphe'>
                            Vous possédez dèjà un compte ? <a href='index.php?page=connexion'> Connectez vous ici ! </a>
                        </p>
                        <?php

                    }

                ?>
        </ul>
    </div>
    <br>
    <?php include("footer.php"); ?>
</body>
</html>