<?php
session_start(); 
include ('nav.php');
?>
<div class="container d-flex flex-column min-vh-100 justify-content-center align-items-center">
    <h1>Bienvenue <?= $_SESSION['name'].' '.$_SESSION['lastname'] ?> sur la page <?= $_SESSION['role'] ?> 3</h1>
</div>
</body>
</html>