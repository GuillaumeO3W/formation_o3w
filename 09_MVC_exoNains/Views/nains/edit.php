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
                        <input type="number" class="input" id="barbe" name="barbe" value="<?= $nain->getBarbe() ?>" step="0.01" min="0">
                    </div>
                </div>
                <button type="submit"  class="button is-link is-light">Modifier</button>
            </form>
        </div>
    </div>
</div>
