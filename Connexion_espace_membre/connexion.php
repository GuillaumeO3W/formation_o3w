<?php 
session_start(); 
// session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion à un espace membre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
<div class="container d-flex flex-column min-vh-100 justify-content-center align-items-center">
    <?php if(isset($_SESSION['member']['error'])): ?>
            <p class="display-5 text-danger"><?= $_SESSION['member']['error'] ?></p>
    <?php endif ; ?>

    <form action="traitement.php" method="post" class="border rounded p-4 d-flex flex-column">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Identifiant</label>
            <input type="text" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de Passe</label>
            <input type="password" name="pwd" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-outline-info">Connexion</button>
    </form>
</div>
</body>
</html>