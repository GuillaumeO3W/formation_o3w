<?php 
    session_start();
    require 'config/ini.php';
    // require 'lib/utils/functions.php';



    # VERIF | Si pas de $_POST on redirige vers login.php (au cas ou un petit malin taperait directement l'url pour essayer d'acceder a la partie admin)
    // isNotConnected();

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


    # On définir le DSN (DATA SOURCE NAME)
    // $dsn = 'mysql:host=localhost;dbname=adminisatration;chartset=utf8mb4';
    $dsn = DB_ENGINE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;

    try{

        # Connexion a la BDD
        $pdo = new PDO($dsn, DB_USER, DB_PWD, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);

        # REQUETE PREPARE | Vérifie que l'association login + mot de passe est bonne et se rouve bien dans la BDD et on récupère toutes les infos de l'utilisateur
        if(($request = $pdo->prepare('SELECT * FROM user WHERE use_login=:form_login AND use_mdp=:form_mdp')) !== false){

            # ASSOCIATION MARQUEUR => VALEUR | on associe les marqueurs présent dans la requete SQL(:form_login, :form_mdp) aux valeurs saisies dans le formulaire
            if($request->bindValue('form_login', $_POST['login']) AND $request->bindValue('form_mdp', $_POST['pwd'])){

                # on execute la requete
                if($request->execute()){

                    # On stocke le jeu de résultats au format tableau associatif
                    if(($result = $request->fetch(PDO::FETCH_ASSOC)) !== false){

                        # on stocke en session les infos recuperees
                        $_SESSION[APP_TAG]['connected'] = $result;

                        # On termine le traitement de la requete
                        $request->closeCursor();
                    }else {
                        # Si pas de correspondance, on termine le traitement de la requet et on redirige vers login.php
                        $request->closeCursor();
                        header('Location: ../login.php?_err=connect');
                        exit;
                    }
                }else{
                    echo 'Un problème est survenu dans l\'exécution de la requête!';
                }
            }else{
                echo 'Un problème est survenu dans la préparation des valeurs!';
            }
            $request->closeCursor(); // Termine le traitement de la requete
        }else {
            echo 'Un problème est survenu dans la préparation de la requête!';
        }
    # Dans le cas d'un échec, on récupère l'exception(erreur)
    }catch(PDOException $e){
        # On tue le processus(arrete la lecture du fichier) et affiche le message d'erreur
        die($e->getMessage());
    }

    # Si tout se passe bien on redirige vers dashboard.php
    header('Location: dashboard.php');