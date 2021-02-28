<html>
<head>
<title></title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="View/Css/theme.css">
<link rel="stylesheet" type="text/css" href="View/Css/accueil.css">
<link rel="stylesheet" type="text/css" href="View/Css/article.css">
<script src="https://kit.fontawesome.com/4d9375cbea.js"></script>
</head>
<body>

   <?php include('banniere.php') ?>

    <div class="align">  

        <div class="espace"> 
            <h3>Articles : </h3>
        </div>

        <ul>
            <li>
                <a href="index.php?page=article&amp;id=add"><h5 class="articleCat"> Ajouter un article </h5></a>
            </li>
        </ul>
        <hr>
        <?php
            for($i=0;$i<sizeof($data);$i+=1)
            {
                ?>
                    <ul>
                <?php
                for($nb=$i;$nb<3+$i;$nb+=1)  
                {
                    if(!empty($data[$nb])) {
                        ?>
                        <li>
                            <p>
                            <div>
                                <a href="index.php?page=detailArticle&amp;id=<?= $data[$nb]['id'] ?>"><img
                                            src="<?= $data[$nb]['url'] ?>" width="300" height="auto"
                                            class="entoureimage"/></a>
                                <br>
                                <a href="index.php?page=articleUpdate&amp;id=<?= $data[$nb]['id'] ?>">Modifier</a>|<a
                                        href="index.php?page=articleDelete&amp;id=<?= $data[$nb]['id'] ?>">Suppprimer</a>
                            </div>
                            <span><?= $data[$nb]['name'] ?></span>
                            </p>
                            <span><?= $data[$nb]['price'] ?> €</span>
                        </li>
                        <?php
                    }
                }
                $i+=2;
                ?>
                    </ul>
                <?php
            }
        ?>
    </div>

    <br>
    <?php include("footer.php"); ?>

</body>
</html>