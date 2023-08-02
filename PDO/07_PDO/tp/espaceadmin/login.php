<?php
session_start();
require 'lib/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Admin</title>
</head>
<body>
    <p class="error"><?= isset($_SESSION['espaceAdmin']['error']) ? $_SESSION['espaceAdmin']['error'] : ""; ?></p>
    <form action="admin/connexion.php" method="POST">
        <input type="text" name="use_login" placeholder="login">
        <input type="password" name="use_mdp" placeholder="password">
        <input type="submit" value="Login">
    </form>
</body>
</html>