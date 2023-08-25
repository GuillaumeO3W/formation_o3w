<?php 

class Animal 
{

    protected string $nom;
    private int $age;
    private string $race;
    private float $poids;

    public function __construct($nom,$age,$race,$poids = 0)
    {
        $this->nom = $nom;
        $this->age = $age;
        $this->race = $race;
        $this->poids = $poids;
    }

    public function getNom(){
        return $this->nom;
    }

    public function setNom($value){
         $this->nom = $value;
    }

    public function getAge(){
        return $this->age;
    }

    public function setAge($value){
        $this->age =  $value;
    }

    public function getRace(){
        return $this->race;
    }

    public function setRace($value){
         $this->race = $value;
    }

    public function getPoids(){
        return $this->poids;
    }

    public function setPoids( $value){
        $this->poids =  $value;
    }

    public function viellir(){
        $this->age++;
    }

    public function manger(){
        echo 'l\'animal mange ...';
    }

}