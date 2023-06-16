<?php

session_start();

if(!isset($_SESSION["admin"]) OR empty($_SESSION["admin"])){
    header("location: connexion.php");
} 


require("commandes.php");

if (isset($_POST["supprimer"])) {
    if (isset($_POST["idprod"])) {
        if (!empty($_POST["idprod"]) and is_numeric($_POST["idprod"])) {
            $idprod = htmlspecialchars($_POST["idprod"]);
            try {
                supprime($idprod);
            } catch (Exception $e) {
                $e->getMessage();
            }
        }
    }
}

if (isset($_POST["ajouter"])) {
    if (isset($_POST["image"]) and isset($_POST["nom"]) and isset($_POST["prix"]) and isset($_POST["desc"])) {
        if (!empty($_POST["image"]) and !empty($_POST["nom"]) and !empty($_POST["prix"]) and !empty($_POST["desc"])) {
            $image = htmlspecialchars($_POST["image"]);
            $nom = htmlspecialchars($_POST["nom"]);
            $prix = htmlspecialchars($_POST["prix"]);
            $desc = htmlspecialchars($_POST["desc"]);

            try {
                ajout($nom, $image, $prix, $desc);
            } catch (Exception $e) {
                $e->getMessage();
            }
        }
    }
}
$mes_articles = affiche();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100&family=Lora&family=Noto+Sans+KR:wght@100&family=Raleway:ital,wght@1,200&display=swap"
        rel="stylesheet"><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./crud.css?v=<?=uniqid()?>">
    <link rel="stylesheet" href="./navbar.css?v=<?=uniqid()?>">
    <title>Crud</title>
</head>

<body>
    <?php
    include "navbarboot.php" ;
    ?>
    <form method="POST" action="CRUD-Admin.php">
    <H1>AJOUT D'ARTICLE </h1>
        <div class="form-crud">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">URL Image</label>
                <input type="name" class="form-control" id="url-img" name="image" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nom Article</label>
                <input type="text" class="form-control" id="nom-article" name="nom" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Prix</label>
                <input type="number" class="form-control" id="prix" name="prix" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <textarea class="form-control" name="desc" required></textarea>
            </div>
            <button type="submit" class="btn btn-warning" name="ajouter">Ajoutez article</button>
        </div>
    </form>
    <form method="POST" action="CRUD-Admin.php">
    <h1>Suppression Article</h1>
    <div class="form-crud-suppr">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ID article</label>
                <input type="number" class="form-control" id="id-produit" name="idprod" required>
            </div>
            <button type="submit" class="btn btn-warning" name="supprimer">Supprimer</button>
        </div>
        <div class="affichage">
            <?php foreach ($mes_articles as $article) :  ?>
                <div class="card" style="width: 13rem;">
                    <img src="<?= $article->image ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"> <?= $article->id ?> </h5>

                    </div>
                <?php endforeach; ?>
                </div>
    </form>
</body>

</html>