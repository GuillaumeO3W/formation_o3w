<?php 

class Perroquet extends Oiseau {

    private array $motsAppris;

    public function __construct($nom,$age,$race){
        parent::__construct($nom,$age,$race);
        $this->motsAppris = [];
    }

    public function apprendreMot($mot){

        if($this->connaitMot($mot)){
            echo $this->getNom() .' connait déjà ce mot';
        } else {
            $this->motsAppris[] = $mot;
        }

        # pareil que en haut mais inversé ressemble plus a notre réflexion mais plus dur a comprendre
        if(!$this->connaitMot($mot)){
            $this->motsAppris[] = $mot;
        } else {
            echo $this->getNom() .' connait déjà ce mot';
        }

        

    }

    public function connaitMot($mot){

        return in_array($mot, $this->motsAppris);
        # return true si le mot est dans le tableau 
        # return false si le mot n'est pas dans le tableau 

    }

    
    
        
    


}