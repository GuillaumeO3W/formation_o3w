<?php 
session_start();
// session_destroy();
?>
<!-- Convertisseur numérique
Concevoir un programme qui convertit les nombres Romain (tels que MCMLIV) en nombres
Arabe (tels que 1954) … et inversement.
Les chiffres romains sont lus de gauche à droite en ajoutant ou soustrayant la valeur de
chaque symbole. Si une valeur est inférieure à la valeur suivante, elle sera soustraite. Sinon,
elle sera ajoutée.
Considérant les éléments suivants : M = 1000, D = 500, C = 100, L = 50, X = 10, V = 5, I = 1
MM donnerait 2000
MCM donnerait 1900
CM donnerait 900
DC donnerait 600
CD donnerait 400
CC donnerait 200
CX donnerait 110
XC donnerait 90
LX donnerait 60
XL donnerait 40
XX donnerait 20
XI donnerait 11
IX donnerait 9
VI donnerait 6
IV donnerait 4
II donnerait 2 -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertisseur numérique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<?php
// RESET SESSION 'convert'
if(isset($_GET['reset'])){
    unset($_SESSION['convert']);
    $page = $_SERVER['PHP_SELF'];
    header('Location:'.$page);
    exit;
}

$input='MMDCCCLXXIX'; //2879

if(ctype_alpha($input)):
    $split = array_reverse(str_split($input));
    foreach($split as $key => $value):
        switch ($value){
            case 'M': $value=1000; break;
            case 'D': $value=500;  break;
            case 'C': $value=100;  break;
            case 'L': $value=50;   break;
            case 'X': $value=10;   break;
            case 'V': $value=5;    break;
            case 'I': $value=1;    break;
        }
        if(isset($_SESSION['convert']['value'])): 
            if($value < $_SESSION['convert']['value']):
                $_SESSION['convert']['result']-=$value;
                $_SESSION['convert']['value']=$value;
            else:
                $_SESSION['convert']['result']+=$value;
                $_SESSION['convert']['value']=$value;
            endif; 
        else:
            $_SESSION['convert']['value']=$value;
            $_SESSION['convert']['result']=$value;   
        endif;    
    endforeach;
endif; 
?>

<p class="text-warning"><?= $_SESSION['convert']['result']; ?></p>
<a href="?reset">reset</a>
<hr>
<h2>Debug</h2>
<pre><?php print_r($split)?></pre>
</body>
</html>