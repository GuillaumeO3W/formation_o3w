<?php
session_start();
$title = 'Ajout utilisateur';
require '../inc/head.php';
?>
<h1><?= $title ?></h1>
<p style="font-weight: bold; color: red;"><?=  $_SESSION['espaceAdmin']['login']; ?></p>
<a href="destroy.php?session=destroy" class="btn btn-danger">déconnexion</a>
<?php
require '../inc/navbar.php';
?>







<?php
require '../inc/foot.php';
?>