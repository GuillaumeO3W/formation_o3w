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
            # On parcours notre tableau associatif et a chaque tour on créée un objet de Conversation afin d'avoir acces aux getters  
            if(!empty($conversations)) : 
            foreach($conversations as $conv) :
          ?>
          <!-- Ternaire pour mettre en rouge le fond des conversations terminées  -->
          <tr class="<?= (!$conv->getStatus() ? '' : 'has-background-danger') ?>">
            <th><?= $conv->getId() ?></th>
            <td><?= $conv->getDate() ?></td>
            <td><?= $conv->getHour() ?></td>
            <td><?= $conv->getNbMsg() ?></td>
            <!-- on rajoute dans l'url un parametre ($_GET) pour cibler la conversation dans la page messages.php -->
            <td><a href="index.php?ctrl=conversation&action=conversationView&idConv=<?= $conv->getId() ?>" class="button is-dark is-small">Voir messages</a></td>
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