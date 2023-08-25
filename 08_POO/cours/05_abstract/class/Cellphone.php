<?php 

# abstract de class : interdit l'intanciation de la classe
abstract class Cellphone {

    # abstract  de method : oblige que cette méthode soit dans la ou toutes les classes enfants
    abstract public function unlock();

    public function turnOn(){
        echo 'Hold power button ...';
    }

}