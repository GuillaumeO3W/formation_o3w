<?php
function isNotConnected(){
    if(!isset($_SESSION['espaceAdmin']['connected'])){
        header('Location: ../login.php');
        exit;
    }
}

// function error($error){
//     $_SESSION['espaceAdmin']['error'] = $error;
//     header('Location: ../login.php');
//     exit;
// }

?>