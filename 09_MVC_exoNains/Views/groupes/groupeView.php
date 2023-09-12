<?php 
    require 'inc/head.php';
?>
<a href="index.php" class="button is-dark ">Retour</a>
<?php 
if(!empty($groupe)) :
 ?>
<div class="section">
  <div class="card is-shadowless">
    <div class="card-content">
      <div class="title">
        <?= "Groupe n°" .$groupe->getId() ?>
      </div>
      <p>Boivent dans la taverne "<?= $groupe->getTaverne() ?>"</p>  
      <p>Creusent de <?= $groupe->getDebut() ?> à <?= $groupe->getFin() ?></p>  

<?php   else: ?>
          <p>Aucun Groupe</p>
<?php   endif; ?>
    </div>
  </div>
</div>
<?php require 'inc/foot.php'; ?>