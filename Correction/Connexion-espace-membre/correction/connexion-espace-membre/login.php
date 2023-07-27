<?php 
    session_start();
    require 'inc/head.php';
?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="w-25">
        <div class="card p-4 ">
            <h1 class="p-2" >Connexion</h1>
            <form action="processing.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email </label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                    <input type="password" name="pwd" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>
        </div>
    </div>
</div>

<?php 
    require 'inc/foot.php'
?>