<?php 
session_start();
// session_destroy();
?>
<!-- Nombre de jours
Concevoir un programme qui demande deux dates à l’utilisateur et calcule le nombre de
jours les séparant (on ne tiendra pas compte des années bissextiles)
/!\ Il est bon de se rappeler que les mois n’ont pas tous le même nombre de jours -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nombre de jours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<?php

// RESET SESSION 'date' ------------------------------

if(isset($_GET['reset'])){
    unset($_SESSION['date']);
    $page = $_SERVER['PHP_SELF'];
    header('Location:'.$page);
    exit;
}

isset($_POST['date1']) ? $date1=$_POST['date1'] : $date1=null;
isset($_POST['date2']) ? $date2=$_POST['date2'] : $date2=null;




?>
<div class="d-flex flex-column min-vh-100 justify-content-center align-items-center gap-4">
    <form action="" method="POST" class="d-flex flex-column gap-2  border border-warning rounded p-4 shadow-sm">
        
        <div class="d-flex justify-content-between gap-2">
            <label for="date1">Date de départ : </label>
            <input type="date" id="date1" name="date1">
        </div>

        <div class="d-flex justify-content-between gap-2">
            <label for="date2">Date de fin :</label>
            <input type="date" id="date2" name="date2">
        </div>
        
        <div class="d-flex justify-content-center gap-2 mt-4">
            <input type="submit" class="btn btn-outline-info">
            <a href="?reset" class="btn btn-outline-warning" >Reset</a>
        </div>
    </form>
    <?= $date1.' -- '.$date2; ?>
</div>

</body>
</html>