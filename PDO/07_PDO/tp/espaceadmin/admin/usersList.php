<?php
session_start();
$title = 'Liste utilisateurs';
$page = 'usersList';
require '../inc/head.php';
?>
<h1><?= $title ?></h1>
<p style="font-weight: bold; color: red;"><?=  $_SESSION['espaceAdmin']['login']; ?></p>
<a href="destroy.php?session=destroy" class="btn btn-danger">déconnexion</a>
<?php
require '../inc/navbar.php';

try{       
    $dsn = 'mysql:host=127.0.0.1;dbname=administration;charset=utf8';
    $dbuser = 'root';
    $dbpwd = '';
    $pdo = new PDO($dsn, $dbuser, $dbpwd, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
    if(($req = $pdo->prepare("SELECT use_login, rol_libelle FROM user JOIN role ON use_role = rol_id")) !== false){
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

foreach($res as $user){
    foreach($user as $key => $value){
        echo $value." - ";
    }
    echo "<br>";
}


?>
<pre>
    <?php 
    print_r($res);
    ?>
</pre>
            

<?php 
require '../inc/foot.php';
?>
