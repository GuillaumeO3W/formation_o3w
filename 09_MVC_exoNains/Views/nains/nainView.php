<?php 
    require 'inc/head.php';
?>
<a href="index.php" class="button is-dark ">Retour</a>
<div class="section">
  <h1 class="title"><?= $nain->getNom() ?></h1>
  <div class="card is-shadowless">
    <div class="card-content">
      <table class="table is-hoverable is-fullwidth">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Longueur barbe (cm)</th>
            <th>Groupe</th>
            <th>Ville</th>
            <th>Taverne</th>
          </tr>
        </thead>
        <tbody>
<?php   if(!empty($nain)) : ?>
          <tr>
            <th><?= $nain->getId() ?></th>
            <td><?= $nain->getNom() ?></td>
            <td><?= $nain->getBarbe() ?></td>
            <td><?= $nain->getGroupe() ?></td>
            <td><?= $nain->getVille() ?></td>
            <?= $nain->getTaverne() != NULL ? "<td>". $nain->getTaverne(). "</td>" : "" ?>
          </tr>   
        </tbody>
      </table>
<?php   else: ?>
          <p>Aucun nain</p>
<?php   endif; ?>
    </div>
  </div>
</div>
<?php require 'inc/foot.php'; ?>