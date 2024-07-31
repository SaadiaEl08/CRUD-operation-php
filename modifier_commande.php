<?php
require_once("gestion_commande.php");
require_once("manager_commande.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$is_valid = true;
	$id = isset($_POST["id"]) ? htmlspecialchars($_POST["id"]) : "";
	$montante = isset($_POST["montante"]) ? htmlspecialchars($_POST["montante"]) : "";
	$date = isset($_POST["date"]) ? htmlspecialchars($_POST["date"]) : "";
	$id_client = isset($_POST["id_client"]) ? htmlspecialchars($_POST["id_client"]) : "";
	$error_id = $error_montante = $error_date = $error_id_client = "";
	if (empty($id)) {
		$error_id = "le champ ID est obligatoire";
		$is_valid = false;
	} elseif (!is_numeric($id) || $id <= 0) {
		$error_id = "l'id doit etre un entier supperieur a 0";
		$is_valid = false;
	}
	if (empty($montante)) {
		$error_montante = "le champ montante est obligatoire";
		$is_valid = false;
	} elseif (!is_numeric($montante) || $montante <= 0) {
		$error_montante = "le montante doit etre un float supperieur a 0 ex:00.00";
		$is_valid = false;
	}
	if (empty($date)) {
		$error_date = "le champ date est obligatoire";
		$is_valid = false;
	}

	if (empty($id_client)) {
		$error_id_client = "le champ id client est obligatoire";
		$is_valid = false;
	} elseif (!is_numeric($id_client) || $id_client <= 0) {
		$error_id_client = "l'id de client doit etre un entier supperieur a 0";
		$is_valid = false;
	}


	if ($is_valid) {
		$commande = new Commande($id, $montante, $date, $id_client);
		$manager_commande->ajouter($commande);
		header("Location:http://localhost:8080/lister_commandes.php");
	}
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
	$id = $_GET["id"];
	$commande = $manager_commande->rechercher($id);
	if (!$commande) {
		header("Location: http://localhost:8080/lister_commandes.php");
	}
}

require_once("header.php");
?>

<div class="flex div">
	<h1>Modifier le client ayant l'ID <?= !isset($commande) ? $id : $commande->get_id() ?></h1>
	<form action=<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?> method="post">
		<div class="pm flex-between">
			<label for="id">ID </label>
			<input type="text" id="id" name="id" value="<?= !isset($commande) ? $id : $commande->get_id() ?>" readonly>
		</div>
		<span><?= isset($error_id) ? $error_id : ""  ?></span>
		<div class="pm flex-between">
			<label for="montante">Montante</label>
			<input type="text" id="montante" name="montante" value="<?= !isset($commande) ? $montante : $commande->get_montante() ?>">

		</div>
		<span><?= isset($error_montante) ? $error_montante : ""  ?></span>
		<div class="pm flex-between">
			<label for="date">Date</label>
			<input type="date" id="date" name="date" value="<?= !isset($commande) ? $date : $commande->get_date() ?>">

		</div>
		<span><?= isset($error_date) ? $error_date : ""  ?></span>
		<div class="pm flex-between">
			<label for="id_client">Id client</label>
			<input type="text" id="id_client" name="id_client" value="<?= !isset($commande) ? $id_client : $commande->get_id_client() ?>">

		</div>
		<span><?= isset($error_id_client) ? $error_id_client : ""  ?></span>
		<div class="pm flex-between">
			<input type="submit" value="Modifier" name="submit" class="modifier">
		</div>
	</form>
</div>

<?php
require("footer.php");
?>