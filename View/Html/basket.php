<html>
<head>
<title></title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="View/Css/theme.css">
<link rel="stylesheet" type="text/css" href="View/Css/enseigne.css">
<link rel="stylesheet" type="text/css" href="View/Css/parcel.css">
<link rel="stylesheet" type="text/css" href="View/Css/accueil.css">
<script src="https://kit.fontawesome.com/4d9375cbea.js"></script>
</head>
<body>
    <?php include("banniere.php"); ?>
    <div class='center'>
        <div class="jumbotron">
            <br>
            <h3>Votre panier :</h3>
        </div>
        <?php
            if(empty($data_basket))
            {
                ?> 
                    <br>
                    <h5> Votre panier est actuellement vide </h5>
                    <br>
                    <p class="lead">Revenez lorsque que vous aurez choisi un article qui vous plaît dans notre boutique.</p>
                    <hr class="my-4">
                    <p class="lead">
                        <a href="index.php?page=shopFemme"> Retour Article </a>
                    </p>
                    <br>
                    <p>
                        <a href="index.php" > Retour Accueil </a>
                    </p>
                <?php
            }
            else
            {
                ?>
                    <ol>
                <?php
                for($nb=0;$nb<sizeof($data_basket);$nb=$nb+1)
                {
                    $article = new Article();
                    $data = $article->findAllbyUser($data_basket[$nb]);
                    for($i=0;$i<sizeof($data);$i=$i+1)
                    {
                        ?>
                        <ol id="list_parcel">
                            <li>
                                <p>
                                    <div class="zoom">
                                        <a href="index.php?page=detailArticle&amp;id=<?=$data[$i]['id']?>"><img src = "<?=  $data[$i]['url'] ?>" width="320" height="auto" class="entoureimage"/></a>
                                    </div>
                                </p>
                            </li>
                            <li>
                                    <span id="name"><?= $data[$i]['name'] ?></span>

                                <span><?=  $data[$i]['price'] ?> €</span>
                            </li>
                            <p>
                                <form method="post" action="index.php?page=basket&amp;id=<?=$data[$i]['id']?>">
                                    </fieldset>
                                    <button type="submit" width="16">Supprimer</button>
                                    </fieldset>
                                </form>
                            </p>
                                <hr>
                        </ol>
                        <hr>
                        <?php
                    }
                }
                ?>
                </ol>
                <h4> Total à payer : </h4>
                <h5>
                    <?php
                        total();
                    ?>
                </h5>
                <br>
                <form method="post" action="index.php?page=parcel">
                    </fieldset>
                        <button type="submit" class="btn btn-primary" width="16">Payer</button>
                    </fieldset>
                </form>

                <br>
                <br>
                <?php

            }
        ?>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>