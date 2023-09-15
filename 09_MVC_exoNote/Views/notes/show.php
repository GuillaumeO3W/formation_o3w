<?php   if(!empty($note)) : ?>
<div class="section">
  <div class="card is-shadowless">
    <div class="card-content">
      <div class="title">
        <?= $note->getTitre() ?>
      </div>
      <p><?= $note->getTexte() ?></p>

<?php   else: ?>
          <p>Aucune note</p>
<?php   endif; ?>
    </div>
  </div>
</div>
<?php require 'inc/foot.php'; ?>