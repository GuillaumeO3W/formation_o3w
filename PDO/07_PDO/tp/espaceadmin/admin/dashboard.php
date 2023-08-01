<?php
$title = 'Dashboard';
$page = 'dashboard';
require '../inc/head.php';
?>
<h1><?= $title ?></h1>
<p>Bonjour <span style="font-weight: bold; color: red;"><?=  $_SESSION['espaceAdmin']['connected']; ?></span></p>
<?php
require '../inc/navbar.php';
?>






<?php
require '../inc/foot.php';
?>