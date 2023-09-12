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
      <p>Originaire de <a href="index.php?ctrl=ville&action=villeView&id=<?= $nain->getV_id() ?>"><?= $nain->getVille() ?></a></p>
      <?= $nain->getTaverne() == "0" ? "" : "<p>Boit dans <a href=\"index.php?ctrl=taverne&action=taverneView&id=".$nain->getT_id()."\">".$nain->getTaverne()."</a></p>" ?>
      <p>Travaille de <?= $nain->getDebut()." à ".$nain->getFin() ?> dans le tunnel de <?= $nain->getDepart()." à ".$nain->getArrivee() ?> </p>
      <p>Membre du groupe <?= $nain->getGroupe() == "0" ? "Aucun groupe" : "<a href=\"index.php?ctrl=groupe&action=groupeView&id=".$nain->getGroupe()."\">n°".$nain->getGroupe()."</a>" ?></p>     

<?php   else: ?>
          <p>Aucun nain</p>
<?php   endif; ?>
    </div>
  </div>
</div>
<?php require 'inc/foot.php'; ?>