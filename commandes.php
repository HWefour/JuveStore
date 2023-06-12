<?php

function ajout($nom , $image , $prix , $description)
{
    if(require("connexionBDD.php"))
    {
        $req = $access -> prepare ("INSERT INTO shop (nom , image , prix , description) VALUES ('$nom' , '$image' , '$prix' , '$description')");
        $req -> execute(array($nom , $image , $prix , $description));
        $req -> closeCursor();
    }

}

function affiche()
{
    if(require("connexionBDD.php"))
    {
    $req = $access -> prepare("SELECT * FROM  shop ORDER BY id DESC");
    $req->execute();
    $data = $req -> fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req -> closeCursor();
    
    }
    
}
 function supprime($id)
 {
    if(require("connexionBDD.php"))
    {
        $req = $access -> prepare("DELETE * FROM shop WHERE id = ?");
        $req -> execute(array($id));
    }

 }

?>