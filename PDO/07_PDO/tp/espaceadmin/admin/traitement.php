<?php
session_start();

        if(!empty($_POST)){
            extract($_POST);
            try{
                
                $dsn = 'mysql:host=127.0.0.1;dbname=administration;charset=utf8';
                $dbuser = 'root';
                $dbpwd = '';
                $pdo = new PDO($dsn, $dbuser, $dbpwd, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
                
                if(($req = $pdo->prepare("SELECT use_login FROM user WHERE use_login=:login AND use_mdp=:pwd")) !== false){
                    
                    if($req->bindValue('login', $use_login) AND $req->bindValue('pwd', $use_mdp)){
                        if($req->execute()){
                            $res = $req->fetch(PDO::FETCH_ASSOC);
                            $_SESSION['espaceadmin']['login']=$res['use_login'];
                            header ('location: dashboard.php');
                            exit;
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
        }
    ?>