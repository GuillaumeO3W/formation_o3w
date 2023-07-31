<?php

#PDO : PHP Data Objects et POO:Programmation Orientée Objet  
#Se connecter à une base de donnée  
#Data Source Name $dsn='mysql:host=localhost;dbname=company;charset=utf8'; 

$dsn='mysql:host=127.0.0.1;dbname=company;charset=utf8';
$username= 'root';
$password='';

$employe=[     
    'idService'=> 2,
    'nom'=> 'Mantio',
    'prenom'=>'Benjamin',
    'sexe'=>'H',     
    'salaire' => 800,       
    'dateContrat'=>'2023-07-25' 
];

try{
    $pdo = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
    /* ,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC */]);

    $request = $pdo->prepare("SELECT * FROM employe");
    $request -> execute();
    $results = $request->fetchAll(PDO::FETCH_ASSOC);
    echo '<pre>';
    print_r($results);
    echo '</pre>';

}catch(PDOException $e){
    echo 'Connexion échouée : ' . $e->getMessage;
}

?>