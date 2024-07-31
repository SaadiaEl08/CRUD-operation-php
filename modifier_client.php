<?php
require_once("gestion_client.php");
require_once("manager_client.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$is_valid = true;
	$id = isset($_POST["id"]) ? htmlspecialchars($_POST["id"]) : "";
	$nom = isset($_POST["nom"]) ? htmlspecialchars($_POST["nom"]) : "";
	$prenom = isset($_POST["prenom"]) ? htmlspecialchars($_POST["prenom"]) : "";
	$age = isset($_POST["age"]) ? htmlspecialchars($_POST["age"]) : "";
	$ville = isset($_POST["ville"]) ? htmlspecialchars($_POST["ville"]) : "";
	$code_postale = isset($_POST["code"]) ? htmlspecialchars($_POST["code"]) : "";
	$error_id = $error_nom = $error_prenom = $error_ville = $error_age = $error_code_postale = "";
	if (empty($id)) {
		$error_id = "le champ ID est obligatoire";
		$is_valid = false;
	} elseif (!is_numeric($id) || $id <= 0) {
		$error_id = "l'id doit etre un entier supperieur a 0";
		$is_valid = false;
	}
	if (empty($nom)) {
		$error_nom = "le champ nom est obligatoire";
		$is_valid = false;
	}
	if (empty($prenom)) {
		$error_prenom = "le champ prenom est obligatoire";
		$is_valid = false;
	}
	if (empty($age)) {
		$error_age = "le champ age est obligatoire";
		$is_valid = false;
	} elseif (!is_numeric($age) || $age <= 0) {
		$error_age = "l'age doit etre un entier supperieur a 0";
		$is_valid = false;
	}
	if (empty($code_postale)) {
		$error_code_postale = "le champ code postale est obligatoire";
		$is_valid = false;
	}
	if (empty($ville)) {
		$error_ville = "le champ ville est obligatoire";
		$is_valid = false;
	}

	if ($is_valid) {
		$client = new Client($id, $nom, $prenom, $ville, $age, $code_postale);
		$manager_client->modifier($client);
		header("Location: http://localhost:8080/lister_clients.php");
	}
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
	$id = $_GET["id"];
	$client = $manager_client->rechercher($id);
	if (!$client) {
		header("Location: http://localhost:8080/lister_clients.php");
	}
}
require_once("header.php");

?>

<div class="div flex">
	<h1>Modifier le client ayant l'ID <?= !isset($client) ? $id : $client->get_id() ?></h1>
	<form action=<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?> method="post">
		<div class="pm flex-between">
			<label for="id">ID </label>
			<input type="text" id="id" name="id" value="<?= !isset($client) ? $id : $client->get_id() ?>" readonly>
		</div>
		<span><?= isset($error_id) ? $error_id : ""  ?></span>
		<div class="pm flex-between">
			<label for="nom">Nom</label>
			<input type="text" id="nom" name="nom" value="<?= !isset($client) ? $nom : $client->get_nom() ?>">

		</div>
		<span><?= isset($error_nom) ? $error_nom : ""  ?></span>
		<div class="pm flex-between">
			<label for="prenom">Prenom</label>
			<input type="text" id="prenom" name="prenom" value="<?= !isset($client) ? $prenom : $client->get_prenom() ?>">

		</div>
		<span><?= isset($error_prenom) ? $error_prenom : ""  ?></span>
		<div class="pm flex-between">
			<label for="age">Age</label>
			<input type="text" id="age" name="age" value="<?= !isset($client) ? $age : $client->get_age() ?>">

		</div>
		<span><?= isset($error_age) ? $error_age : ""  ?></span>
		<div class="pm flex-between">
			<label for="ville">Ville</label>
			<input type="text" id="ville" name="ville" value="<?= !isset($client) ? $ville : $client->get_ville() ?>">

		</div>
		<span><?= isset($error_ville) ? $error_ville : ""  ?></span>
		<div class="pm flex-between">
			<label for="code">Code postal</label>
			<input type="text" id="code" name="code" value="<?= !isset($client) ? $code_postale : $client->get_code_postal() ?>">

		</div>
		<span><?= isset($error_code_postale) ? $error_code_postale : ""  ?></span>
		<div class="pm flex-between">
			<input type="submit" value="modifier" name="submit" class="modifier">
		</div>
</div>
</form>
</div>
<?php
require("footer.php");
?>