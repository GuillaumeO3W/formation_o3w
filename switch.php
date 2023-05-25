<?php 

// Saisir la civilité , et afficher selon la civilité le bon message :
// - Bonjour Mademoiselle
// - Bonjour Madame
// - Bonjour Monsieur
// - Bonjour inconnu(e)

echo "Quelle est votre civilité ?\n1: Mademoiselle\n2: Madame\n3: Monsieur\n";
$civ = (int) readline ('');
switch($civ){
case 1:
    echo 'Bonjour Mademoiselle'; 
    break;
case 2:
    echo 'Bonjour Madame';
    break;
case 3:
    echo 'Bonjour Monsieur';
    break;
default:
    echo 'Bonjour inconnu(e)';
}

