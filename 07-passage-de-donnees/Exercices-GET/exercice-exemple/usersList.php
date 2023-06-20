<?php 
  $title = 'Utilisateurs';
  $currentPage = 'users';

  require 'inc/head.php'; 
  require 'inc/navbar.php';

  $users = [
    [
      'id' => 1,
      'name' => 'Sony',
      'job' => 'Chômeur',
      'hobby' => 'DROP DATABASE'
    ],
    [
      'id'=> 2,
      'name' => 'Olivier',
      'job' => 'Homme de joie',
      'hobby' => 'Croziflette'
    ],
    [
      'id'=> 3,
      'name' => 'Adrien',
      'job' => 'En prison',
      'hobby' => 'savonette peau sensible'
    ],
  ];


?>

<h1 class="display-1 text-center my-5">Liste des Utilisateurs</h1>

<div class="container">
  <div class="row gap-4">
    <?php foreach($users as $user) : ?>
      <div class="col">
        <div class="card">
          <h5 class="card-header"><?= $user['name'] ?></h5>
          <div class="card-body">
            <h5 class="card-title"><?= $user['job'] ?></h5>
            <p class="card-text"><?= $user['hobby'] ?></p>
            <a href="user.php?id=<?= $user['id'] ?>&name=<?= $user['name'] ?>" class="btn btn-primary">Voir le profil</a>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>

</div>

<?php require 'inc/foot.php'; ?>



