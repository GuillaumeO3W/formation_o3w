<?php
$title = 'Ajout utilisateur';
$page = 'addUser';
require '../inc/head.php';
?>
<h1><?= $title ?></h1>
<p style="font-weight: bold; color: red;"><?=  $_SESSION['espaceAdmin']['connected']; ?></p>
<?php
require '../inc/navbar.php';
?>







<?php
require '../inc/foot.php';
?>