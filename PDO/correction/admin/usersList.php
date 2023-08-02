<?php 
    session_start();
    $title = 'Users List';
    $currentPage = 'usersList';
    require '../inc/head.php';
    require '../inc/navbar.php';

?>

<h1 class="display-1 text-center my-5">Liste des Utilisateurs</h1>

<div class="container w-50">
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
        </tbody>
    </table>
  </div>
<?php 

    require '../inc/foot.php';
?>
