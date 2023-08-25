<?php

require 'lib/_helpers/tools.php';
require 'class/Animal.php';
require 'class/Chien.php';
require 'class/Chat.php';
require 'class/Oiseau.php';
require 'class/Perroquet.php';

# l'héritage permet de faire évoluer une classe sans la modifier en créant une classe dérivée de celle-ci
# La classe dérivée hérite de toutes les caractérisques de la classse mère/parente
# Il est possible de lui ajouter des fonctionnaliés supplémentaire 
# Dans la classe enfant(dérivée), il est possible de redéfinir les propriétés ou les méthodes de la classe parente

// $caneCorso = new Chien('Stark', 2,'cane corse');
// echo $caneCorso->getRace();
// echo '<br>';
// echo $caneCorso->getNom();
// echo '<br>';
// echo $caneCorso->getAge();
// echo '<br>';
// echo $caneCorso->manger();
// echo $caneCorso->viellir();
// echo '<br>';
// echo $caneCorso->getAge();
// echo '<br>';
// echo $caneCorso->aboie();
// echo '<br>';
// $caneCorso->setPoids(56.8);
// echo $caneCorso->getPoids();
// echo '<br>';
// echo '<br>';

// $chat = new Chat('Blaky', 4, 'chat de goutiére', 'Noir');
// echo $chat->getRace();
// echo '<br>';
// echo $chat->getNom();
// echo '<br>';
// echo $chat->getAge();
// echo '<br>';
// echo $chat->manger();
// echo $chat->viellir();
// echo '<br>';
// echo $chat->getAge();
// echo '<br>';
// echo $chat->miaule();
// echo '<br>';
// echo $chat->getRobe();
// echo '<br>';

$coco = new Perroquet('Coco', 2,'Ara');
echo $coco->getRace();
echo '<br>';
echo $coco->getNom();
echo '<br>';
echo $coco->getAge();
echo '<br>';
echo $coco->manger();
echo '<br>';
echo '<br>';
debug($coco);
echo $coco->apprendreMot('Bonjour');
echo $coco->apprendreMot('Aurevoir');
echo $coco->apprendreMot('Bonjour');
echo '<br>';
echo '<br>';
debug($coco);
