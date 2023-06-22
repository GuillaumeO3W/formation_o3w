<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
<div class="fixed-top">
    <ul class="nav nav-underline justify-content-center">
        <li class="nav-item">
            <a class="nav-link"  href="page1.php">page1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="page2.php">page2</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="page3.php">page3</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?logout">Déconnexion</a>
        </li>
    </ul>
</div>
<div class="container d-flex flex-column min-vh-100 justify-content-center align-items-center">
<h1><?= $_SESSION['name'].' '.$_SESSION['lastname'] ?> vous êtes sur la page 2</h1>
</div>
</body>
</html>