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

            /**
             * extract = fonction qui permet de d'extraire les clés d'un tableau associatif et de créer des variables au nom de chaque clé en leur associant leur valeur
             * 
             * exemple cela équivaut à $nom = $_POST['nom'];
             * 
             **/   
            extract($_POST);

            /**
             * Les exceptions sont un autre niveau de retour, comme les notifications, les avertissements et les erreurs
             * Elles ne sont pas bloquantes et laisse la possibilité au développeur de proposer un comportement
             *
             * La structure try {} catch() {} est utilisée pour récupérer les exceptions lancées par le système
             * Nous placerons donc dans le try nos instructions dans un déroulé normal, puis dans le catch une alternative en cas d'exception
             **/
            try{

                /**
                 * On stocke une ressource (objet) PDO dans une variable
                 * La ressource PDO a besoin de paramètres obligatoires :
                 *     - DSN (Data Source Name) : {nom du SGBD}:host={adresse du serveur};dbname={nom de la base de données};[charset={encodage};]
                 *     - Utilisateur autorisé
                 *     - Mot de passe de l'utilisateur
                 * La ressource PDO peut avoir des paramètres optionnels :
                 *     - Tableau de paramètres pour PDO
                **/
                // Connexion a la BDD
                $dsn = 'mysql:host=127.0.0.1;dbname=popo;charset=utf8';
                $dbuser = 'root';
                $dbpwd = '';
                $pdo = new PDO($dsn, $dbuser, $dbpwd, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);

                // Requete que l'on veut soumettre a la BDD 

                /**
                 * Instruction QUERY
                 *
                 * Elle est utilisée pour soumettre une requête au serveur de base de données
                 * Elle est utile dans le cas où l'on ne traite pas une chaîne de requête avec des données soumise par une source externe car elle n'est pas protégée contre une attaque bien connue : les Injections SQL
                **/
            
                // query s'execute directement mais est sensible au injection SQL
                // $req = $pdo->query('SELECT * FROM user');
                

                /**
                 * Les requêtes préparées
                 *
                 * Au même titre que l'instruction QUERY, elles permettent de soumettre une requête au serveur de base de données
                 * En revanche, elles se sont font en plusieurs étapes afin de permettre une protection contre les Injections SQL
                 *
                 * Étape 1 : la préparation de la requête avec l'instruction PREPARE
                 * On prépare la requête en mettant en place des marqueurs sur toutes les valeurs attendues provenant d'une source externe
                 * Les marqueurs peuvent être non nommés avec le symbole ?. Ils seront alors lus dans l'ordre
                 * Les marqueurs peuvent être nommés avec la syntaxe :{nom du marqueur}
                **/
                // prepare s'execute directement mais protege des injections SQL
                // $req = $pdo->prepare("SELECT u_login FROM user WHERE u_nom=:nom AND u_prenom=:prenom");
                if(($req = $pdo->prepare("SELECT u_nom, u_prenom FROM user WHERE u_login=:email")) !== false){


                    /**
                     * Étape 2 : le liage des valeurs aux marqueurs avec l'instruction BINDVALUE
                     **/
                    // associe les marqueurs aux valeurs des variables
                    // $req->bindValue('nom', $nom);
                    // $req->bindValue('prenom', $prenom);
                    if($req->bindValue('email', $email)){

                         /**
                         * 
                         * Étape 3 : l'exécution de la requête sur le serveur de base de données avec l'instruction EXECUTE
                         * 
                         **/
                        // on execute la requete
                        if($req->execute()){


                            // on recupere les resultats sous le format d'un tableau a 2 dimension  
                            /**
                             * Une fois la requête exécutée, nous pouvons récupérer le jeu de résultat
                             *
                             * L'instruction FETCHALL permet de récupérer l'ensemble des lignes du jeu de résultat dans un tableau à 2 dimensions
                             * Par défault, le paramètre de FETCH est PDO::FETCH_BOTH qui récupère chaque ligne avec les clés numérotées ET associative dans le même tableau
                             * Le paramètre PDO::FETCH_ASSOC permet de ne récupérer que les clés associatives
                             **/
                            // $res = $req->fetchAll(PDO::FETCH_ASSOC);


                            /**
                             * Une fois la requête exécutée, nous pouvons récupérer le jeu de résultat
                             *
                             * L'instruction FETCH permet de récupérer une ligne du jeu de résultat puis déplace le curseur vers la ligne suivante
                             * Par défault, le paramètre de FETCH est PDO::FETCH_BOTH qui récupère la ligne avec les clés numérotées ET associative dans le même tableau
                             * Le paramètre PDO::FETCH_ASSOC permet de ne récupérer que les clés associatives
                             **/
                            $res = $req->fetch(PDO::FETCH_ASSOC);

                            /**
                             * L'instruction FETCH peut donc être utilisée dans une boucle pour récupérer tous les résultats les uns après les autres
                             **/
                            // while( ( $rep = $req->fetch( PDO::FETCH_ASSOC ) )!==false ) {
                            //     echo '<br>';
                            //     // var_dump($rep);
                            //     echo '<hr>' . $rep['u_login'];
                            // }

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