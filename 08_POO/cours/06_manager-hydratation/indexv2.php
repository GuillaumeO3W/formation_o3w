<?php 

require 'inc/head.php';
require 'lib/_helpers/tools.php';
// require 'class/UserModel.php';
// require 'class/User.php';
require 'lib/functions.php';


    try{

        $userModel = new UserModel;
        
        if(!empty($_GET['id'])){
            if(ctype_digit($_GET['id'])){

                $user = $userModel->readOne($_GET['id']); 
                
                
        ?>


        <h1 class="display-1 text-center my-5">Profil utilisateur : <?= $user->getLogin() ?></h1>

        <div class="container w-50">
        <a class="btn btn-primary mb-3" href="addUser.php" role="button">Ajouter un utilisateur</a>
        <div class="card p-4 border-0 shadow-sm">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Login</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><?= $user->getId() ?></th>
                        <td><?= $user->getLogin() ?></td>
                        <td><?= $user->getLibelle() ?></td>
                        <td>
                        <a href="?id=<?= $user->getId() ?>" class="me-3"><i class="bi bi-eye-fill"></i></a>
                    
                        <a href="userEdit.php?id=<?= $user->getId() ?>" class="me-3"><i class="bi bi-pencil-square"></i></i></a>
                    
                        <a href="deleteUser.php?id=<?= $user->getId() ?>"><i class="bi bi-trash-fill text-danger"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
            
<?php
        }
    } else {
        $users = $userModel->readAll();
    

?>


<h1 class="display-1 text-center my-5">Liste des Utilisateurs</h1>

<div class="container w-50">
<a class="btn btn-primary mb-3" href="addUser.php" role="button">Ajouter un utilisateur</a>
  <div class="card p-4 border-0 shadow-sm">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Login</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user) : ?>
            <tr>
                <th scope="row"><?= $user->getId() ?></th>
                <td><?= $user->getLogin() ?></td>
                <td><?= $user->getLibelle() ?></td>
                <td>
                <a href="?id=<?= $user->getId() ?>" class="me-3"><i class="bi bi-eye-fill"></i></a>
            
                <a href="userEdit.php?id=<?= $user->getId() ?>" class="me-3"><i class="bi bi-pencil-square"></i></i></a>
            
                <a href="deleteUser.php?id=<?= $user->getId() ?>"><i class="bi bi-trash-fill text-danger"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
  </div>

<?php 
            }

            unset($userModel);
        }catch(PDOException $e){
            die($e->getMessage());
        }


        require 'inc/foot.php'; 

?>