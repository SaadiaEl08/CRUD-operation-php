<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	require_once("gestion_client.php");
	require_once("manager_client.php");
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
	} elseif ($manager_client->rechercher($id) != null) {
		$error_id = "l'id $id est deja existe";
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
	// if (empty($_POST["email"])) {
	// 	$error_email = "le champ email est obligatoire";
	// 	$is_valid = false;
	// }elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
	// 	$error_email = "le champ email invalide";
	// 	$is_valid = false;
	// }
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
		$manager_client->ajouter($client);
		header("Location:http://localhost:8080/lister_clients.php");
	}
}

require_once("header.php");
?>
<div class="flex div">
	<h1>Ajouter un neaveaux client</h1>
	<form action=<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?> method="post">
		<div class="pm flex-between">
			<label for="id">ID </label>
			<input type="text" id="id" name="id" value="<?= isset($_POST["id"]) ? $_POST["id"] : "" ?>">
		</div>
		<span><?= isset($error_id) ? $error_id : ""  ?></span>
		<div class="pm flex-between">
			<label for="nom">Nom</label>
			<input type="text" id="nom" name="nom" value="<?= isset($_POST["nom"]) ? $_POST["nom"] : "" ?>">

		</div>
		<span><?= isset($error_nom) ? $error_nom : ""  ?></span>
		<div class="pm flex-between">
			<label for="prenom">Prenom</label>
			<input type="text" id="prenom" name="prenom" value="<?= isset($_POST["prenom"]) ? $_POST["prenom"] : "" ?>">

		</div>
		<span><?= isset($error_prenom) ? $error_prenom : ""  ?></span>
		<div class="pm flex-between">
			<label for="age">Age</label>
			<input type="text" id="age" name="age" value="<?= isset($_POST["age"]) ? $_POST["age"] : "" ?>">

		</div>
		<span><?= isset($error_age) ? $error_age : ""  ?></span>
		<div class="pm flex-between">
			<label for="ville">Ville</label>
			<input type="text" id="ville" name="ville" value="<?= isset($_POST["ville"]) ? $_POST["ville"] : "" ?>">

		</div>
		<span><?= isset($error_ville) ? $error_ville : ""  ?></span>
		<div class="pm flex-between">
			<label for="code">Code postal</label>
			<input type="text" id="code" name="code" value="<?= isset($_POST["code"]) ? $_POST["code"] : "" ?>">
		</div>
		<span><?= isset($error_code_postale) ? $error_code_postale : ""  ?></span>
		<div class="pm flex-between">
			<input type="submit" value="Ajouter" name="submit" class="modifier">
		</div>
	</form>
</div>
<?php
require("footer.php");
?>