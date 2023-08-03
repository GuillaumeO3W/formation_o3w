<?php

function isNotConnected(){
    if(!isset($_SESSION[APP_TAG]['connected'])){
        header('Location: ../login.php?_err=403');
        exit;
    }
}
// function isNotConnected(){
//     if(!isset($_SESSION[APP_TAG]['connected'])){
//         return true;
//     }
//     return false;
// }