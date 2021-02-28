<html>
<head>
<title></title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="View/Css/theme.css">
<link rel="stylesheet" type="text/css" href="View/Css/profil.css">
<link rel="stylesheet" type="text/css" href="View/Css/accueil.css">
<script src="https://kit.fontawesome.com/4d9375cbea.js"></script>
</head>
<body>
    <?php include("banniere.php"); ?>

    <div class='center'>
        <div class="jumbotron">
            <h1>Mon Profil</h1>
            <br>
            <ul>
                <li>
                    <div class="about">
                        <h5>A propos de moi : </h5>
                        <p><?=$_SESSION['firstName']." ".$_SESSION['lastName']?></p>
                        <p>Date de naissance : <?= $_SESSION['date'] ?></p>
                    </div>  
                </li>
            </ul>
        </div>
    <div>
        
    <?php include("footer.php"); ?>
</body>
</html>