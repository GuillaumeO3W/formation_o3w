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

switch ($month1){
    case 1 : $nb1 = (365-$day1); break;
    case 2 : $nb1 = (334-$day1); break;
    case 3 : $nb1 = (306-$day1); break;
    case 4 : $nb1 = (275-$day1); break;
    case 5 : $nb1 = (245-$day1); break;
    case 6 : $nb1 = (214-$day1); break;
    case 7 : $nb1 = (184-$day1); break;
    case 8 : $nb1 = (153-$day1); break;
    case 9 : $nb1 = (122-$day1); break;
    case 10 : $nb1 = (92-$day1); break;
    case 11 : $nb1 = (61-$day1); break;
    case 12 : $nb1 = (31-$day1); break;
}
switch ($month2){
    case 1 : $nb2 = (($year2-$year1-1)*365)+($day2); break;
    case 2 : $nb2 = (($year2-$year1-1)*365)+31+($day2); break;
    case 3 : $nb2 = (($year2-$year1-1)*365)+59+($day2); break;
    case 4 : $nb2 = (($year2-$year1-1)*365)+90+($day2); break;
    case 5 : $nb2 = (($year2-$year1-1)*365)+120+($day2); break;
    case 6 : $nb2 = (($year2-$year1-1)*365)+151+($day2); break;
    case 7 : $nb2 = (($year2-$year1-1)*365)+181+($day2); break;
    case 8 : $nb2 = (($year2-$year1-1)*365)+212+($day2); break;
    case 9 : $nb2 = (($year2-$year1-1)*365)+243+($day2); break;
    case 10 : $nb2 = (($year2-$year1-1)*365)+273+($day2); break;
    case 11 : $nb2 = (($year2-$year1-1)*365)+304+($day2); break;
    case 12 : $nb2 = (($year2-$year1-1)*365)+334+($day2); break;
}

$daysDiff = abs($nb1+$nb2);

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