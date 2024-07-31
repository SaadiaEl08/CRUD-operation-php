<?php
require_once("gestion_commande.php");
require_once("manager_commande.php");
$id=$_GET["id"];
$manager_commande->supprimer($id);
header("Location: http://localhost:8080/lister_commandes.php");
?>