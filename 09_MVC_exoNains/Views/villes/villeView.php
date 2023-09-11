<?php 
    require 'inc/head.php';
?>
<a href="index.php?ctrl=ville&action=villesList" class="button is-dark ">Retour</a>
<div class="section">
  <h1 class="title"><?= $ville->getNom() ?></h1>
  <div class="card is-shadowless">
    <div class="card-content">
      <table class="table is-hoverable is-fullwidth">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Superficie</th>
          </tr>
        </thead>
        <tbody>
<?php   if(!empty($ville)) : ?>
          <tr>
            <th><?= $ville->getId() ?></th>
            <td><?= $ville->getNom() ?></td>
            <td><?= $ville->getSuperficie() ?></td>
          </tr>   
        </tbody>
      </table>
<?php   else: ?>
          <p>Aucune ville</p>
<?php   endif; ?>
    </div>
  </div>
</div>
<?php require 'inc/foot.php'; ?>