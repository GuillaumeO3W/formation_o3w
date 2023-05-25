<?php
//__________________________________ Exercice 0_______________________
// -------------------------------------------------------------------
// Écrire un programme qui échange la valeur de deux variables.
// Exemple, si a ← 2 et b ← 5, le programme donnera a ← 5 et b ← 2.
// -------------------------------------------------------------------

// $a=2;
// $b=5;
// echo 'A vaut actuellement '.$a .' et B vaut actuellement '. $b. PHP_EOL;

// // 1ère méthode
// // $c=$a;
// // $a=$b;
// // $b=$c;

// // 2ème méthode
// $a=$a+$b;
// $b=$a-$b;
// $a=$a-$b;

// echo 'A vaut maintenant '.$a .' et B vaut maintenant '. $b. PHP_EOL.PHP_EOL;

//__________________________________ Exercice 1_______________________
// -------------------------------------------------------------------
// Écrire un algorithme qui demande deux nombres à l’utilisateur 
// et l’informe ensuite si leur produit est négatif ou positif
// (on laisse de coté le cas où le produit est nul). 
// Attention toutefois : on ne doit pas calculer le produit des deux nombres.
// -------------------------------------------------------------------

// $a=  (int) readline('saississez un nombre A :');
// $b=  (int) readline('saississez un nombre B :');

// ________________ METHODE Simple____________________

//  if (($a>=0 && $b>=0) || ($a<0 && $b<0)){
//     echo "le produit de A et B est positif";
//  }else
//      echo "le produit de A et B est négatif";

// ________________ METHODE Ternaire____________________

// echo (($a<0) || ($b<0)) ? "le produit de A et B est négatif" : "le produit de A et B est positif";


//__________________________________ Exercice 2_______________________
// -------------------------------------------------------------------
// Écrire un algorithme qui demande un nombre compris entre 10 et 20, 
// jusqu’à ce que la réponse convienne. 
// En cas de réponse supérieure à 20, on fera apparaître un message : "Plus petit !" ,
//  et inversement, "Plus grand !" si le nombre est inférieur à 10.
// -------------------------------------------------------------------

$a=null;
$b=rand(10, 20);
$i=null;

while ($a!=$b && $i!=3){
    $i++;
    echo "vous avez ". $nbEssais=4-$i ." essais\n";
    $a= (int) readline('saississez un nombre entre 10 et 20 : ');
    if ($a > 20 ){
    echo "Plus petit !\n";
    }elseif ($a < 10){
    echo "Plus grand !\n";
    }elseif($a === $b){
    echo "gagné !!!\n" ;
    }elseif($i===3){
    echo "perdu !!!";
    }else{
    echo "essaye encore ....\n";
    }
}
