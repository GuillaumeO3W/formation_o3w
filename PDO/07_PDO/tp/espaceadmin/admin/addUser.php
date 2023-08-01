<?php
$title = 'Ajout utilisateur';
$page = 'addUser';
require '../inc/head.php';
?>
<h1><?= $title ?></h1>
<p style="font-weight: bold; color: red;"><?=  $_SESSION['espaceAdmin']['connected']; ?></p>
<?php
require '../inc/navbar.php';
?>


<?php
$dsn = 'mysql:host=127.0.0.1;dbname=administration;charset=utf8';
$dbuser = 'root';
$dbpwd = '';

try{
        
        $pdo = new PDO($dsn, $dbuser, $dbpwd, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
        $newUser = [
            'use_login' => 'toto',
            'use_mdp' => 'toto@pwd',
            'use_role' => '4',
        ];


        $req = $pdo->prepare("INSERT INTO user (use_id, use_login, use_mdp, use_role) 
        VALUES(DEFAULT, :use_login, :use_mdp, :use_role)");

        $req->execute($newUser);


    }catch(PDOException $e){
        echo 'Connexion échouée : ' . $e->getMessage();
    }




?>




<?php
require '../inc/foot.php';
?>