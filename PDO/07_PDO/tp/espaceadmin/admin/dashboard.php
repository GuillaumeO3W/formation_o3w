<?php
session_start();
$title = 'Dashboard';
require '../inc/head.php';
?>
<h1><?= $title ?></h1>
<p>Bonjour <span style="font-weight: bold; color: red;"><?=  $_SESSION['espaceAdmin']['login']; ?></span></p>
<a href="destroy.php?session=destroy" class="btn btn-danger">déconnexion</a>
<?php
require '../inc/navbar.php';
?>






<?php
require '../inc/foot.php';
?>