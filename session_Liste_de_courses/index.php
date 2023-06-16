<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<?php
if(isset($_POST['product']) && !empty($_POST['product']) && isset($_POST['quantity']) && !empty($_POST['quantity'])){
    
    $_SESSION[$_POST['product']] = $_POST['quantity'] ;
}

if (isset($_POST['select']) && !empty($_POST['select'])){
        unset($_SESSION[$_POST['select']]);
}
?>

<div class="container">
    <!-- FORMULAIRE ---------------------------------- -->
    <div class="card my-5">
        <div class="card-header ">Liste de courses</div>
        <div class="card-body ">
            <form class="row g-3" method="post" action="index.php?session=null">
                <div class="mb-3 col-auto">
                    <input type="text" class="form-control" name="product" aria-describedby="emailHelp" placeholder="Produit">
                </div>
                <div class="mb-3 col-3">
                    <input type="number" class="form-control" name="quantity" placeholder="Quantité">
                </div>
                <div class=" col-auto">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
        <hr>
        <!-- AFFICHAGE LISTE DE COURSE -------------------------- -->
        <form action="" method="post" class="mb-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Articles</th>
                        <th scope="col">Quantitée</th>
                        <th scope="col">Selectionnez</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($_SESSION as $product => $quantity):   
                    ?>
                    <tr>
                        <td> <?= $product; ?> </td>
                        <td> <?= $quantity; ?> </td>
                        <td><input type="checkbox" name="select" value="<?=$product?>"></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <div class="text-center">
                <a href="destroy.php?session=destroy" class="btn btn-danger">Effacer la liste</a>
                <button type="submit" class="btn btn-warning">Supprimer la selection</button>
            </div>
        </form>
    </div>  
</div>    
</body>
</html>