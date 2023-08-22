<?php
class Chien extends Animal{
    private string $race;

    public function __construct($race)
    {
        $this->race = $race;
    }

    public function getRace(){
        return $this->race;
    }
    public function setRace($value){
        $this->race = $value;
    }
}