<?php

// saisir des valeurs tant que la valeur de la saisie n'est pas égale à -1
// et affiché le nombre de saisie total ainsi que la somme des valeurs saisies

$note = (int) readline ("saisissez une note : ");
$nbNotes = 0;
$sommeNotes = 0;

while ($note !=- 1){
    $sommeNotes += $note;
    $nbNotes++;
    $note = (int) readline ("saisissez une valeur : ");
}

echo "\nvous avez entré " . $nbNotes . " note(s)\net la somme des notes est : ". $sommeNotes ."\n";
echo "la moyenne des notes est : ". $sommeNotes / $nbNotes;