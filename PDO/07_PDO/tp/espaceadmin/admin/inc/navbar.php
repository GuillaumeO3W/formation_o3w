<?php 
isNotConnected();

if(isset($_GET['logout'])){
    unset($_SESSION[APP_TAG]['connected']);
    header('Location: ../login.php');
    exit;
}

?>


<a href="dashboard.php" style="background-color : <?= $page === 'dashboard' ? 'lightblue' : '';?>">Dashboard</a>
<a href="usersList.php" style="background-color : <?= $page === 'usersList' ? 'lightblue' : '';?>">Liste des utilisateurs</a>
<?php 
    if($_SESSION[APP_TAG]['connected']['rol_pouvoir'] <=1): ?>
        <a href="addUser.php" style="background-color : <?= $page === 'addUser' ? 'lightblue' : '';?>">Ajouter un utilisateur</a>
<?php endif; ?>

<span class="user"><?=  $_SESSION[APP_TAG]['connected']['use_login']; ?></span>
<a href="?logout">déconnexion</a>
<hr>