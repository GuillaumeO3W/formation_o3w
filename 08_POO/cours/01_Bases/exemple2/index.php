<?php 
require 'Personne.php';

# Pour instancier une classe on utilise le mot clé new et on stocke l'objet créé dans une variable
# les paramètres sont ceux du constructeur de la classe Personne
$sony = new Personne('Sony', 26, 'Homme', 'es');

// $sony->parler();
// $sony->viellir();

// echo $sony->nom;

echo $sony->getNom();
$sony->setNom('Coralie');
echo $sony->getNom();
echo '<br>';



// var_dump($sony);

// function parler($nationalite){
//     switch($nationalite){
//         case 'fr': 
//             echo 'Bonjour';
//             break;
//         case 'es':
//             echo 'Hola';
//             break;
//         case 'it':
//             echo 'Ma qué';
//             break;
//         default:
//             echo 'Hello';
//             break;
//     }
// }

// parler($sony->nationalite);