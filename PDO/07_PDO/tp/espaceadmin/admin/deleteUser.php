<?php
session_start();
$title = 'Suppression utilisateur';
require 'config/ini.php';
require 'lib/utils/functions.php';
require 'inc/head.php';
require 'inc/navbar.php';
?>
<h1><?= $title ?></h1>

<?php
$id =  ($_GET['use_id']);

try{
    $dsn = DB_ENGINE.':host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHARSET;
    $pdo = new PDO($dsn, DB_USER, DB_PWD, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);

    if(($req = $pdo->prepare("DELETE FROM user WHERE use_id = :use_id")) !== false){
        
        if($req->execute($_GET)){
            echo "l'utilisateur $id à été supprimé avec succès";
        }else{
            echo 'Un problème est survenu dans l\'exécution de la requête!';
        }
    }else {
        echo 'Un problème est survenu dans la préparation de la requête!';
    }
}catch(PDOException $e){
    echo 'Connexion échouée : ' . $e->getMessage();
}

require 'inc/foot.php';
?>