<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO</title>
</head>
<body>
    
    <?php
        if(!empty($_POST)){
            extract($_POST);
            try{
                // Connexion a la BDD
                $dsn = 'mysql:host=127.0.0.1;dbname=popo;charset=utf8';
                $dbuser = 'root';
                $dbpwd = '';
                $pdo = new PDO($dsn, $dbuser, $dbpwd, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);

                // Requete que l'on veut soumettre a la BDD 

                // query s'execute directement mais est sensible au injection SQL
                // $req = $pdo->query('SELECT * FROM user');
                // prepare s'execute directement mais protege des injections SQL
                // $req = $pdo->prepare("SELECT u_login FROM user WHERE u_nom=:nom AND u_prenom=:prenom");
                if(($req = $pdo->prepare("SELECT u_nom, u_prenom FROM user WHERE u_login=:email")) !== false){


                    // associe les marqueurs aux valeurs des variables
                    // $req->bindValue('nom', $nom);
                    // $req->bindValue('prenom', $prenom);
                    if($req->bindValue('email', $email)){
                        // on execute la requete
                        if($req->execute()){
                            // on recupere les resultats sous le format d'un tableau a 2 dimension  
                            // $res = $req->fetchAll(PDO::FETCH_ASSOC);

                            $res = $req->fetch(PDO::FETCH_ASSOC);

                            // foreach($res as $value){
                            //     echo '<hr>' .$value['u_login'];
                            // }

                            echo 'Bonjour ' . $res['u_nom'] . ' ' . $res['u_prenom'];
                        }else{
                            echo 'Un problème est survenu dans l\'exécution de la requêt!';
                        }
                        
                    }else{
                        echo 'Un problème est survenu dans la préparation des valeurs!';
                    }
                    $req->closeCursor(); // Termine le traitement de la requete
                }else {
                    echo 'Un problème est survenu dans la préparation de la requête!';
                }
            }catch(PDOException $e){
                die($e->getMessage());
            }
        }

    ?>

    <form action="" method="POST">
        <!-- <input type="text" name="nom" placeholder="Nom">
        <input type="text" name="prenom" placeholder="Prenom"> -->
        <input type="text" name="email" placeholder="email">
        <input type="submit" value="Chercher">
    </form>

</body>
</html>