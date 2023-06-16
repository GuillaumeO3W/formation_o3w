<?php
session_start();
if (isset($_GET['session'])&& $_GET['session']=='destroy'){
    session_destroy();
}
header('Location: http://localhost/formation_o3w/exo/session_Liste_de_courses/index.php');
?>