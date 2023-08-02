<?php
$title = 'Liste utilisateurs';
$page = 'usersList';
require '../inc/head.php';
?>
<h1><?= $title ?></h1>
<p style="font-weight: bold; color: red;"><?=  $_SESSION['espaceAdmin']['connected']; ?></p>
<?php
require '../inc/navbar.php';

try{       
    $dsn = 'mysql:host=127.0.0.1;dbname=administration;charset=utf8';
    $dbuser = 'root';
    $dbpwd = '';
    $pdo = new PDO($dsn, $dbuser, $dbpwd, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
    if(($req = $pdo->prepare("SELECT use_id, use_login, rol_libelle FROM user JOIN role ON use_role = rol_id")) !== false){
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
            <td><a href="editUser.php?id=<?=$user['use_id']?>">modifier</a></td>
            <td><a href="deleteUser.php?id=<?=$user['use_id']?>">supprimer</a></td>
        </tr>
    <?php    
    endforeach;
    ?>
</table>


<pre>
    <?php 
    // print_r($res);
    ?>
</pre>
            

<?php 
require '../inc/foot.php';
?>
