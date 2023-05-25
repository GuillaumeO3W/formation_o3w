<?php

$eleves = [
    'cine1' => ['Sony','Benjamin','Anne'],
    'game1' => ['Arturo','Olivier','Thibaut']
];

foreach($eleves as $classe => $listeEleves){

    echo "la classe $classe : \n";
    foreach ($listeEleves as $eleve){
        echo "- $eleve\n";
    }
echo "\n";
}