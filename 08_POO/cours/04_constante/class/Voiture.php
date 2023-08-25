<?php 

class Voiture extends Vehicule {

    private int $tailleCoffre;

    public const MY_CLASS = 'Voiture';

    private static $compteur = 0;

    public function __construct(int $tailleCoffre, int $nbPassagers, string $couleur)
    {
        
        parent::__construct(4, $nbPassagers, $couleur);
        $this->tailleCoffre = $tailleCoffre;
 

        self::$compteur++;
        echo 'Je suis la classe Fille ' . self::MY_CLASS . '<br>';
        echo 'Je suis la voiture numéro ' . self::$compteur . ' parmi '. Vehicule::getCompteur() . ' véhicules <br><br><br>';
    

    }

}