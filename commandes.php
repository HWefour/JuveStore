<?php

function ajout($nom , $image , $prix , $description)
{
    if(require("connexionBDD.php"))
    {
        $req = $access -> prepare ("INSERT INTO shop (nom , image , prix , description) VALUES (? , ? , ? , ?)");
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
        $req = $access -> prepare("DELETE  FROM shop WHERE id = ?");
        $req -> execute(array($id));
    }

 }


 function verificationAdmin($email , $password){
    if(require("connexionBDD.php"))
    {
        $req = $access -> prepare ("SELECT * FROM admin WHERE email=? AND password=? ");
        $req -> execute(array($email , $password));
        if($req->rowCount()==1){
            $data= $req-> fetch();
            return $data;
        }else{
            return false ;
        }
        $req -> closeCursor();
    }
 }

 function insertUser($email , $username , $pswrd ){
    if(require("connexionBDD.php"))
    {
        $req = $access -> prepare("INSERT  INTO compte (email , username , password) VALUES ( ? , ? , ?)");
        $req -> execute(array($email , $username , $pswrd));
        $req -> closeCursor();
 }
}

function getUser($email, $pswrd, $estAdmin = 0){
    if(require("connexionBDD.php"))
    {
        $sql = "SELECT * FROM compte WHERE email= '$email' AND password= '$pswrd';";
        var_dump($sql);
        $req = $access -> prepare($sql);
        // $req -> execute(array($email, $pswrd));
        $req -> execute();
        if($req->rowCount()>0){
            $_SESSION['email'] = $email;
            $_SESSION['psword'] = $pswrd;
            $_SESSION['admin'] = $req->fetch()['estAdmin'];
            if($_SESSION['admin'] == 1){
                header('Location: CRUD-Admin.php');
            } else {
                header('Location: shop.php');
            }
            
            
        }else {
            echo "votre mdp ou pseudo est incorrect";
        }
        $req -> closeCursor();
 }
}
?>