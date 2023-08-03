<?php
session_start();
$title = 'Liste utilisateurs';
$page = 'usersList';
require 'config/ini.php';
require 'lib/utils/functions.php';
require 'inc/head.php';
require 'inc/navbar.php';
?>
<h1><?= $title ?></h1>
<?php

try{       

    $dsn = DB_ENGINE.':host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHARSET;
    $pdo = new PDO($dsn, DB_USER, DB_PWD, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);

    if(($req = $pdo->query("SELECT use_id, use_login, rol_libelle FROM user JOIN role ON use_role = rol_id")) !== false){
            if($req->execute()){
                $res = $req->fetchALL(PDO::FETCH_ASSOC);
            }else{
                echo 'Un problème est survenu dans l\'exécution de la requête!';
            }
        $req->closeCursor(); 
    }else {
        echo 'Un problème est survenu dans la préparation de la requête!';
    }
}catch(PDOException $e){
    die($e->getMessage());
}
?>

<table>
    <tr>
        <th>Login</th>
        <th>Statut</th>
    </tr>
    <?php
    foreach($res as $user):
    ?>
        <tr>
            <td><?= $user['use_login'] ?></td>
            <td><?= $user['rol_libelle'] ?></td>
            <td><a href="editUser.php?use_id=<?=$user['use_id']?>">modifier</a></td>
            <td><a href="deleteUser.php?use_id=<?=$user['use_id']?>">supprimer</a></td>
        </tr>
    <?php    

    endforeach;
    ?>
</table>

<?php 
require 'inc/foot.php';
?>