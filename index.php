<?php
require "header.php";
require_once "gestion_commande.php";
require_once "gestion_client.php";


require_once "manager_commande.php";
$num_commandes = count($manager_commande->lister());

require_once("manager_client.php");

$num_clients = $manager_client->get_numbre_client();

?>

<div class="flex div">
    <h1>Nombre des cliets :</h1>
    <p><?= $num_clients ?> client</p>

</div>
<div class="flex div ">
    <h1>Nombre des commndes est :</h1>
    <p><?= $num_commandes ?> commande</p>

</div>


<?php
require "footer.php";
?>