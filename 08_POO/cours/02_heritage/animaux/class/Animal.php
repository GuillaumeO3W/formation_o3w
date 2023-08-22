<?php
class Animal
{
    private string $nom;
    private int $age;
    
    public function __construct($nom, $age)
    {
        $this->nom = $nom;
        $this->age = $age;
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
        $this->nom = $value;
    }
}
