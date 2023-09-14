<h1 class="display-3 text-center my-5">Modification </h1>
<div class="container w-50">
    <a class="btn btn-dark mb-3" href="index.php" role="button">Retour</a>
    <div class="card p-4 border-0 shadow-sm">
        <form action="index.php?ctrl=user&action=update&id=<?php echo $user->getId() ?>" method="POST">

            <div class="form-group my-3">
                <label for="login">Login</label>
                <input type="text" class="form-control" id="login" name="login" value="<?php echo $user->getLogin() ?>">
            </div>

            <!-- <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" class="form-control" id="mdp" name="mdp">
            </div> -->

            <button type="submit" class="btn btn-primary my-3">Modifier</button>
        </form>
    </div>
</div>