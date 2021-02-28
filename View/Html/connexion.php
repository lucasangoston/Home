<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="View/Css/theme.css">
    <link rel="stylesheet" type="text/css" href="View/Css/accueil.css">
    <link rel="stylesheet" type="text/css" href="View/Css/connexion.css">
    <script src="https://kit.fontawesome.com/4d9375cbea.js"></script>
</head>
</head>
<body>
    <?php include("banniere.php"); ?>
    <div class="align">
        <ul>
            <li>
                <img src="View/img/africanWoman.jpg" height ="600">
            </li>
            <li>
                <div class='center'>
                    <h4> CONNEXION A MON COMPTE MY HOME: </h4>
                    <br>
                    <form method="post">
                        <p>
                            <h6><label>Adresse Mail :</label><h6>
                            <input type="email" placeholder="Entrez votre mail" name = "mail" size="50px">
                        </p>
                        <br>
                        <p>
                            <h6><label>Mot de passe :</label></h6>
                            <input type="password" placeholder="Entrez votre mot de passe" name = "password" size="50px">
                        </p>
                        </fieldset>
                        <button type="submit" class="btn btn-primary">CONNEXION</button>
                        </fieldset>
                    </form>
                    <p class ='paragraphe'>
                        Pas encore de compte ? <a href='index.php?page=inscription'> Inscrivez vous ici ! </a>
                    </p>
                <div>
            </li>
        </ul>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>