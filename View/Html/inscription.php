<html>
<head>
<title></title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="View/Css/theme.css">
<link rel="stylesheet" type="text/css" href="View/Css/accueil.css">
<link rel="stylesheet" type="text/css" href="View/Css/inscription.css">
<script src="https://kit.fontawesome.com/4d9375cbea.js"></script>
</head>
<body>
    <?php include("banniere.php"); ?>
    <div class="align">
        <ul>
            <li>
                <img src="View/img/asiatWoman.jpg" height ="700">
            </li>
            <li>
                <h4> CRÉATION D'UN COMPTE MY HOME: </h4>
                <br>
                <form method="post">
                    <p>
                        <h6><label>* Prénom :</label><h6>
                        <input type="text" placeholder="Entrez votre prénom" name="firstName" size="50px" required>
                    </p>
                    <br>
                    <p>
                        <h6><label> * Nom :</label><h6>
                        <input type="text" placeholder="Entrez votre nom" name="lastName" size="50px" required>
                    </p>
                    <br>
                    <p>
                        <h6><label>* Date de naissance :</label></h6>
                        <input type="date" placeholder="Entrez votre date de naissance" name="date"  min="1920-01-01" required>
                    </p>  
                    <br> 
                    <p>
                        <h6><label>* Adresse Mail :</label><h6>
                        <input type="email" placeholder="Entrez votre mail" name="mail" size="50px" required>
                    </p>
                    <br>
                    <p>
                        <h6><label>* Mot de passe :</label></h6>
                        <input type="password" placeholder="Entrez votre mot de passe" name="password" size="50px" required>
                    </p>
                    <br>   
                    <p>
                        <h6><label>* N° téléphone :</label></h6>
                        <input type="tel" placeholder="Entrez votre n° téléphone" name="number" size="50px" required>
                    </p>
                    <br>
                    <br>
                    <h4> POUR POUVOIR COMMANDER: </h4>
                    <br>
                    <p>
                        <h6><label>adresse :</label></h6>
                        <input type="text" placeholder="Entrez votre adresse" name="address" size="50px" required>
                    </p>
                         
                    <p>
                        <h6><label>code postal :</label></h6>
                        <input type="number" placeholder="Entrez votre code postal" name="zipCode" size="50px" required>
                    </p>
                       
                    <p>
                        <h6><label>ville :</label></h6>
                        <input type="text" placeholder="Entrez votre ville" name="city" size="50px" required>
                    </p>
   
                    <p>
                        <h6><label>pays :</label></h6>
                        <input type="text" placeholder="Entrez votre pays" name="country" size="50px" required>
                    </p>
                  
                    </fieldset>
                        <button type="submit" class="btn btn-primary">INSCRIPTION</button>
                    </fieldset>
                </form>
                <p class ='paragraphe'>
                    Déjà un compte ? <a href='index.php?page=connexion'> Connectez vous ici ! </a>
                </p>
            </li>
        </ul>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>