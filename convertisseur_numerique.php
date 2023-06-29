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
// RESET SESSION 'convert' ------------------------------

if(isset($_GET['reset'])){
    unset($_SESSION['convert']);
    $page = $_SERVER['PHP_SELF'];
    header('Location:'.$page);
    exit;
}

if(isset($_POST['input'])){
    $input = $_POST['input'];
    unset($_SESSION['convert']['result']);
}else{
    $input = null;
}

if(!isset($_SESSION['convert']['result']) ){
    $_SESSION['convert']['result']=null;
}

// ---------Convertisseur Chiffres Romains => Chiffres Arabes METHOD 1------------

function convert($input){
    if($input != null && ctype_alpha($input)):
        $input = strtoupper($input);
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
            if(isset($_SESSION['convert']['value'])&& isset($_SESSION['convert']['result'])): 
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

// ---------Convertisseur Chiffres Arabes => Chiffres Romains METHOD 1-----------

    if($input != null && ctype_digit($input)):
        $split = array_reverse(str_split($input));
        
        foreach($split as $key => $nb):
            if ($key == 0){ $a = 'I'; $b = 'V'; $c = 'X';};
            if ($key == 1){ $a = 'X'; $b = 'L'; $c = 'C';};
            if ($key == 2){ $a = 'C'; $b = 'D'; $c = 'M';};
            if ($key == 3 && $nb < 4){ $a = 'M';};
            if ($key == 3 && $nb >= 4){ $a = 'I'; $b = 'V'; $c = 'X';};
            if ($key == 4 && $nb < 4){ $a = 'X';};
            if ($key == 4 && $nb >= 4){ $a = 'X'; $b = 'L'; $c = 'C';};
            
            switch ($nb){
                case '0' : $nb=null ; break;
                case '1' : $nb=$a; break;
                case '2' : $nb=$a.$a; break;
                case '3' : $nb=$a.$a.$a; break;
                case '4' : $nb=$a.$b; break;
                case '5' : $nb=$b; break;
                case '6' : $nb=$b.$a; break;
                case '7' : $nb=$b.$a.$a; break;
                case '8' : $nb=$b.$a.$a.$a; break;
                case '9' : $nb=$a.$c; break;
            };
                            
            if($key>=3 && $nb >=4){
                    $_SESSION['convert']['result'] = "<span style=\"text-decoration: overline;\">".$nb."</span>".$_SESSION['convert']['result']; 
            }else{
                    $_SESSION['convert']['result'] = $nb.$_SESSION['convert']['result'];
            }
        endforeach;
    endif;
    return $_SESSION['convert']['result'];
}

// ------Convertisseur Chiffres Romains => Chiffres Arabes METHOD 2 -------------

// $converter = [
//     'M' => 1000,
//     'D' => 500,
//     'C' => 100,
//     'L' => 50,
//     'X' => 10,
//     'V' => 5,
//     'I' => 1
// ]; 

// if(isset($_POST['input']) && ctype_alpha($input)):
//     $split = array_reverse(str_split($input));
//     foreach($split as $key => $romanInput):
//         foreach($converter as $roman => $arabic):
//             if($romanInput == $roman):
//                 if(isset($_SESSION['convert']['value'])): 
//                     if($arabic < $_SESSION['convert']['value']):
//                         $_SESSION['convert']['result']-=$arabic;
//                         $_SESSION['convert']['value']=$arabic;
//                     else:
//                         $_SESSION['convert']['result']+=$arabic;
//                         $_SESSION['convert']['value']=$arabic;
//                     endif; 
//                 else:
//                     $_SESSION['convert']['value']=$arabic;
//                     $_SESSION['convert']['result']=$arabic;   
//                 endif; 
//             endif;
//         endforeach;
//     endforeach;
// endif;



?>
<!-- AFFICHAGE ----------------------------------------------------- -->

<div class=" min-vh-100 d-flex flex-column justify-content-center align-items-center bg-primary text-light gap-3">
    <h1>Convertisseur des chiffres romains</h1>
    <p class="display-4"><?= /* isset($_SESSION['convert']['result'])?$_SESSION['convert']['result']:''; */ convert($input); ?></p>
    <form action="" method="POST" class="border radius p-3 d-flex flex-column gap-2">
        <input type="text" name="input" value="<?= isset($_POST['input'])?$_POST['input']:'' ?>">
        <div class="d-flex flex-row justify-content-center gap-2">
            <input type="submit" class="btn btn-info">
            <a href="?reset" class="btn btn-warning">reset</a>
        </div>
    </form>
    
</div>

<!-- DEBUG --------------------------------------------------------- -->

<div class="d-none">
    <hr>
    <h2>Debug</h2>
    <pre class=""><?php print_r($split)?></pre>  
    <pre class="text-primary"><?php print_r($_SESSION['convert'])?></pre>
    <pre class="text-primary"><?php print_r($converter)?></pre>
</div>
</body>
</html>