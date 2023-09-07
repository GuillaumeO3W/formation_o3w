<?php

require 'lib/functions.php';

$monPerso1 = new Magicien;
$monPerso1->setNom('Gandalf');
echo 'Monnom est '. $monPerso1->getNom();
echo '<br>';
$monPerso1->parle();
echo '<br>';
$monPerso1->seDeplace();
echo '<br>';
echo iInteraction::HELLO;
echo '<br>';
echo Magicien::HELLO;
