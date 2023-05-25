<?php

/* EXERCICE 0
Afficher le contenu du tableau.
$vehicules = [
‘voitures’ ⇒ [’C3 aircross’, ‘Passat’, ‘Dacia Sandero’],
‘Camions’ ⇒ [’Renault truck’, ‘Mercedes-Benz Unimog’]
];
*/

// $vehicules = [
//     'voitures' => ['C3 aircross', 'Passat', 'Dacia Sandero'],
//     'Camions' => ['Renault truck', 'Mercedes-Benz Unimog']
//     ];

// foreach( $vehicules as $typeVehicule => $groupVehicule ){
//         echo "\nVéhicules de type $typeVehicule :\n\n";
//          foreach ( $groupVehicule as $modelVehicule ){
//             echo "- $modelVehicule\n";
//          }
// }


/* EXERCICE 1
Demandez à l'utilisateur de saisir une note une par une jusqu'à saisir -1 pour terminer la
saisie. Chaque note est stockée dans un tableau notes, et on affichera a la fin les notes
saisies.
*/

// $saisie = null;
// while ( $saisie != -1){
//     $saisie = (int) readline ("entrez une  note : ");
//     if ($saisie != -1) {
//         $notes[] = $saisie;
//     }
// }
// echo "voici votre saisie : \n";
// foreach ($notes as $note){
//     echo $note."\n";
// }



/* EXERCICE 1 bis
faire la somme des notes saisies et calculer la moyenne attention vous aurez besoin de
savoir le nombre d'élément qu'il y a dans le tableau de notes ( on la déjà vu si vous
avez oublié regardez dans la doc php).
*/

// echo "la somme des notes est : ". $sommeDesNottes = array_sum ($notes) ."\n";
// echo "le nombre de notes est : ". $nbDeNottes = count ($notes) ."\n";
// echo "la moyenne des notes est :". $sommeDesNottes / $nbDeNottes;


/* EXERCICE 2
En utilisant la fonction rand(), remplir un tableau avec 20 nombres aléatoires.
Trier ces nombres dans deux tableaux distincts.
Le premier contiendra les valeurs positives et le second contiendra les valeurs
négatives.
Enfin, afficher le contenu des deux tableaux.
*/

$nombres=[];
$nombresPositifs=[];
$nombresNegatifs=[];

for($i=0 ; $i<20; $i++ ){
    $nombres[] = rand(-100,100); 
}

foreach($nombres as $nombre){       
    if($nombre >= 0){
        $nombresPositifs[]=$nombre;
    }
    else{
        $nombresNegatifs[]= $nombre;
    }
}

echo "\nil y a " . count($nombres) . " nombres au total.\n";

echo "\n" . count($nombresPositifs) . " nombres positifs :\n";
foreach($nombresPositifs as $nbPos){
           echo $nbPos . " ";
    }
    
echo "\n\n" . count($nombresNegatifs) . " nombres négatifs :\n";    
foreach($nombresNegatifs as $nbNeg){
       echo $nbNeg . " ";
    }
