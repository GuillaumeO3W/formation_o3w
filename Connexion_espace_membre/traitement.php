<?php
session_start(); 

$users=[
    [
        'id'=>'1',
        'pwd'=>'111',
        'name'=>'John',
        'lastname'=>'Do',
        'role'=>'superadmin'
    ],
    [
        'id'=>'2',
        'pwd'=>'222',
        'name'=>'Luc',
        'lastname'=>'Skywalker',
        'role'=>'admin'
    ],
    [
        'id'=>'3',
        'pwd'=>'333',
        'name'=>'Antonio',
        'lastname'=>'Montana',
        'role'=>'invite'
    ],
];

if(isset($_POST['id']) && $_POST['id'] != null){
    $_SESSION['member']['id'] = $_POST['id'];
}else{
    $_SESSION['member']['error'] = "Veuillez entrez un identifiant";
    header ('location: connexion.php');
    exit; 
}

if(isset($_POST['pwd']) && $_POST['pwd'] != null){
    $_SESSION['member']['pwd'] = $_POST['pwd'];
}else{
    $_SESSION['member']['error'] = "Veuillez entrer un mot de passe";
    header ('location: connexion.php');
    exit; 
}

foreach ($users as $index => $user):
    if($_SESSION['member']['id']==$user['id']):
        if($_SESSION['member']['pwd']==$user['pwd']):
            $_SESSION['member']['name'] = $user['name'];
            $_SESSION['member']['lastname'] = $user['lastname'];
            $_SESSION['member']['role'] = $user['role'];
            exit; 
        else:
            $_SESSION['member']['error'] = "Mot de passe erroné";
            header('location: connexion.php');
            exit; 
        endif;
    else:
        $_SESSION['member']['error'] = "Identifiant inconnu !";
    endif;
endforeach;

if( $_SESSION['member']['error'] != null):
    header('location: connexion.php');
else:
    header('location: index.php');
endif;