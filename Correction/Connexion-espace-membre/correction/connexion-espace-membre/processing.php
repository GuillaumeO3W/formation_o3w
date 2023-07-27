<?php 
    session_start();

    require 'db/datas.php';
    require 'lib/utils/functions.php';

    if(isset($_POST['email']) && isset($_POST['pwd'])){
        if(!empty($_POST['email']) && !empty($_POST['pwd'])){
            // $email = $_POST['email'];
            // $password = $_POST['pwd'];
            // foreach($users as $user){
            //     if($email === $user['email'] && $password === $user['pwd']){
            //         unset($user['pwd']);
            //         $_SESSION['cem']['connected'] = $user;
            //         header('Location: admin/dashboard.php');
            //         exit;
            //     }
            // }

            // header('Location: login.php');
            // exit;
            userExist($users, $_POST);

        }else{
            header('Location: login.php');
            exit;
        }
    }


// var_dump($_POST);