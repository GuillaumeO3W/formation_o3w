<?php 

    require 'inc/head.php';
    require 'config/ini.php';
    require 'lib/functions.php';
    require 'lib/_helpers/tools.php';

    try 
    {
        $userModel = new UserModel;
        $userData = $userModel->readOne($_GET['id']);
    } catch(Exception $e)
    {
      die($e->getMessage());
    }

?>
<a href="usersList.php" class="button is-dark ">Retour</a>
        <div class="section">
          <h1 class="title">Liste des utilisateurs</h1>
          <div class="card is-shadowless">
            <div class="card-content">
              <?php if(!empty($userData)) :?>
              <table class="table is-hoverable is-fullwidth">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Login</th>
                    <th>Rang</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>date naissance</th>
                    <th>date inscription</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                        $user = new User($userData);
                  ?>
            
                  <tr>
                    <th><?= $user->getId() ?></th>
                    <td><?= $user->getLogin() ?></td>
                    <td><?= $user->getRang() ?></td>
                    <td><?= $user->getPrenom() ?></td>
                    <td><?= $user->getNom() ?></td>
                    <td><?= $user->getDateNaissance() ?></td>
                    <td><?= $user->getDateInscription() ?></td>

                  </tr>   
                </tbody>
              </table>
              <?php
                else: 
              ?>
                  <p>Aucun utilisateur</p>
              <?php
                endif
              ?>
              

            </div>
          </div>
        </div>
        <script src="main.js"></script>

<?php 
        require 'inc/foot.php'; 
?>