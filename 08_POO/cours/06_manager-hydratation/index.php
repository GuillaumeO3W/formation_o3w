<?php 

require 'inc/head.php';
require 'lib/_helpers/tools.php';
require 'class/UserModel.php';
require 'class/User.php';


    try{

        # on instancie la classe UserModel, donc on créé un objet
        # a l'instanciation la methode __construct() est appelée donc on se connecte a la BDD
        $userModel = new UserModel;
        # On stocke le tableau des objets des utilisateurs après avoir demandé avec readAll() de lancé la requete pour récupérer tous les utilisateurs (fait le traitement trasforme le tableau asscociatif en tableau d'objet User)
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

            unset($userModel);
        }catch(PDOException $e){
            die($e->getMessage());
        }


        require 'inc/foot.php'; 

?>