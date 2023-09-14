<a href="index.php" class="button is-dark ">Retour</a>
<div class="section">
    <h1 class="title">Modification</h1>
    <div class="card is-shadowless">
        <div class="card-content">
            <form action="index.php?ctrl=nain&action=update&id=<?= $nain->getId() ?>" method="POST">
                <div class="field">
                    <label for="nom"  class="label">Nom</label>
                    <div class="control">
                        <input type="text" class="input" id="nom" name="nom" value="<?= $nain->getNom() ?>">
                    </div>
                </div>
                <div class="field">
                    <label for="barbe"  class="label">Barbe</label>
                    <div class="control">
                        <input type="number" class="input" id="barbe" name="barbe" value="<?= $nain->getBarbe() ?>">
                    </div>
                </div>
                <button type="submit"  class="button is-link is-light">Modifier</button>
            </form>
        </div>
    </div>
</div>
