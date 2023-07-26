<?php 
    session_start();
    $title = 'Dashboard';
    $currentPage = 'dashboard';
    require '../inc/head.php';
    require '../inc/navbar.php';
?>

<div class="container">
    <h1 class="my-5">Bienvenue <?= $_SESSION['cem']['connected']['name'] ?></h1>
    <!-- #### DEBUG #### -->
    <hr>
    <h2>DEBUG</h2>
    <pre>
        <?php var_dump($_SESSION['cem']['connected']);?>
    </pre>
    <!-- #### FIN DEBUG #### -->
</div>
<?php 

    require '../inc/foot.php';
?>