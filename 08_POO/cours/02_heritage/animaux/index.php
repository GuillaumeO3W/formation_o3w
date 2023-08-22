<?php
require 'class/Animal.php';
require 'class/Chien.php';
require 'class/Chat.php';
require 'class/Vache.php';


$caneCorso = new Chien('Stark',2,'cane corse');
echo $caneCorso->getRace();
echo'<br>';
echo $caneCorso->getNom();
echo'<br>';
echo $caneCorso->getAge();
echo'<br>';
echo $caneCorso->vieillir();
echo $caneCorso->getAge();
echo'<br>';
echo $caneCorso->manger();
echo'<br>';
echo $caneCorso->aboie();

echo'<br>';
echo'<br>';

$bengal = new Chat('Minou',4,'Bengal');
echo $bengal->getRace();
echo'<br>';
echo $bengal->getNom();
echo'<br>';
echo $bengal->getAge();
echo'<br>';
echo $bengal->vieillir();
echo $bengal->getAge();
echo'<br>';
echo $bengal->manger();
echo'<br>';
echo $bengal->aboie();

echo'<br>';
echo'<br>';

$Limousine = new Vache('Margueritte',14,'Limousine');
echo $Limousine->getRace();
echo'<br>';
echo $Limousine->getNom();
echo'<br>';
echo $Limousine->getAge();
echo'<br>';
echo $Limousine->vieillir();
echo $Limousine->getAge();
echo'<br>';
echo $Limousine->manger();
echo'<br>';
echo $Limousine->aboie();