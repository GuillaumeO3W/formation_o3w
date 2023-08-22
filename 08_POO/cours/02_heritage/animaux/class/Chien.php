<?php
class Chien extends Animal{
    private string $race;

    public function __construct($nom, $age, $race)
    {
        parent::__construct($nom,$age);
        $this->race = $race;
    }

    public function getRace(){
        return $this->race;
    }
    public function setRace($value){
        $this->race = $value;
    }
    public function manger(){
        echo'l\'animal mange ses croquettes';
    }
    public function aboie(){
        echo 'Wouf';
    }
}