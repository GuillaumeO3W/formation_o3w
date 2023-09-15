<h1 class="display-3 text-center my-5">Ajouter un nain</h1>
<div class="container w-50">
    <a class="btn btn-dark mb-3" href="index.php" role="button">Retour</a>
    <div class="card p-4 border-0 shadow-sm">
        <form action="index.php?ctrl=user&action=store" method="POST">

            <div class="form-group my-3">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="n_nom">
            </div>
            <div class="form-group my-3">
                <label for="barbe">longueur Barbe</label>
                <input type="number" class="form-control" id="barbe" name="n_barbe">
            </div>
            <div class="form-group my-3">
                <label for="groupe">Groupe</label>
                <input type="number" class="form-control" id="groupe" name="n_groupe_fk">
            </div>
            <div class="form-group my-3">
                <label for="ville">Ville</label>
                <input type="number" class="form-control" id="ville" name="n_ville_fk">
            </div>

            <button type="submit" class="btn btn-primary my-3">Créer</button>
        </form>
    </div>
</div>