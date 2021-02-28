<html>
<head>
<title></title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="View/Css/theme.css"/>
<link rel="stylesheet" type="text/css" href="View/Css/accueil.css"/>
</head>
<body>
    <?php include("banniere.php");  ?>

    <img src = "View/img/homme_accueil.jpg" width="100%" height="100%"/>
    <div class = "ecart_article">
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
                                            src="<?= $data[$nb]['url'] ?>" width="400" height="auto"
                                            class="entoureimage"/></a>
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
    <?php include("footer.php"); ?>
</body>
</html>