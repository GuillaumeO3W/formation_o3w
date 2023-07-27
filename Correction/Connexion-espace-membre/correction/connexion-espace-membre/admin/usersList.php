<?php 
    session_start();
    $title = 'Users List';
    $currentPage = 'usersList';
    require '../inc/head.php';
    require '../inc/navbar.php';

?>

<div class="container">
    <h1 class="my-5">Users</h1>

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
