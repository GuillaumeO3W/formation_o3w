<?php
function isNotConnected(){
    if(!isset($_SESSION['espaceAdmin']['connected'])){
        header('Location: ../login.php');
        exit;
    }
}

?>