<?php
session_start();
if (isset($_GET['session'])&& $_GET['session']=='destroy'){
    unset($_SESSION['espaceAdmin']);
}
header('Location: ../login.php');
?>