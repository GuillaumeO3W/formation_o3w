<?php

$nombreATrouver=rand(10, 20);
$nombreDeTentatives=0;
echo 'trouvez le nombre caché, il est compris entre 10 et 20...'.PHP_EOL.'vous avez 4 tentatives'.PHP_EOL;

do{
$saisie=(int) readline('saisissez un nombre entre 10 et 20 :');
$nombreDeTentatives++;
echo ($saisie<10) ? "Attention ! votre saisie est en dessous de 10...".PHP_EOL : "";
echo ($saisie>20) ? "Attention ! votre saisie est au dessus de 20...".PHP_EOL : "";
echo (($saisie!=$nombreATrouver && $saisie>=10) && ($saisie!=$nombreATrouver && $saisie<=20)) ? "ce n'est pas $saisie, try again !". PHP_EOL : "";
}
while(($saisie!=$nombreATrouver) && ($nombreDeTentatives<4));
echo ($saisie === $nombreATrouver) ? "you Win ! le nombre à trouver était bien $nombreATrouver" : "you Loose ! le nombre à trouver était $nombreATrouver";
