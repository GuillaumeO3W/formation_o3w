<?php
require 'exception.php';
require 'Calculatrice.php';

try
{
    $calcul = new Calculatrice;
    echo $calcul->division(2,0);
}catch(numberException $e)
{
    echo 'Exception Typage : ' . $e->errorMessage();
}catch(Exception $e)
{
    echo 'Exception capturée : ' . $e->getMessage();
}