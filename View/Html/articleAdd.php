<!DOCTYPE html>
<html>
<head>
    <title> </title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="View/Css/theme.css">
    <link rel="stylesheet" type="text/css" href="View/Css/pageRedirection.css">
    <link rel="stylesheet" type="text/css" href="View/Css/accueil.css">
    <script src="https://kit.fontawesome.com/4d9375cbea.js"></script>
</head>
</head>
<body>
    <?php include("banniere.php"); ?>
    <div class='center'>
        <div class="jumbotron"
        <br>
        <br>
        <br>
        <br>
        <h3>Article à ajouter: </h3>
        <br>
        <form method="post">
            <p>
                <label>Image</label>
                <input type="text" name="picture" required>
            </p>

            <p>
                <label>Nom</label>
                <input type="text" name="name" required>
            </p>

            <p>
                <label>Prix</label>
                <input type="number" name="price" min="0" required>
            </p>

            <p>
                <label>Description</label>
                <input type="text" name="description" required>
            </p>

            <p>
                <label>Categorie</label>
                <select name="category" id="category">
                    <?php
                        foreach($dataCategory as $key => $value)
                        {
                            ?>
                                <option value="<?=$key+1?>"><?=$value['name']?></option>
                            <?php
                        }
                    ?>
                </select>
            </p>

            <p>
                <label>Stock</label>
                <input type="number" name="stock" min="0" max="1" required>
            </p>

            <p>
                <label><h6>Active (boolean) :</h6></label>
                <select name="active" id="active">
                    <option value="1">OUI</option>
                    <option value="0">NON</option>
                </select>
            </p>

            <p>
                <label><h6>Sexe :</h6></label>
                <select name="sex" id="sex">
                    <option value="homme">homme</option>
                    <option value="femme">femme</option>
                </select>
            </p>

            <p>
                <button type="submit" value="Send">Valider</button>
            </p>
        </form>
    </div>
    <div>
</body>
</html>