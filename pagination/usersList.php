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
    [
      'id' => 4,
      'name' => 'Arturo',
      'job' => 'Designer(bientot Dev)',
      'hobby' => 'Bootstrap'
    ],
    [
      'id'=> 5,
      'name' => 'Guillaume',
      'job' => 'Ninja',
      'hobby' => 'PHP'
    ],
    [
      'id'=> 6,
      'name' => 'Thibaut',
      'job' => 'Pythoniste',
      'hobby' => 'Mets Adrien en prison'
    ],
    [
      'id'=> 7,
      'name' => 'Fabrice',
      'job' => 'éparpilleur',
      'hobby' => 'Se perdre'
    ],
    [
      'id' => 8,
      'name' => 'Boubacar',
      'job' => 'Documentaliste',
      'hobby' => 'La DOC'
    ],
    [
      'id'=> 9,
      'name' => 'Virginie',
      'job' => 'Epicier',
      'hobby' => 'Cherche son ordi'
    ],
    [
      'id'=> 10,
      'name' => 'Anne',
      'job' => 'Dealer de bonbon',
      'hobby' => 'Les arlequins et les bétises'
    ],
    [
      'id'=> 11,
      'name' => 'Benjamin',
      'job' => 'Casper',
      'hobby' => 'Absent, j\'ai mécanique'
    ],
    [
      'id'=> 12,
      'name' => 'Mickael',
      'job' => 'Le chineur',
      'hobby' => 'Les bons tuyaux'
    ],
    [
      'id'=> 13,
      'name' => 'Ryan',
      'job' => 'Le jeunot',
      'hobby' => 'Découvre la vie'
    ],
    [
      'id' => 14,
      'name' => 'Désirée',
      'job' => 'Reine des ternaires',
      'hobby' => 'Les ternaires c\'est la vie'
    ],
    [
      'id'=> 15,
      'name' => 'Dhéya',
      'job' => 'Nimois',
      'hobby' => 'J\'adore les pauses'
    ],
   
  ];


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

?>

<h1 class="display-1 text-center my-5">Liste des Utilisateurs</h1>

<?php 
if (isset($_GET['usersByPage'])){
  $usersByPage = $_GET['usersByPage'];
}else{
  $usersByPage=5;
}

$totUsers = count($users);
$totPages = ceil($totUsers / $usersByPage);
$currentPage = null;

if (isset($_GET['page']) && !empty($_GET['page'])){
  $currentPage = $_GET['page'];
}else{
  $currentPage = 1;
}

$index = ($currentPage-1)*$usersByPage;
$firstUser = array_slice($users,$index,$usersByPage);

?>

<div class="container">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Job</th>
        <th scope="col">Hobby</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      foreach ($firstUser as $value):?>
      <tr>
        <th scope="row"><?=$value['id']?></th>
        <td><?=$value['name']?></td>
        <td><?=$value['job']?></td>
        <td><?=$value['hobby']?></td>
      </tr>
      <?php endforeach ;  
      ?>
    </tbody>
  </table>

  <nav aria-label="..." class="container">
    <ul class="pagination justify-content-center">
      <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
        <a class="page-link" href="usersList.php?page=<?=($currentPage-1)?> ">Previous</a>
      </li>
      <?php for ($i=1;$i<=$totPages;$i++):?>
      <li class="page-item">
        <a class="page-link <?= ($i == $currentPage) ? "active" : "" ?> "  href="usersList.php?page=<?=$i?>"><?=$i?></a>
      </li>
      <?php endfor; ?>
      <li class="page-item <?= ($currentPage == $totPages) ? "disabled" : "" ?>">
        <a class="page-link" href="usersList.php?page=<?=($currentPage+1)?>">Next</a>
      </li>
    </ul>
  </nav>
  <form method="GET">
    <label for="number">Nombre d'utilisateurs par page :</label>
    <input type="number" id="number" name="usersByPage">
    <input type="submit">
  </form>

  <!-- <p><?= "Nombre d'utilisateurs par page : $usersByPage" ?></p>
  <p><?= "Nombre total d'utilisateurs : $totUsers"?></p>
  <p><?= "Nombre de pages : $totPages"?></p>
  <p><?= "Page Actuelle : $currentPage"?></p>
  <p><?= "Index : $index"?></p> -->

</div>


<?php require 'inc/foot.php'; ?>



