<?php   if(!empty($ville)) : ?>
<div class="section">
  <div class="card is-shadowless">
    <div class="card-content">
      <div class="title">
        <?= $ville->getNom().", ".$ville->getSuperficie() ?>
      </div>
      <a href="index.php?ctrl=nain&action=nainsList&v_id=<?= $ville->getId() ?>">Liste des nains originaires de cette ville</a>

<?php   else: ?>
          <p>Aucune ville</p>
<?php   endif; ?>
    </div>
  </div>
</div>
<?php require 'inc/foot.php'; ?>