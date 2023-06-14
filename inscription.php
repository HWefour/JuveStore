<?php

include "commandes.php" ;
if (isset($_POST["inscription"])){
    if(!empty($_POST["username"]) AND !empty($_POST["email"]) AND !empty($_POST["pswrd"])) {
        $user = htmlspecialchars($_POST["username"]);
        $email = htmlspecialchars($_POST["email"]);
        $pswrd = sha1($_POST["pswrd"]);
        insertUser($email , $user , $pswrd);

    }else {
        echo "remplir les champs";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./inscription.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&family=Lora&family=Noto+Sans+KR:wght@100&family=Raleway:ital,wght@1,200&display=swap" rel="stylesheet">
    <title>Inscription</title>
</head>

<body>

    <div id="login-box">
        <form method="POST" action="inscription.php">
            <h1>inscription</h1>

            <input type="text" placeholder="Pseudo" name="username" autocomplete="off"/>
            <input type="text"  placeholder="E-mail" name="email" autocomplete="off"/>
            <input type="password" placeholder="Mot de passe" name="pswrd" autocomplete="off" />
            <input type="submit" name="inscription" value="S'inscrire" />
        </form>

    </div>

    </div>
</body>

</html>