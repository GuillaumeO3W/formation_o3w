<?php 
    require 'inc/head.php';
?>
<a href="index.php?ctrl=taverne&action=tavernesList" class="button is-dark ">Retour</a>
<div class="section">
  <h1 class="title"><?= $taverne->getNom() ?></h1>
  <div class="card is-shadowless">
    <div class="card-content">
      <table class="table is-hoverable is-fullwidth">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Nb Chambres</th>
            <th>Blondes</th>
            <th>Brunes</th>
            <th>Rousses</th>
            <th>Ville</th>
          </tr>
        </thead>
        <tbody>
<?php   if(!empty($taverne)) : ?>
          <tr>
            <th><?= $taverne->getId() ?></th>
            <td><?= $taverne->getNom() ?></td>
            <td><?= $taverne->getChambres() ?></td>
            <td><?= $taverne->getBlonde() ?></td>
            <td><?= $taverne->getBrune() ?></td>
            <td><?= $taverne->getRousse() ?></td>
            <td><?= $taverne->getVille() ?></td>
          </tr>   
        </tbody>
      </table>
<?php   else: ?>
          <p>Aucune taverne</p>
<?php   endif; ?>
    </div>
  </div>
</div>
<?php require 'inc/foot.php'; ?>