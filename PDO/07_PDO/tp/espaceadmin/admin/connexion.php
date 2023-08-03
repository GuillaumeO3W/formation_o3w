<?php
session_start();
require 'config/ini.php';

# VERIF | Verifie si les champs sont vides et lesquels pour afficher le bon message 
if(empty($_POST['login']) || empty($_POST['pwd'])){
    $fields = 'all';
    if(!empty($_POST['login'])){
        $fields = 'pwd';
    }
    if(!empty($_POST['pwd'])){
        $fields = 'login';
    }
    header('Location: ../login.php?_err=empty&field='. $fields);
    exit;
}
extract($_POST);

        // $dsn = 'mysql:host=127.0.0.1;dbname=administration;charset=utf8';
        // $dbuser = 'root';
        // $dbpwd = '';
        $dsn = DB_ENGINE.':host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHARSET;
        
        try{
            
            $pdo = new PDO($dsn, DB_USER, DB_PWD, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
            
            if(($req = $pdo->prepare('SELECT * FROM user WHERE use_login = :login AND use_mdp = :pwd')) !== false){
                
                if($req->bindValue('login', $login) AND $req->bindValue('pwd', $pwd)){
                    if($req->execute()){
                        
                        if(($res = $req->fetch(PDO::FETCH_ASSOC)) != false){
                            $_SESSION[APP_TAG]['connected'] = $res;
                            $req->closeCursor();

                        }else{
                            $req->closeCursor(); 
                            header('Location: ../login.php?_err=connect');
                            exit;
                        }
                        
                    }else{
                        echo 'Un problème est survenu dans l\'exécution de la requête!';
                    }
                    
                }else{
                    echo 'Un problème est survenu dans la préparation des valeurs!';
                }
                $req->closeCursor(); 
            }else {
                echo 'Un problème est survenu dans la préparation de la requête!';
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
    

header ('location: dashboard.php');
?>