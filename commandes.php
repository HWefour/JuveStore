<?php

function ajout($nom, $image, $prix, $description)
{
    if (require("connexionBDD.php")) {
        $req = $access->prepare("INSERT INTO shop (nom , image , prix , description) VALUES (? , ? , ? , ?)");
        $req->execute(array($nom, $image, $prix, $description));
        $req->closeCursor();
    }
}

function affiche()
{
    if (require("connexionBDD.php")) {
        $req = $access->prepare("SELECT * FROM  shop ORDER BY id DESC");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req->closeCursor();
    }
}

function supprime($id)
{
    if (require("connexionBDD.php")) {
        $req = $access->prepare("DELETE  FROM shop WHERE id = ?");
        $req->execute(array($id));
    }
}


function verificationAdmin($email, $password)
{
    if (require("connexionBDD.php")) {
        $req = $access->prepare("SELECT * FROM admin WHERE email=? AND password=? ");
        $req->execute(array($email, $password));
        if ($req->rowCount() == 1) {
            $data = $req->fetch();
            return $data;
        } else {
            return false;
        }
        $req->closeCursor();
    }
}

function insertUser($email, $username, $pswrd)
{
    if (require("connexionBDD.php")) {
        $req = $access->prepare("INSERT  INTO compte (email , username , password) VALUES ( ? , ? , ?)");
        $req->execute(array($email, $username, $pswrd));
        $req->closeCursor();
    }
}

function getUser($email, $pswrd, $estAdmin = 0)
{
    if (require("connexionBDD.php")) {
        $sql = "SELECT * FROM compte WHERE email= '$email' AND password= '$pswrd';";
        $req = $access->prepare($sql);
        // $req -> execute(array($email, $pswrd));
        $req->execute();
        if ($req->rowCount() > 0) {
            $resultat = $req->fetch(PDO::FETCH_ASSOC);
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['email'] = $email;
            $_SESSION['psword'] = $pswrd;
            $_SESSION['admin'] = $resultat['estAdmin'];
            if ($_SESSION['admin'] == 1) {
                header('Location: CRUD-Admin.php');
            } else {
                header('Location: shop.php');
            }
        } else {
            echo "votre mdp ou pseudo est incorrect"; // creer alert pour dire mdp erronee
        }
        $req->closeCursor();
    }
}


function modifier($image, $nom, $prix, $description, $id)
{
    if (require("connexionBDD.php")) {
        $req = $access->prepare("UPDATE shop SET `image` = ?, nom = ?, prix = ?, description = ? WHERE id=?");

        $req->execute(array($image, $nom, $prix, $description, $id));

        $req->closeCursor();
    }
}

function afficherUnProduit($id)
{
    if (require("connexionBDD.php")) {
        $req = $access->prepare("SELECT * FROM shop WHERE id=?");

        $req->execute(array($id));

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
    }
}

function ajouterPanier($idProduit, $idUser)
{
    if (require("connexionBDD.php")) {
        $select = $access->prepare("SELECT id FROM panier WHERE idCompte=?;");
        $select->execute(array($idUser));
        $panier = $select->fetch();
        
        if(empty($panier)) {
            $insert = $access->prepare("INSERT INTO panier(idCompte) VALUES(?);");
            $insert->execute(array($idUser));
            $insert->closeCursor();   
        }
        $select->execute(array($idUser));
        $panier = $select->fetch();
        $select->closeCursor();
        
        $req = $access->prepare("INSERT INTO panier_shop(idPanier, idShop) VALUES(?, ?)");
        $success = $req->execute(array($panier['id'], $idProduit));
        $req->closeCursor();

        return $success;
    }
}
