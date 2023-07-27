<?php

function userExist($users, $searchedUser){
    foreach($users as $user){
        if($searchedUser['email'] === $user['email'] && $searchedUser['pwd'] === $user['pwd']){
            unset($user['pwd']);
            $_SESSION['cem']['connected'] = $user;
            header('Location: admin/dashboard.php');
            exit;
        }
    }
    header('Location: login.php');
    exit;
}


function isNotConnected(){
    if(!isset($_SESSION['cem']['connected'])){
        header('Location: ../login.php');
        exit;
    }
}
// function isNotConnected(){
//     if(!isset($_SESSION['cem']['connected'])){
//         return true;
//     }
//     return false;
// }