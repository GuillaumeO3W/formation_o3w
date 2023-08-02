<?php
function isNotConnected(){
    if(!isset($_SESSION[APP_TAG]['connected'])){
        header('Location: ../login.php');
        exit;
    }
}

?>