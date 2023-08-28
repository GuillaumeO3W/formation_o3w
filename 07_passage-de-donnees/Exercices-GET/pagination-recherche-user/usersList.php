<?php 
  $title = 'Utilisateurs';
  $currentPage = 'users';

  require 'inc/head.php'; 
  require 'inc/navbar.php';
  require 'db/datas.php';


  # 1 - Afficher tous les utilisateurs
  # 2 - La pagination
      /*
        - Nombre d'utilisateurs par page 

        - Nombre d'utilisateurs totales 

        - Nombres totales de page (Nombre d'utilisateurs totales et Nombre d'utilisateurs par page)
         (fonction PHP pour arrondir)

        - Page actuelle / courante

        - Index de départ dans le tableau 

        - Utilisateurs à afficher sur la page courante (fonction PHP pour découper le tableau)
      
      */

      # Nombre d'utilisateurs par page
      $userPerPage = 5;

      # Nombre d'utilisateurs totales 
      $totalUsers = count($users);

      # Nombres totales de page (Nombre d'utilisateurs totales et Nombre d'utilisateurs par page)
      # (fonction PHP pour arrondir)
      $totalPages = ceil($totalUsers / $userPerPage);

      # Page actuelle / courante
      $currentUsersPage = (isset($_GET['page']) && !empty($_GET['page'])) ? $_GET['page'] : 1;

      # equivalent a la ternaire du dessus ( deja tres bien si vous avez fait ça )
      // if(isset($_GET['page'])){
      //   $currentUsersPage = $_GET['page'];
      // }else{
      //   $currentUsersPage = 1;
      // }

      # Index de départ dans le tableau 
      $startIndex = ($currentUsersPage - 1) * $userPerPage;
      /*
       Exemple : 
       si on est sur la page 1 alors $currentUsersPage = 1  
        $startIndex = (1 - 1) * 5; donc $startIndex = 0

       si on est sur la page 2 alors $currentUsersPage = 2  
        $startIndex = (2 - 1) * 5; donc $startIndex = 5

       si on est sur la page 3 alors $currentUsersPage = 3  
        $startIndex = (3 - 1) * 5; donc $startIndex = 10

      */

      # Utilisateurs à afficher sur la page courante (fonction PHP pour découper le tableau)
      $usersOnPage = array_slice($users, $startIndex, $userPerPage);

      /*
       Exemple : 
       si on est sur la page 1 alors $startIndex = 0  
        $usersOnPage = array_slice($users, 0 , 5); donc vous donne les utilisateurs compris entre
        les indexs du tableau $users 0 et 4

       si on est sur la page 2 alors $startIndex = 5  
        $usersOnPage = array_slice($users, 5 , 5); donc vous donne les utilisateurs compris entre
        les indexs du tableau $users 5 et 9

       si on est sur la page 3 alors $startIndex = 10  
        $usersOnPage = array_slice($users, 10 , 5); donc vous donne les utilisateurs compris entre
        les indexs du tableau $users 10 et 14

      */



      # recherche utilisateur dans le tableau
      
      $userSearch = isset($_GET['userSearch']) ? $_GET['userSearch'] : '';

      foreach($users as $user){

        if(strtolower($user['name']) == strtolower($userSearch) || $user['id'] == $userSearch || strtolower($user['job']) == strtolower($userSearch)  ){
            $usersDisplay[] = $user;  
        }
      }

      $showUsers = isset($_GET['userSearch']) ? $usersDisplay : $usersOnPage;



?>

<h1 class="display-1 text-center my-5">Liste des Utilisateurs</h1>

<div class="container w-50">
  
  <form class="d-flex my-4 justify-content-end" role="search" method="get" >
    <input class="form-control me-2 w-25" type="search" placeholder="Rechercher un utilisateur" aria-label="Search" name="userSearch">
    <button class="btn btn-primary col-2" type="submit">Rechercher</button>
  </form>

  <div class="card p-4 border-0 shadow-sm">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Job</th>
        <th scope="col">Hobby</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

        <?php foreach($showUsers as $user) : ?>
          <tr>
            <th scope="row"><?= $user['id']?></th>
            <td><?= $user['name']?></td>
            <td><?= $user['job']?></td>
            <td><?= $user['hobby']?></td>
            <td>
              <a href="user.php?id=<?= $user['id'] ?>" class="me-3"><i class="bi bi-eye-fill"></i></a>
              <a href="userUpdate.php?edit=<?= $user['id'] ?>" class="me-3"><i class="bi bi-pencil-square"></i></i></a>
              <a href="userDelete.php?delete=<?= $user['id'] ?>"><i class="bi bi-trash-fill text-danger"></i></a>
            </td>
          </tr>
        <?php endforeach; ?>

      <?php 
        // foreach($users as $user) { 
        //   echo '<tr>
        //     <th >'.$user['id'].'</th>
        //     <td> '.$user['name'].'</td>
        //     <td> '.$user['job'].'</td>
        //     <td> '.$user['hobby'].'</td>
        //   </tr>';
        // } 
      ?>

    </tbody>
  </table>
  </div>
  
  <p class="mt-2 ms-4"> <?= $startIndex+1 ?> - <?= $startIndex + $userPerPage ?> des <?= $totalUsers ?> utilisateurs </p>
  
  <nav aria-label="..." class="my-4">
    <ul class="pagination pagination-sm d-flex justify-content-center">

    
      <li class="page-item shadow-sm <?= $currentUsersPage == 1 ? 'disabled' : '' ?>">
        <a class="page-link" href="?page=<?= $currentUsersPage - 1 ?>">Précédent</a>
      </li>


      <?php for($i = 1; $i <= $totalPages; $i++) : ?>

      <li class="page-item shadow-sm <?= $i == $currentUsersPage ? 'active' : '' ?>">

        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>

      </li>

      <?php endfor; ?>

      <li class="page-item shadow-sm <?= $currentUsersPage == $totalPages ? 'disabled' : '' ?>">
        <a class="page-link" href="?page=<?= $currentUsersPage + 1 ?>">Suivant</a>
      </li>

    </ul>
  </nav>
  
  <hr>
  <h2>DEBUG</h2>
  <pre>
      <?php var_dump($_GET);?>
  </pre>
  

</div>

<?php require 'inc/foot.php'; ?>



