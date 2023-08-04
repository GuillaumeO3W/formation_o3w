<?php
session_start();
$title = 'Ajout utilisateur';
$page = 'addUser';
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
if(($req = $pdo->query("SELECT * FROM role")) !== false){
        if($req->execute()){
            $roles = $req->fetchALL(PDO::FETCH_ASSOC);
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

<form action="" method="POST">
    <input type="text" name="use_login" placeholder="login">
    <input type="password" name="use_mdp" placeholder="password">
    <select name="use_role">
        <option>--Sélectionnez le statut--</option>
        <?php
            foreach ($roles as $role):?>
                <option value="<?= $role['rol_id']; ?>"><?= $role['rol_libelle']; ?></option>
        <?php endforeach;
        ?>
    </select>
    <input type="submit" value="Ajouter utilisateur">
</form>

<?php
if(isset($_POST['use_login']) && isset($_POST['use_mdp']) && isset($_POST['use_role'])){
    if(!empty($_POST['use_login']) && !empty($_POST['use_mdp']) && !empty($_POST['use_role'])){
        extract($_POST);
        try{
            $dsn = DB_ENGINE.':host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHARSET;
            $pdo = new PDO($dsn, DB_USER, DB_PWD, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);


            if(($req = $pdo->prepare("INSERT INTO user (use_id, use_login, use_mdp, use_role) 
                                    VALUES(DEFAULT, :use_login, :use_mdp, :use_role)")) !== false){
                
                if($req->execute($_POST)){
                    echo "l'utilisateur $use_login à été ajouté avec succès";
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
    else {
        echo "Merci de renseigner tout les champs";
    } 
}

require 'inc/foot.php';
?>