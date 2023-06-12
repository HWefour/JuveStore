<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./connexion.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100&family=Lora&family=Noto+Sans+KR:wght@100&family=Raleway:ital,wght@1,200&display=swap"
        rel="stylesheet">
    <title>Connexion</title>
</head>

<body>

    <div id="inscription-form">
        <h1>Connexion</h1>
        <h3>Bienvenue dans JuveWorld</h3>
        <p>Connectez vous a votre compte</p>
        <form>
            <label for="email" id="label-email">Email</label></br>
            <input nom="email" id="email" type="email" placeholder="votre-email@mail.com"></br>
            <label for="password" id="lable-password">Mot de passe</label></br>
            <input nom="password" id="password" type="password"></br>
            <input nom="remember" id="remember" type="checkbox" checked>
            <label for="remember" id="label-remember">Se Souvenir</label>
            <a href="">Mot de passe Oublié ?</a></br>
            <button type="submit" id="login">Connexion</button>
            <button type="button" id="Sign"><a href="./inscription.php">Inscrivez Vous</a></button>
        </form>

    </div>
</body>

</html>