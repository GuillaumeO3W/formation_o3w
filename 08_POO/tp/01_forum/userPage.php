<?php

require 'inc/head.php';
require 'config/ini.php';
require 'lib/functions.php';
require 'lib/_helpers/tools.php';

!empty($_GET['id']) ? $id=$_GET['id'] : $id=1;
try
{
    $userModel = new UserModel;
    $user = $userModel->readOne($id); 
}
catch(PDOException $e)
{ 
    die($e->getUser());
}

?>
<a href="userList.php" class="button is-dark ">Retour</a>
<div class="card is-shadowless">
            <div class="card-content">
            
                <table class="table is-hoverable is-fullwidth">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Login</th>
                            <th>Nom</th>
                            <th>date de naissance</th>
                            <th>date d'inscription</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                <?php   
                        foreach($user as $data):
                 ?>
                      
                            <td><?= $data ?></td>
                        
                <?php   endforeach; ?> 
                </tr>
                    </tbody>
                </table>
            </div>
        </div>