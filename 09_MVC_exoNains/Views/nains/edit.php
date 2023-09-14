<?php 
require 'inc/head.php';
?>
<a href="index.php" class="button is-dark ">Retour</a>
<div class="section">
    <h1 class="title">Modification</h1>
    <div class="card is-shadowless">
        <div class="card-content">
            <form action="index.php?ctrl=nain&action=update&id=<?= $nain->getId() ?>" method="POST">
                <div>
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" value="<?= $nain->getNom() ?>">
                </div>
                <button type="submit">Modifier</button>
            </form>
        </div>
    </div>
</div>
