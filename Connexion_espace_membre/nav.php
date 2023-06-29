<?php 
session_start();
include ('no_return.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_SESSION['member']['role'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        a{
            color : #000 !important;
        }
        a:hover{
            color : #a1a996 !important;
        }
        .logout:hover{
            color : #dd5c2b !important;
        }
    </style>
</head>
<body>
<div class="fixed-top">
    <ul class="nav nav-underline justify-content-center">
        <li class="nav-item"><a class="nav-link"  href="index.php">home</a></li>
        <li class="nav-item"><a class="nav-link"  href="<?= $_SESSION['member']['role'] ?>1.php"><?= $_SESSION['member']['role'] ?> 1</a></li>
        <li class="nav-item"><a class="nav-link"  href="<?= $_SESSION['member']['role'] ?>2.php"><?= $_SESSION['member']['role'] ?> 2</a></li>
        <li class="nav-item"><a class="nav-link"  href="<?= $_SESSION['member']['role'] ?>3.php"><?= $_SESSION['member']['role'] ?> 3</a></li>
        <li class="nav-item"><a class="logout  nav-link" href="logout.php">Déconnexion</a></li>
    </ul>
</div>