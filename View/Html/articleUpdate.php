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
<?php require_once("banniere.php"); ?>
<div class='center'>
    <h3>Article à modifier: </h3>
    <br>
    <form method="post">
        <p>
            <label><h6>Image :</h6></label>
            <input type="text" name="picture" value="<?php echo $picture; ?>">
        </p>

        <p>
            <label><h6>Nom :</h6></label>
            <input type="text" name="name" value="<?php echo $name; ?>" size="40">
        </p>

        <p>
            <label><h6>Prix :</h6></label>
            <input type="number" name="price" value="<?php echo $price; ?>" min="0">
        </p>

        <p>
            <label><h6>Description :</h6></label>
            <textarea type="long" name="description" rows="10" cols="50">
                <?php echo $description; ?>
            </textarea>
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
            <label><h6>Stock :</h6></label>
            <input type="number" name="stock" min="0" max="1" value="<?php echo $stock; ?>" required>
        </p>

        <p>
            <label><h6>Active (boolean) :</h6></label>
            <select name="active" id="active">
                    <option value="1">OUI</option>
                    <option value="1">NON</option>
            </select>
        </p>

        <p>
            <label><h6>Sexe :</h6></label>
            <select name="sex" id="sex">
                <option value="homme">homme</option>
                <option value="femme">femme</option>
            </select>
        </p>
            <button type="submit" value="Send">Valider</button>
        </p>
    </form>
</div>
</body>
</html>