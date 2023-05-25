<?php

/*
Saisir une note entiere et afficher : 
    - "Reçu avec mention Assez bien" si une note est superieur ou egale a 12,
    - "Reçu avec mention Passable" si une note est superieur a 10 et inferieur a 12,
    - "Insuffisant" pour tous les autres cas,
*/

$note = (int) readline('Saisissez votre note :');

if($note>=12){
    echo "Reçu avec mention Assez bien";
}elseif(10<$note && $note<12){
    echo "Reçu avec mention Passable";
}else{
    echo "insuffisant";
}