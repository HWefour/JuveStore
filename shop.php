<?php
require("commandes.php");
$mes_articles = affiche();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./shop.css">
    <title>Shop</title>
</head>

<body>
    <?php foreach ($mes_articles as $article):  ?>
<div class="card" style="width: 18rem;">
  <img src="<?= $article->image ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"> <?= $article->nom ?> </h5>
    <p class="card-text"><?= $article->description ?></p>
    <a href="#" class="btn btn-primary">Acheter</a>
  </div>
  <div class="card-footer text-body-secondary">
  <?= $article->prix ?>$
  </div>
</div>
<?php  endforeach ; ?>



</body>

</html>