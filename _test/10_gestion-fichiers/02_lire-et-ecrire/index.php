<?php

$filename = __DIR__.'/monDossier/monFichier.txt';
$directory = __DIR__.'/monDossier';


echo readfile($filename);
$arr = file($filename);
echo '<br>';
echo '<pre>';
var_dump($arr);
echo '</pre>';

$txt = file_get_contents($filename);
echo $txt;

file_put_contents($filename, 'Olivier pioupiou !', FILE_APPEND);