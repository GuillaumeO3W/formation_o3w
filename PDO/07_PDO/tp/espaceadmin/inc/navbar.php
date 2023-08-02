<hr>
<a href="dashboard.php" style="background-color : <?= $page === 'dashboard' ? 'lightblue' : '';?>">Dashboard</a>
<a href="usersList.php" style="background-color : <?= $page === 'usersList' ? 'lightblue' : '';?>">Liste des utilisateurs</a>
<a href="addUser.php" style="background-color : <?= $page === 'addUser' ? 'lightblue' : '';?>">Ajouter un utilisateur</a>
<span style="font-weight: bold; color: red; margin-left:30px;"><?=  $_SESSION['espaceAdmin']['connected']; ?></span>
<a href="destroy.php?session=destroy">déconnexion</a>
<hr>