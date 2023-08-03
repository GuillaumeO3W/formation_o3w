<?php
session_start();
$title = 'Dashboard';
$page = 'dashboard';
require 'config/ini.php';
require 'lib/utils/functions.php';
require 'inc/head.php';
require 'inc/navbar.php';
?>
<h1><?= $title ?></h1>

<?php
require 'inc/foot.php';
?>