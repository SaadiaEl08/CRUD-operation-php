<?php
require_once("gestion_client.php");
require_once("client.php");
require_once("manager_client.php");
$id_client = $_GET["id_client"];
$client = $manager_client->rechercher($id_client);
$html = <<<DATA
<h1 class='pm'>les information de client ayant l'ID {$id_client}:</h1>
<table class='pm'>
<tr>
<th>ID:</th>
<td>{$client->get_id()}</td>
</tr>
<th>Nom:</th>
<td>{$client->get_nom()}</td>
</tr>
<th>Prenom:</th>
<td>{$client->get_prenom()}</td>
</tr>
<th>Age:</th>
<td>{$client->get_age()}</td>
</tr>
<th>Ville:</th>
<td>{$client->get_ville()}</td>
</tr>
<th>Code postale:</th>
<td>{$client->get_code_postal()}</td>
</tr>
</table>
DATA;

require("header.php");
?>
<div class="div flex">
    <?= $html ?>
</div>

<?php
require("footer.php");
?>