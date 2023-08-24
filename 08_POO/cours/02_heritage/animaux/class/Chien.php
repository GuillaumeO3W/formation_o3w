<?php 


class Chien extends Animal{


    public function __construct($nom,$age,$race)
    {
        parent::__construct($nom,$age,$race);
    }


 

    public function manger(){
        echo 'le chien mange ses croquettes';
    }

    public function aboie(){
        echo 'Wouf';
    }

}