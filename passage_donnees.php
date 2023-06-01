<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
if(isset($_GET['nbr'])){
    $nbr = $_GET['nbr'];
}else{
    $nbr=null;
}
$rand=rand(10, 20);
$i=null;?>
<p>saississez un nombre entre 10 et 20 : </p>
<form method="GET">
    <input type="text" name="nbr">
    <input type="submit">
</form>

<?php
while ($nbr!=$rand && $i!=5){
    $i++; ?>
    
    <?php
    if ($nbr > 20 ){
    echo "Plus petit !\n";
    }elseif ($nbr < 10){
    echo "Plus grand !\n";
    }elseif($nbr === $rand){
    echo "gagné !!!\n" ;
    }elseif($i===3){
    echo "perdu !!!";
    }else{
    echo "essaye encore ....\n";
    }
}

?>
</body>
</html>