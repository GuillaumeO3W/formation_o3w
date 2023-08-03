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
    if(($req = $pdo->prepare("SELECT * FROM user WHERE use_id = :id")) !== false){
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

if(isset($_POST) and !empty($_POST)){
    $id=$_POST['use_id'];
    $login=$_POST['use_login'];
    $role=$_POST['use_role'];
}
else{
    $id=$res['use_id'];
    $login=$res['use_login'];
    $role=$res['use_role'];
}
?>
<pre>
    <?php 
        // var_dump($res); 
    ?>
</pre>

<form action="" method="POST">
    <input type="hidden" name="use_id" value="<?= $id;?>">
    <input type="text" name="use_login" placeholder="<?= $login;?>" value="<?= $login;?>">
    <select name="use_role">
        <option>--Sélectionnez le statut--</option>
        <option value="1" <?= $role==1 ? "selected": "" ?>>Super administrateur</option>
        <option value="2" <?= $role==2 ? "selected": "" ?>>Administrateur</option>
        <option value="3" <?= $role==3 ? "selected": "" ?>>Invité</option>
        <option value="4" <?= $role==4 ? "selected": "" ?>>Editeur</option>
    </select>
    <input type="submit" value="Modifier utilisateur">
</form>

<pre>
    <?php 
    // var_dump($_POST);
    ?>
</pre>

<?php
if(isset($_POST) && !empty($_POST)){
    try{
        $dsn = DB_ENGINE.':host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHARSET;
        $pdo = new PDO($dsn, DB_USER, DB_PWD, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
        if(($req = $pdo->prepare("UPDATE user SET use_login = :login, use_role = :role  WHERE use_id = :id")) !== false){
            if($req->bindValue('login', $_POST['use_login']) AND $req->bindValue('role', $_POST['use_role']) AND $req->bindValue('id', $_POST['use_id'])){      
                
                if($req->execute()){
                    echo "l'utilisateur ". $res['use_login'] ." à été modifié avec succès";
                }else{
                    echo 'Un problème est survenu dans l\'exécution de la requête!';
                }
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