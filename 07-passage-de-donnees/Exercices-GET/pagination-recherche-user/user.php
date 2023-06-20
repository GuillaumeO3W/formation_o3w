<?php
    $title = 'Utilisateurs';
    $currentPage = 'users';

    require 'inc/head.php'; 
    require 'inc/navbar.php';
    require 'db/datas.php';


?>

<?php

$userId = $_GET['id'];



foreach($users as $user){

    if($user['id'] == $userId){
        $userDisplay = $user;
        break;  
    }
}


?>

<h1 class="display-1 text-center my-5">Liste des Utilisateurs</h1>

<div class="container">
  <div class="row gap-4">
      <div class="col">
        <div class="card">
          <h5 class="card-header"><?= $userDisplay['name'] ?></h5>
          <div class="card-body">
            <h5 class="card-title"><?= $userDisplay['job'] ?></h5>
            <p class="card-text"><?= $userDisplay['hobby'] ?></p>
        </div>
      </div>
  </div>

</div>

<hr>
<h2>DEBUG</h2>
<pre>
    <?php 
        var_dump($_GET);
        var_dump($userDisplay);
    ?>
</pre>


<?php require 'inc/foot.php'; ?>
