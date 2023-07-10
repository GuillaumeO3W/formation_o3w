<?php 

$filename = __DIR__.'/monDossier/monFichier.txt';
$directory = __DIR__.'/monDossier';

$handle = fopen($filename, 'r+');
fwrite($handle,'OOPS');

$data = fread($handle, filesize($filename));

fclose($handle);
echo $data;
