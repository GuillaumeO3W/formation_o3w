<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display : flex;
            justify-content : center;
            align-items: center;
        }
        .container{
            display : flex;
            flex-direction : column;
            align-items : center;
        }
        .flex{
            display : flex;
            justify-content : center;
            gap : 10px;
            padding : 20px 20px;
            background-color : #f3eae8; 
            border-radius : 6px;
            width :500px;
        
        }
        .champs{
            width : 60px;
        }
        .red{
            color : red;
            font-weight : 900;
        }
    </style>
</head>
<body>

<?php  

if (isset($_POST['nbA'])){       // INITIALISATION DES VARIABLES -----------
    $nbA = str_replace(",",".",$_POST['nbA']);
}else{
    $nbA = null;
}
if (isset($_POST['nbB'])){
    $nbB = str_replace(",",".",$_POST['nbB']);
}else{
    $nbB = null;
}
if (isset($_POST['sign'])){
    $sign = $_POST['sign'];
}else{
    $sign = null;
}
$result=null;

// FUNCTION ERREUR -------------------------
function error($nbA,$nbB,$sign){
    if (is_numeric($nbA) && is_numeric($nbB)){
        if($sign=="/" && $nbB == 0){
            $error = "Erreur : Attention ! On ne peut pas diviser par (0).";
        }else{
            $error = null;
        }
    }else{
        $error = "Erreur : Merci de saisir des chiffres !";
    }
    return $error;
}

// FUNCTION CALCUL -------------------------
function calcul($nbA,$nbB,$sign){
    
    if (is_numeric($nbA) && is_numeric($nbB)){ 
        if($sign=="/" && $nbB == 0){
            $result = "&#128534";
        }else{
            if($sign == "+"){
                $result = $nbA + $nbB;
            }elseif ($sign == "-"){
                $result = $nbA - $nbB;
            }elseif ($sign == "x"){
                $result = $nbA * $nbB;
            }elseif ($sign == "/"){
                $result = $nbA / $nbB;
            }
        }
    } else{
        $result = "&#128534";
    }
    return str_replace(".",",",$result);   
}

?>

<div class="container">
    <div class="flex">
        <form action="" method="POST">    <!-- AFFICHAGE DU FORMULAIRE --------->
            <input class="champs" type="text" name="nbA" value="<?= str_replace(".",",",$nbA) ?>">
            <select name="sign">
                <option value="+" <?=($sign=="+")?"selected":""?> >+</option>
                <option value="-" <?=($sign=="-")?"selected":""?> >-</option>
                <option value="x" <?=($sign=="x")?"selected":""?> >x</option>
                <option value="/" <?=($sign=="/")?"selected":""?> >/</option>
            </select>
            <input class="champs" type="text" name="nbB" value="<?= str_replace(".",",",$nbB) ?>">
            <input type="submit" value="=">
        </form>
        <div>
            <?php                                  // AFFICHAGE DU RESULTAT ------
                if (isset($nbA) && isset($nbB)){
                    echo calcul($nbA,$nbB,$sign); 
                }
            ?>  
        </div>
    </div>
    <div class="red">
            <?php                                  // AFFICHAGE DE L'ERREUR ------
                if (isset($nbA) && isset($nbB)){
                    echo error($nbA,$nbB,$sign); 
                }
            ?> 
    </div> 
</div>

</body>
</html>