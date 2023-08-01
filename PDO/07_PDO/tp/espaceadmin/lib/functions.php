<?php
function isNotConnected(){
    if(!isset($_SESSION['espaceAdmin']['connected'])){
        header('Location: ../login.php');
        exit;
    }
}

function error(){
    if(isset($_GET['error'])){
        $error="erreur de connexion";
    }else{
        $error="";
    }
    return $error;
}

?>