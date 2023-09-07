<?php

require 'Notifications.php';
require 'Operation.php';

$op = new Operation();
$op->calcul(4,6);
echo '<br>';
$op -> afficher();