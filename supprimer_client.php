<?php
require_once("gestion_client.php");
require_once("manager_client.php");
$id=$_GET["id"];
$manager_client->supprimer($id);
header("Location: http://localhost:8080/lister_clients.php");
?>