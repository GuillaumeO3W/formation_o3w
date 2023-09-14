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
                    <div class="field">
                        <label for="ville"  class="label">Ville de naissance</label>
                        <div class="select">
                            <select name="ville" id="ville">
                                <?php
                                    foreach($villes as $ville):
                                ?>
                                <option value="<?= $ville->getId() ?>"><?= $ville->getNom() ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="field">
                        <label for="groupe"  class="label">Groupe</label>
                        <div class="select">
                            <select name="groupe" id="groupe">
                                <?php
                                    foreach($groupes as $groupe):
                                ?>
                                <option value="<?= $groupe->getId() ?>" <?= $groupe->getId() === $nain->getGroupe() ? 'selected' : '' ?>>groupe n° <?= $groupe->getId() ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                <button type="submit"  class="button is-link is-light">Modifier</button>
            </form>
        </div>
    </div>
</div>
