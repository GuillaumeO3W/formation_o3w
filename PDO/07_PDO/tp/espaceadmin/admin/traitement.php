<?php
        if(!empty($_POST)){
            extract($_POST);
            try{
                
                $dsn = 'mysql:host=127.0.0.1;dbname=popo;charset=utf8';
                $dbuser = 'root';
                $dbpwd = '';
                $pdo = new PDO($dsn, $dbuser, $dbpwd, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
                
                if(($req = $pdo->prepare("SELECT u_nom, u_prenom FROM user WHERE u_login=:email")) !== false){
                    
                    if($req->bindValue('email', $email)){
                        if($req->execute()){
                            $res = $req->fetch(PDO::FETCH_ASSOC);
                            
                            echo 'Bonjour ' . $res['u_nom'] . ' ' . $res['u_prenom'];
                        }else{
                            echo 'Un problème est survenu dans l\'exécution de la requêt!';
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