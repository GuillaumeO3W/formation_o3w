<?php
session_start();

if(isset($_POST['use_login']) && isset($_POST['use_mdp'])){
    if(!empty($_POST['use_login']) && !empty($_POST['use_mdp'])){
        extract($_POST);
        try{
            
            $dsn = 'mysql:host=127.0.0.1;dbname=administration;charset=utf8';
            $dbuser = 'root';
            $dbpwd = '';
            $pdo = new PDO($dsn, $dbuser, $dbpwd, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
            
            if(($req = $pdo->prepare("SELECT use_login FROM user WHERE use_login = :login AND use_mdp = :pwd")) !== false){
                
                if($req->bindValue('login', $use_login) AND $req->bindValue('pwd', $use_mdp)){
                    if($req->execute()){
                        $res = $req->fetch(PDO::FETCH_ASSOC);
                        if(!empty($res['use_login'])){  
                            $_SESSION['espaceAdmin']['connected'] = $res['use_login'];
                            unset ($_SESSION['espaceAdmin']['error']);
                            header ('location: dashboard.php');
                            exit;
                        }else{
                            $_SESSION['espaceAdmin']['error'] = "erreur de connexion, login ou password erroné";
                            header('Location: ../login.php');
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
    }else{
        $_SESSION['espaceAdmin']['error'] = "erreur de connexion, veuillez remplir tout les champs";
        header('Location: ../login.php');
        exit;
    }
}

?>