<?php
require_once("gestion_commande.php");
require_once("manager_commande.php");
$commandes = $manager_commande->lister();
require_once("header.php");
?>
<div class="flex div">
  <h1>liste des commandes</h1>
  <a href="ajouter_commande.php">ajouter un nouveau commande</a>
  <table>
    <thead>
      <tr>
        <th>Id</th>
        <th>montante</th>
        <th>date</th>
        <th>l'ID de client</th>
        <th colspan="3"> actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($commandes as $element) : ?>
        <tr>
          <td> <?php echo $element->get_id() ?></td>
          <td> <?php echo $element->get_montante() ?></td>
          <td> <?php echo $element->get_date() ?></td>
          <td> <?php echo $element->get_id_client() ?></td>
          <td class="info"> <a class="info" href="afficher_info_client.php?id_client=<?= $element->get_id_client() ?>">Afficher le client </a></td>
          <td class="supprimer"> <a href="supprimer_commande.php?id=<?= $element->get_id() ?>" class="supprimer">supprime</a></td>
          <td class="modifier"> <a href="modifier_commande.php?id=<?= $element->get_id() ?>" class="modifier">modifier</a></td>
        </tr>

      <?php endforeach ?>
    </tbody>
  </table>
</div>

<?php
require("footer.php");
?>