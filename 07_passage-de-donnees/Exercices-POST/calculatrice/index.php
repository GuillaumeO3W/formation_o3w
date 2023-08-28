<?php

$title = 'Utilisateurs';
$currentPage = 'users';

require 'inc/head.php'; 
require 'inc/navbar.php';

# ternaire - si(?) $_POST['number1'] existe et n'est pas null alors stocke la valeur de $_POST['number1'] dans $num1 sinon(:) stocke rien chaine de caractere vide

function calcul($num1, $num2, $operator){
    if($num1 != '' && $num2 != ''){
        $num1 = str_replace(',', '.', $num1);
        $num2 = str_replace(',', '.', $num2);
        if(is_numeric($num1) && is_numeric($num2)){
            switch($operator){
                case '+' :
                    $result = $num1 + $num2;
                    break;
                case '-' :
                    $result = $num1 - $num2;
                    break;
                case '*' :
                    $result = $num1 * $num2;
                    break;
                case '/' :
                    if($num2 == 0){
                        $error = 'La division par 0 est impossible !';
                    }else{
                        $result = $num1 / $num2;
                    }
                    break;
            }
        }else {
            if(!is_numeric($num1) && !is_numeric($num2)){
                return '<p>' . $num1 . ' n\'est pas un nombre valable pour une opération ! </p><p>' . $num2 . 'n\'est pas un nombre valable pour une opération ! </p>' ;
            }elseif(!is_numeric($num1)){
                return '<p>' . $num1 . ' n\'est pas un nombre valable pour une opération ! </p>';
            }elseif(!is_numeric($num2)){
                return '<p>' . $num2 . ' n\'est pas un nombre valable pour une opération ! </p>';
            }
        }
    }else{
        if(empty($num1) && empty($num2)){
            return '<p>Veuillez saisir une valeur pour le premier nombre</p> <p>Veuillez saisir une valeur pour le deuxieme nombre</p>';
        }elseif(empty($num1)){
            return '<p>Veuillez saisir une valeur pour le premier nombre</p>';
        }elseif(empty($num2)){
            return '<p>Veuillez saisir une valeur pour le deuxieme nombre</p>';
        }
    }
    return $result;
}


if(isset($_POST['number1']) && isset($_POST['number2']) && isset($_POST['operator'])){
    $num1 =  $_POST['number1'];
    $num2 =  $_POST['number2'];
    $operator = $_POST['operator'];
    $result = calcul($num1, $num2, $operator);
    $error = isset($result) && is_string($result) ? $result : ''; 
}

?>

<div class="container mt-5">
    <?php if(isset($error) && !empty($error)) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $error ?>
    </div>
    <?php endif ?>
    <!-- novalidate enleve les verifications du navigateur -->
    <form class="row g-3" method="POST" novalidate>
        <div class="col">
            <input type="text"  class="form-control"  value="<?= isset($num1) ? $num1 : '' ?>" name="number1">
        </div>
        <div class="col">
            <select class="form-select" name="operator">
                <option <?= isset($operator) && $operator == '+' ? 'selected' : '' ?> value="+" >+</option>
                <option <?= isset($operator) && $operator == '-' ? 'selected' : '' ?> value="-">-</option>
                <option <?= isset($operator) && $operator == '*' ? 'selected' : '' ?> value="*">x</option>
                <option <?= isset($operator) && $operator == '/' ? 'selected' : '' ?> value="/">/</option>
            </select>
            </div>
        <div class="col">
            <input type="text" class="form-control"  value="<?= isset($num2) ? $num2 : '' ?>" name="number2">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">=</button>
        </div>
        <div class="col">
        <input class="form-control" type="text" value="<?= isset($result) && is_numeric($result) ? $result : '' ?>" aria-label="Disabled input example" disabled readonly>
        </div>
        <div class="mb-3">
        <label for="historic" class="form-label">Historique</label>
        <textarea class="form-control" id="historic" rows="3" 
        name="historic" ><?= (isset($result) && is_numeric($result) ? $num1 .' '. $operator . ' ' . $num2 .' = ' .  $result  : '') . (isset($_POST['historic']) ? PHP_EOL . $_POST['historic'] : '' ) ?></textarea>
        </div>
    </form>
    <hr>
    <h2>DEBUG</h2>
    <pre>
        <?php var_dump($_POST);?>
    </pre>

</div>