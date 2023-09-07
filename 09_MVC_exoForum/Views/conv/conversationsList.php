<?php 
require 'inc/head.php';
?>
<a href="index.php" class="button is-dark ">Retour</a>
<div class="section">
  <h1 class="title">Liste des conversations</h1>
  <div class="card is-shadowless">
    <div class="card-content">
      <table class="table is-hoverable is-fullwidth">
        <thead>
          <tr>
            <th>Id Conv</th>
            <th>Date Conv</th>
            <th>Heure Conv</th>
            <th>Nb Messages Conv</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            if(!empty($conversations)) : 
            foreach($conversations as $conv) :
          ?>
          <tr class="<?= (!$conv->getStatus() ? '' : 'has-background-danger') ?>">
            <th><?= $conv->getId() ?></th>
            <td><?= $conv->getDate() ?></td>
            <td><?= $conv->getHour() ?></td>
            <td><?= $conv->getNbMsg() ?></td>
            <td><a href="index.php?ctrl=message&action=index&idConv=<?= $conv->getId() ?>" class="button is-dark is-small">Voir messages</a></td>
          </tr>   
          <?php 
            endforeach;
          ?>
        </tbody>
      </table>
      <?php
        else: 
      ?>
          <p>Aucune conversation</p>
      <?php
        endif
      ?>
    </div>
  </div>
</div>


<?php 
        require 'inc/foot.php'; 
?>