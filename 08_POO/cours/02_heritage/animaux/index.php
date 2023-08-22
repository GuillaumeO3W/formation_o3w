<?php
require 'class/Animal.php';
require 'class/Chien.php';


$caneCorso = new Chien('Stark',2,'cane corse');
echo $caneCorso->getRace();
echo'<br>';
echo $caneCorso->getNom();
echo'<br>';
echo $caneCorso->getAge();
echo'<br>';
echo $caneCorso->vieillir();
echo'<br>';
echo $caneCorso->getAge();
echo'<br>';
echo $caneCorso->manger();
echo'<br>';
echo $caneCorso->aboie();
