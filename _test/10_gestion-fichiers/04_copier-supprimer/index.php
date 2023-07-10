<?php 

$filename = __DIR__.'/monDossier/monFichier.txt';
$directory = __DIR__.'/monDossier';

// copy($filename, $directory.'/copieMonFichier.txt');

// unlink($filename);
unlink($directory.'/copieMonFichier.txt');
rmdir($directory);

