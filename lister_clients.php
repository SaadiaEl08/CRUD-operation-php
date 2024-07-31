<?php
require_once("gestion_client.php");
include("header.php");
require_once("manager_client.php");
$clients = $manager_client->lister();
?>
<div class="flex div">
  <h1>liste des clients</h1>
  <a href="ajouter_client.php">ajouter un nouveau client</a>
  <table>
    <thead>
      <tr>
        <th>Id</th>
        <th>nom</th>
        <th>prenom</th>
        <th>ville</th>
        <th>age</th>
        <th>code postale</th>
        <th colspan="2"> actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($clients as $element) : ?>
        <tr>
          <td> <?php echo $element->get_id() ?></td>
          <td> <?php echo $element->get_nom() ?></td>
          <td> <?php echo $element->get_prenom() ?></td>
          <td> <?php echo $element->get_ville() ?></td>
          <td> <?php echo $element->get_age() ?></td>
          <td> <?php echo $element->get_code_postal() ?></td>
          <td class="supprimer"> <a href="supprimer_client.php?id=<?= $element->get_id() ?>" class="supprimer">supprime</a></td>
          <td class="modifier"> <a href="modifier_client.php?id=<?= $element->get_id() ?>" class="modifier">modifier</a></td>
        </tr>

      <?php endforeach ?>
    </tbody>
  </table>
</div>


<?php
include("footer.php");
?>