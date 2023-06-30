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

$date1 = explode("-",$date1);
$date2 = explode("-",$date2);

$year1=$date1['0'];
$month1=$date1['1'];
$day1=$date1['2'];

$year2=$date2['0'];
$month2=$date2['1'];
$day2=$date2['2'];

if($month1==(1)||(3)||(5)||(7)||(8)||(10)||(12) ):
    $nb1 = ($year1*365)+($month1*31)+($day1);
elseif($month1==(4)||(6)||(9)||(11)):
    $nb1 = ($year1*365)+($month1*30)+($day1);
elseif($month1==(2)):
    $nb1 = ($year1*365)+($month1*28)+($day1);
endif;

if($month1==(1)||(3)||(5)||(7)||(8)||(10)||(12) ):
    $nb2 = ($year2*365)+($month2*31)+($day2);
elseif($month1==(4)||(6)||(9)||(11)):
    $nb2 = ($year2*365)+($month2*30)+($day2);
elseif($month1==(2)):
    $nb2 = ($year2*365)+($month2*28)+($day2);
endif;

// $nb1 = ($year1*365)+($month1*30)+($day1);
// $nb2 = ($year2*365)+($month2*30)+($day2);
$daysDiff = $nb2 - $nb1;

?>

<div class="d-flex flex-column justify-content-center gap-4 m-5">
    <form action="" method="POST" class="mx-auto d-flex flex-column gap-2  border border-warning rounded p-4 shadow-sm">
        
        <div class="d-flex justify-content-between gap-2">
            <label for="date1">Date 1  </label>
            <input type="date" id="date1" name="date1" value="<?=isset($_POST['date1'])?$_POST['date1']:""?>">
        </div>

        <div class="d-flex justify-content-between gap-2">
            <label for="date2">Date 2 </label>
            <input type="date" id="date2" name="date2" value="<?=isset($_POST['date2'])?$_POST['date2']:""?>">
        </div>
        
        <div class="d-flex justify-content-center gap-2 mt-4">
            <input type="submit" class="btn btn-outline-info">
            <a href="?reset" class="btn btn-outline-warning" >Reset</a>
        </div>
    </form>

    <p class="text-center"><?= $daysDiff." jours de différence" ?></p>
</div>
<div class="d-none">
<hr>
<h2>Debug</h2>
    <pre><?php var_dump($date1); ?></pre>
    <pre><?php var_dump($date2); ?></pre>
</div>
</body>
</html>