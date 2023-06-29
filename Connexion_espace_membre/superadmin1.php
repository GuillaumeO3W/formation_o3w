<?php
include ('nav.php');
?>
<div class="container d-flex flex-column min-vh-100 justify-content-center align-items-center">
    <h1>Bienvenue <?= $_SESSION['member']['name'].' '.$_SESSION['member']['lastname'] ?> sur la page <?= $_SESSION['member']['role'] ?> 1</h1>
</div>
</body>
</html>