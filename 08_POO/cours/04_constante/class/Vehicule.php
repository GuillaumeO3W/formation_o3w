<?php 

class Vehicule {

    private  int $nbRoues; 
    private int $nbPassagers; 
    private string $couleur; 

    public const MY_CLASS = 'Vehicule';

    private static $compteur = 0;

    public function __construct(int $roues, int $passagers, string $couleur)
    {
        
        $this->nbRoues = $roues;
        $this->nbPassagers = $passagers;
        $this->couleur = $couleur;

        self::$compteur++;

        echo 'Je suis le véhicule numéro ' . self::$compteur . '<br>';
        echo 'Je suis la classe Mére ' . self::MY_CLASS . '<br>';

    }

    public function getCompteur(){
        return self::$compteur;
    }

}