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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body{
            background: #e9ecef;
            background: linear-gradient(180deg, #cbdbd6 0%, #dcdfe1 100%);
            background-attachment: fixed;
        }
        .card{
            border : 1px solid#ADD8E6;
        }
        .card-header{
            background-color :#ADD8E6;
        }
    </style>
</head>
<body>
<?php

// initialisation des variables POST
    if(isset($_POST['product']) && !empty($_POST['product']) && isset($_POST['quantity']) && !empty($_POST['quantity'])){
        $product = $_POST['product'];
        $quantity = $_POST['quantity'];
    }
    else{
        $product = null;
        $quantity = null;
    }

    if (isset($_POST['select']) && !empty($_POST['select'])){
        $select=$_POST['select'];
    }else{
        $select=null;
    }

// Fonction AJOUTER un produit dans la liste
    function addProduct($product,$quantity){
        $_SESSION[$product] = $quantity;
        if ($product == null){
            unset($_SESSION[$product]);
        }
        return $_SESSION;
    }

// Fonction SUPPRIMER un produit de la liste
    function removeProduct($select){
            unset($_SESSION[$select]);
    }

// Appel des fonctions
    addProduct($product,$quantity);
    removeProduct($select);
?>

<div class="container d-flex min-vh-100 justify-content-center align-items-center">

<!-- FORMULAIRE ---------------------------------- -->
    <div class="card shadow-sm">
        <div class="card-header h2 text-center ">Liste de courses</div>
        <div class="card-body">
            <form class="g-3" method="post" action="index.php?session=null">
                <div class="form-group row">
                    <div class="col-auto">
                        <input type="text" class="form-control" name="product" aria-describedby="emailHelp" placeholder="Produit">
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" name="quantity" placeholder="Quantité">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-success"><i class="bi bi-plus-circle"></i></button>
                    </div>
                </div>    
            </form>
        </div>

<!-- AFFICHAGE LISTE DE COURSE -------------------------- -->
        <form action="" method="post" class="mb-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Articles</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Selection</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($_SESSION as $product => $quantity): ?>
                    <tr>
                        <td> <?= $product; ?> </td>
                        <td> <?= $quantity; ?> </td>
                        <td><input type="checkbox" name="select" value="<?=$product?>"></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <div class="text-center">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Supprimer la liste</button>
                <button type="submit" class="btn btn-warning">Supprimer la selection</button>
            </div>
        </form>
    </div>  
</div>    

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Supprimer la liste</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Êtes-vous sûrs ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
        <a href="destroy.php?session=destroy" class="btn btn-danger">Comfirmer</a>

      </div>
    </div>
  </div>
  <div>
    <form action="" method="post">
        <input type="color" name="color" value="#e66465">
    </form>
</div>
</div>

</body>
</html>