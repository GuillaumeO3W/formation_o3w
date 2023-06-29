<?php
if($_SESSION['member'] == null):
    header ('location: connexion.php');
    exit; 
endif;
?>