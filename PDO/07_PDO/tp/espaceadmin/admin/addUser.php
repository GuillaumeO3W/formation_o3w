<?php
$title = 'Ajout utilisateur';
$page = 'addUser';
require '../inc/head.php';
?>
<h1><?= $title ?></h1>
<?php
require '../inc/navbar.php';
?>
<form action="" method="POST">
    <input type="text" name="use_login" placeholder="login">
    <input type="password" name="use_mdp" placeholder="password">
    <input type="text" name="use_role" placeholder="role">
    <input type="submit" value="Ajouter utilisateur">
</form>

<?php
if(isset($_POST['use_login']) && isset($_POST['use_mdp']) && isset($_POST['use_role'])){
    if(!empty($_POST['use_login']) && !empty($_POST['use_mdp']) && !empty($_POST['use_role'])){
        extract($_POST);
        try{
            $dsn = 'mysql:host=127.0.0.1;dbname=administration;charset=utf8';
            $dbuser = 'root';
            $dbpwd = '';
            $pdo = new PDO($dsn, $dbuser, $dbpwd, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
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



?>




<?php
require '../inc/foot.php';
?>