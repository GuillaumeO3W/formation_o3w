<?php

    // function nomFonction($argument1, $argument2){
    //     //instructions     
    // }   

    // function direBonjour($prenom){

    //     echo "Bonjour $prenom";
    // }

    // direBonjour('Sony');

// -------------------------------------------------
    
    // addition (1,2);

    // function addition ($a,$b){
    //     echo $a+$b;
    // }


//     function soustraction ($a,$b,$c){
//         return ($a+$b)-$c;
//     }
//     echo soustraction(20,45,10).PHP_EOL;

// ///----------------

//     function soustraction2 ($a,$b){
//         echo $a-$b;
//     }
//     soustraction2 (20,12);

///----------------

//     function jeu (){
//         $nbAleatoire = rand(0,10);
//         $saisie = null;
//         while ($saisie != $nbAleatoire){
//             $saisie = (int) readline ('trouvez le nombre (entre 0 et 10) :');
//         }
//         echo 'Win !';

//     }
// jeu();


///--------------------


// function calculMajorite($age){
//     if ($age >= 18){
//         return 'vous êtes majeur(e)';
//     }else{
//         return 'vous êtes mineur(e)';
//     }
// }
// $ageDeLaPersonne = (int) readline ('Quel est votre age ? ');
// echo calculMajorite($ageDeLaPersonne);

///--------------------

// $yob = (int) readline ('Quelle est votre année de naissance ?').PHP_EOL;

// function calculAge($year){
//     return $age=date("Y")-$year;
// }

// echo 'vous avez '.calculage($yob).'ans';
// echo date("y");

///-------------------


$films =[
    [
        'titre' => 'L\'empire contre attaque',
        'annee' => 1980
    ],
    [
        'titre' => 'Le retour du Jedi',
        'annee' => 1983
    ],
    [
        'titre' => 'L\'Attaque des clones',
        'annee' => 2002
    ],
    [
        'titre' => 'La Revanche des Sith',
        'annee' => 2005
    ]
];

function Recents($arg, $annee){
foreach ($arg as $value){

        if ($value['annee']>= $annee){
     
            echo $value['titre'].' ('.$value['annee'].')'.PHP_EOL;
        }
    }
}
$anneeTri = (int) readline ('choisissez une annee de tri : ');
echo "Voici des films sortis après $anneeTri : \n";
Recents($films,$anneeTri);
