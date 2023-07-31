<?php

    // Data Source Name
    // $dsn = 'mysql:host=127.0.0.1;dbname=entreprise;charset=utf8';
    $dsn = 'mysql:host=localhost;dbname=entreprise;charset=utf8';
    $username = 'root';
    // $password = 'root'; // pour mac en local
    $password = '';

    // try{
        
    //     $pdo = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);

    //     // $statement, $stmt, $request, $req
    //     $request = $pdo->prepare(" INSERT INTO employe 
    //     VALUES(DEFAULT, 3, 'Charrier', 'Guillaume', 'H', 5000, '2023-07-31')");

    //     $request->execute();


    // }catch(PDOException $e){
    //     echo 'Connexion échouée : ' . $e->getMessage();
    // }


    // try{
        
    //     $pdo = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);

    //     $employe = [
    //         'idService' => 2,
    //         'nom' => 'Mantio',
    //         'prenom' => 'Benjamin',
    //         'sexe' => 'H',
    //         'salaire' => 800,
    //         'dateContrat' => '2023-07-31'
    //     ];

    //     // $statement, $stmt, $request, $req
    //     $request = $pdo->prepare("INSERT INTO employe (idService, nom, prenom, sexe, salaire, dateContrat) 
    //     VALUES( ?, ?, ?, ?, ?, ?)");

    //     $request->bindValue(1, $employe['idService'], PDO::PARAM_INT);
    //     $request->bindValue(2, $employe['nom'],PDO::PARAM_STR);
    //     $request->bindValue(3, $employe['prenom']);
    //     $request->bindValue(4, $employe['sexe']);
    //     $request->bindValue(5, $employe['salaire']);
    //     $request->bindValue(6, $employe['dateContrat']);
    //     // $request->bindParam(6, $employe['dateContrat']);


    //     $request->execute();


    // }catch(PDOException $e){
    //     echo 'Connexion échouée : ' . $e->getMessage();
    // }

    // try{
        
    //     $pdo = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);

    //     $employe = [
    //         'idService' => 2,
    //         'nom' => 'Mantio',
    //         'prenom' => 'Benjamin',
    //         'sexe' => 'H',
    //         'salaire' => 800,
    //         'dateContrat' => '2023-07-31'
    //     ];

    //     // $statement, $stmt, $request, $req
    //     $request = $pdo->prepare("INSERT INTO employe (idService, nom, prenom, sexe, salaire, dateContrat) 
    //     VALUES( :idService, :nom, :prenom, :sexe, :salaire, :dateContrat)");

    //     $request->bindValue(':idService', $employe['idService'], PDO::PARAM_INT);
    //     $request->bindValue(':nom', $employe['nom'],PDO::PARAM_STR);
    //     $request->bindValue(':prenom', $employe['prenom']);
    //     $request->bindValue(':sexe', $employe['sexe']);
    //     $request->bindValue(':salaire', $employe['salaire']);
    //     $request->bindValue(':dateContrat', $employe['dateContrat']);
    //     // $request->bindParam(6, $employe['dateContrat']);


    //     $request->execute();


    // }catch(PDOException $e){
    //     echo 'Connexion échouée : ' . $e->getMessage();
    // }


    // si le nom des cles sont les memes que le nom de tes marqueurs dans la requete pour la BDD
    // try{
        
    //     $pdo = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);

    //     $employe = [
    //         'idService' => 2,
    //         'nom' => 'Mantio',
    //         'prenom' => 'Benjamin',
    //         'sexe' => 'H',
    //         'salaire' => 800,
    //         'dateContrat' => '2023-07-31'
    //     ];

    //     // $statement, $stmt, $request, $req
    //     $request = $pdo->prepare("INSERT INTO employe (idService, nom, prenom, sexe, salaire, dateContrat) 
    //     VALUES(:idService, :nom, :prenom, :sexe, :salaire, :dateContrat)");

    //     $request->execute($employe);


    // }catch(PDOException $e){
    //     echo 'Connexion échouée : ' . $e->getMessage();
    // }


    // AVEC SELECT
    // fetchAll() : récupere plusieurs résultats
    // try{
        
    //     // $pdo = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
    //     $pdo = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);

    //     // $statement, $stmt, $request, $req
    //     $request = $pdo->prepare("SELECT * FROM employe");
    //     $request->execute();
    //     // $results = $request->fetchAll(PDO::FETCH_ASSOC);
    //     $results = $request->fetchAll();
    //     echo '<pre>';
    //     print_r($results);
    //     echo '</pre>';


    // }catch(PDOException $e){
    //     echo 'Connexion échouée : ' . $e->getMessage();
    // }

    // fetch() : récupere un seul résultat
    try{
        
        // $pdo = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
        $pdo = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);

        // $statement, $stmt, $request, $req
        $request = $pdo->prepare("SELECT * FROM employe WHERE idEmploye = 3");
        $request->execute();
        // $results = $request->fetchAll(PDO::FETCH_ASSOC);
        $results = $request->fetch();
        echo '<pre>';
        print_r($results);
        echo '</pre>';


    }catch(PDOException $e){
        echo 'Connexion échouée : ' . $e->getMessage();
    }
