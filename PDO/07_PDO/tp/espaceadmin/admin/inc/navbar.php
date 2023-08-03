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
<a href="addUser.php" style="background-color : <?= $page === 'addUser' ? 'lightblue' : '';?>">Ajouter un utilisateur</a>
<span class="user"><?=  $_SESSION[APP_TAG]['connected']['use_login']; ?></span>
<a href="?logout">déconnexion</a>
<hr>