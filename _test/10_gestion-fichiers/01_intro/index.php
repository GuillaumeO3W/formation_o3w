<?php 

// $filename = './monFichier.txt';
// $directory = './monDossier';

# __DIR__ : chemin absolue de la ou vous faites l'appel 
$filename = __DIR__.'/monDossier/monFichier.txt';
$directory = __DIR__.'/monDossier';

# file_exists verifie si le fichier ou le dossier existe 
var_dump(file_exists($filename));
echo '<br>';
# is_file verifie si l'élément passé en parametre est un fichier
var_dump(is_file($filename));
echo '<br>';
# is_dir verifie si l'élément passé en parametre est un dossier
var_dump(is_dir($filename));
echo '<br>';
var_dump(is_dir($directory));