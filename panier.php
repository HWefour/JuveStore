<?php 

session_start();

require("commandes.php");

if(isset($_POST['ajouterPanier']) && !empty($_POST['ajouterPanier'])) {
    die(ajouterPanier(filter_var($_POST['idShop'], FILTER_VALIDATE_INT), $_SESSION['id']));
}
?>