<h1 class="display-3 text-center my-5">Modification </h1>
<div class="container w-50">
    <a class="btn btn-dark mb-3" href="index.php" role="button">Retour</a>
    <div class="card p-4 border-0 shadow-sm">
        <form action="index.php?ctrl=nain&action=update&id=<?= $nain->getId() ?>" method="POST">

            <div class="form-group my-3">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?= $nain->getNom() ?>">
            </div>

            <button type="submit" class="btn btn-primary my-3">Modifier</button>
        </form>
    </div>
</div>