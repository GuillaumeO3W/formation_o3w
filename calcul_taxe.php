<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcul Taxe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        form input{
            text-align : center;
            font-family : impact;
        }

    </style>
</head>
<body>
<?php
function calculTTC($ht,$tva){
    $ttc = $ht + ($ht*$tva /100);
    return $ttc;
} 
function calculTaxe($ht,$tva){
    $taxe= ($ht * $tva)/100;
    return $taxe;
} 

if (isset($_POST['ht']) && isset($_POST['tva'])) {
    if(ctype_digit($_POST['ht']) && ctype_digit($_POST['tva'])){
        $ht = $_POST['ht'];
        $tva = $_POST['tva'];
        $ttc = calculTTC(intval($ht),intval($tva));
        $taxe = calculTaxe(intval($ht),intval($tva));
    }
}
?>
<div class="container d-flex flex-column min-vh-100 justify-content-center align-items-center">
    <form action="" method="POST" class="border rounded p-4 d-flex flex-column mb-4">
    <h1 class="display-5 mb-4">Calcul de taxe</h1>
            <div class="mb-3">
                <input type="number" name="ht" class="form-control" id="ht" placeholder="H T">
            </div>
            <div class="mb-3">
                <input type="number" name="tva" class="form-control" id="tva" placeholder="T V A">
            </div>
            <button type="submit" class="btn btn-outline-info">Calcul</button>
    </form>
    <div class="text-center">
        <p><?= 'ht = ' .$ht. '€ / tva = '.$tva. '% / taxe = ' .$taxe .' €' ?></p>
        <h2><?= 'ttc = ' .$ttc .' €'?></h2>
    </div>
</div>
<pre class="d-none"><?php var_dump($_POST) ?></pre>
</body>
</html>