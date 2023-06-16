<?php
session_start();
include "commandes.php" ;

if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
    header('Location: CRUD-Admin.php');
} elseif(isset($_SESSION['admin'])) {
    header('Location: shop.php');
}

if (isset($_POST["connexion"])){
    if(!empty($_POST["email"]) AND !empty($_POST["pswrd"])) {
        $email = htmlspecialchars($_POST["email"]);
        $pswrd = sha1($_POST["pswrd"]);
        getUser($email, $pswrd);
    }
}
?><!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&family=Lora&family=Noto+Sans+KR:wght@100&family=Raleway:ital,wght@1,200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./navbar.css?v=<?=uniqid()?>">
    <link rel="stylesheet" href="./connexion.css?v=<?=uniqid()?>">
    <title>Connexion</title>
</head>

<body>
<?php
    include "navbarboot.php" ;
    ?>
    <div id="inscription-form">
        <h1>Connexion</h1>
        <h3>Bienvenue dans JuveWorld</h3>
        <p>Connectez vous a votre compte</p>
        <form method="POST">
            <label for="email" id="label-email">Email</label></br>
            <input nom="email" id="email" type="email" placeholder="votre-email@mail.com" name="email"></br>
            <label for="password" id="lable-password">Mot de passe</label></br>
            <input nom="password" id="password" type="password" name="pswrd"></br>
            <input nom="remember" id="remember" type="checkbox" checked>
            <label for="remember" id="label-remember">Se Souvenir</label>
            <a href="">Mot de passe Oublié ?</a></br>
            <button type="submit" id="login" name="connexion">Connexion</button>
            <button type="button" id="Sign"><a href="./inscription.php">Inscrivez Vous</a></button>
        </form>

    </div>
</body>

</html>