<?php
session_start();
$title = 'Modification utilisateur';
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

    if(($req = $pdo->prepare("SELECT use_id, use_login, use_mdp, rol_libelle FROM user JOIN role ON use_role = rol_id WHERE use_id = :id")) !== false){
        if($req->bindValue('id', $_GET['use_id'])){    
            if($req->execute()){
                $res = $req->fetch(PDO::FETCH_ASSOC);
            }else{
                echo 'Un problème est survenu dans l\'exécution de la requête!';
            }
        }
        $req->closeCursor(); 
    }else {
        echo 'Un problème est survenu dans la préparation de la requête!';
    }
}catch(PDOException $e){
    die($e->getMessage());
}
?>


<form action="" method="POST">
    <input type="hidden" value="<?= $res['use_id'];?>">
    <input type="text" name="use_login" placeholder="<?= $res['use_login'];?>" value="<?= $res['use_login'];?>">
    <input type="password" name="use_mdp" placeholder="<?= $res['use_mdp'];?>" value="<?= $res['use_mdp'];?>">
    <select name="use_role">
        <option>--Sélectionnez le statut--</option>
        <option value="1">Super administrateur</option>
        <option value="2">Administrateur</option>
        <option value="3">Invité</option>
        <option value="4">Editeur</option>
    </select>
    <input type="submit" value="Modifier utilisateur">
</form>

<pre>
    <?php var_dump($_POST); ?>
</pre>
<?php


if(isset($_POST) && !empty($_POST)){
    echo "toto";
    try{
        $dsn = DB_ENGINE.':host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHARSET;
        $pdo = new PDO($dsn, DB_USER, DB_PWD, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
    
        if(($req = $pdo->prepare("UPDATE user SET use_login = :use_login  WHERE use_id = :use_id")) !== false){
            
            if($req->execute($res)){
                echo "l'utilisateur à été modifié avec succès";
            }else{
                echo 'Un problème est survenu dans l\'exécution de la requête!';
            }
        }else {
            echo 'Un problème est survenu dans la préparation de la requête!';
        }
    }catch(PDOException $e){
        echo 'Connexion échouée : ' . $e->getMessage();
    }
}


require 'inc/foot.php';
?>