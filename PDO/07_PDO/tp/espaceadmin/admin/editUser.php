<?php
$title = 'Modification utilisateur';
require '../inc/head.php';
require '../inc/navbar.php';
?>
<h1><?= $title ?></h1>

<?php
$id =  ($_GET['use_id']);

try{
    $dsn = 'mysql:host=127.0.0.1;dbname=administration;charset=utf8';
    $dbuser = 'root';
    $dbpwd = '';
    $pdo = new PDO($dsn, $dbuser, $dbpwd, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);

    if(($req = $pdo->prepare("UPDATE FROM user WHERE use_id = :use_id")) !== false){
        
        // if($req->execute($_GET)){
        //     echo "l'utilisateur $id à été modifié avec succès";
        // }else{
        //     echo 'Un problème est survenu dans l\'exécution de la requête!';
        // }
    }else {
        echo 'Un problème est survenu dans la préparation de la requête!';
    }
}catch(PDOException $e){
    echo 'Connexion échouée : ' . $e->getMessage();
}

require '../inc/foot.php';
?>