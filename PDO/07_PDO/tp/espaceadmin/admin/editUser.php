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
?>
<pre>
    <?php 
        // var_dump($res); 
    ?>
</pre>

<form action="" method="POST">
    <input type="hidden" name="use_id" value="<?= $res['use_id'];?>">
    <input type="text" name="use_login" placeholder="<?= $res['use_login'];?>" value="<?= $res['use_login'];?>">
    <select name="use_role">
        <option>--Sélectionnez le statut--</option>
        <option value="1" <?= $res['use_role']=1 ? "selected": "" ?>>Super administrateur</option>
        <option value="2" <?= $res['use_role']=2 ? "selected": "" ?>>Administrateur</option>
        <option value="3" <?= $res['use_role']=3 ? "selected": "" ?>>Invité</option>
        <option value="4" <?= $res['use_role']=4 ? "selected": "" ?>>Editeur</option>
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
                    echo "l'utilisateur à été modifié avec succès";
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