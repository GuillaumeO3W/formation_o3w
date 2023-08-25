<?php 

  # VERIF | Si pas de $_POST on redirige vers login.php (au cas ou un petit malin taperait directement l'url pour essayer d'acceder a la partie admin)
  isNotConnected();
  
  # DECONNEXION
  if(isset($_GET['logout'])){
      unset($_SESSION[APP_TAG]['connected']);
      header('Location: ../login.php');
      exit;
  }

  //  if(isset($_GET['logout']) || !isset($_SESSION['cem']['connected']) ){
  //     if(isset($_GET['logout'])){
  //       unset($_SESSION['cem']['connected']);
  //     }
  //     header('Location: ../login.php');
  //     exit;
  //  }

?>

<nav class="navbar  navbar-expand-lg bg-white border-bottom shadow-sm" data-bs-theme="light">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <li class="nav-item">
          <a class="nav-link <?= $currentPage === 'dashboard' ? 'active' : '' ?>"  href="dashboard.php">Dashboard</a>
        </li>
        <?php //if($_SESSION['cem']['connected']['role'] === 'superadmin') : ?>
        <li class="nav-item">
          <a class="nav-link <?= $currentPage === 'usersList' ? 'active' : '' ?>"  href="usersList.php">Users List</a>
        </li>
        <?php //endif; ?>
        <?php //if($_SESSION['cem']['connected']['role'] === 'superadmin' || $_SESSION['cem']['connected']['role'] === 'admin') : ?>
        <li class="nav-item">
          <a class="nav-link <?= $currentPage === 'minijeu' ? 'active' : '' ?>"  href="addUser.php">Add a user</a>
        </li>
        <?php //endif; ?>
        <li class="nav-item">
          <a class="nav-link "  href="?logout">Se déconnecter</a>
        </li>
      
    </div>
  </div>
</nav>
