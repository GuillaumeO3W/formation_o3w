<?php
// exercice : Saisir des données et s'arreter dès que leur somme dépasse 500

$somme=0;
do{
    $valeur = (int) readline ("saisissez une valeur : ");
    $somme += $valeur;
}while($somme<=500);