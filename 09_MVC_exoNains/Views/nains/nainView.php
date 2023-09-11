<?php 
    require 'inc/head.php';
?>
<a href="index.php" class="button is-dark ">Retour</a>
<?php 
if(!empty($nain)) :
 ?>
<div class="section">
  <div class="card is-shadowless">
    <div class="card-content">
      <div class="title">
        <?= $nain->getNom().", ".$nain->getBarbe() ?>
      </div>
      <p>Originaire de <?= $nain->getVille() ?></p>
      <?= $nain->getTaverne() == "0" ? "" : "<p>Boit dans ".$nain->getTaverne()."</p>" ?>
      <p>Membre du groupe <?= $nain->getGroupe() == "0" ? "Aucun groupe" : "n°".$nain->getGroupe() ?></p>     

<?php   else: ?>
          <p>Aucun nain</p>
<?php   endif; ?>
    </div>
  </div>
</div>
<?php require 'inc/foot.php'; ?>