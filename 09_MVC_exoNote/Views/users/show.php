<?php 
if(!empty($user)) :
?>
<div class="section">
  <div class="card is-shadowless">
    <div class="card-content">
      <div class="title">
        <?= $user->getNom() ?>
      </div>
      <p>email : <?= $user->getEmail() ?></p> 
      <p>mdp : <?= $user->getMdp() ?></p> 

<?php   else: ?>
          <p>Aucun user</p>
<?php   endif; ?>
    </div>
  </div>
</div>
<?php require 'inc/foot.php'; ?>