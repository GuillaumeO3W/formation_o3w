<?php


// $fruits = ['pomme','banane','pêche','kiwi'];
// for ($i=0 ; $i <= count($fruits)-1 ; $i++){
//     echo $fruits[$i].PHP_EOL;
// }

// EXERCICE :
// En fonction d'un nombre saisie, faites la somme des entiers saisis
//  et afficher le résultat ainsi que le nombre d'itérations
$totalFactures =0;
$nbFactures = (int) readline ("Combien de Factures voulez vous saisir ? :");

for ($i=1 ; $i<=$nbFactures ; $i++){

    $montantFacture = (int) readline ("Quel est le montant de votre facture n°$i ? : ");
    $totalFactures += $montantFacture;
    echo ("le montant de votre facture n°$i est $montantFacture € \n");

}
echo 'Vous avez saisie ' . $nbFactures . ' facture' . ($nbFactures!=1 ? 's.' : '.') . PHP_EOL;
echo "Le total de vos factures est de : $totalFactures €\n\n";