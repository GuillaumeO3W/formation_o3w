<?php
/*
Saisir une valeur entière et afficher son double si cette
valeur donnée est infèrieure à un seuil donné.
seuil = 20
*/

// const SEUIL = 20;
define ('SEUIL',20);
$val=  (int) readline('saississez une valeur entière en dessous de 20 :');
if ($val<SEUIL){
    echo $val*2;
}else {
    echo 'la valeur rentrée n\'est pas inférieur à 20 !!';
}