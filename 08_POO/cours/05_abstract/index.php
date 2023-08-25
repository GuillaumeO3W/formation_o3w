<?php 

require 'lib/_helpers/tools.php';
require 'class/Cellphone.php';
require 'class/Ios.php';
require 'class/Android.php';


// $cell = new Cellphone();
// $cell->turnOn();

echo '<br>';
echo '<br>';

$ios = new Ios();
$ios->turnOn();
echo '<br>';
$ios->unlock();

echo '<br>';
echo '<br>';

$android = new Android();
$android->turnOn();
echo '<br>';
$android->unlock();

echo '<br>';
echo '<br>';
