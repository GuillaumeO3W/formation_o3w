<?php 

# Déclaration d'une classe nommée Personne
class Personne 
{
    # Définition des données (variables attributs ou proprietes) de Personne
    # Chaque (instance de) Personne en possédera une copie 

    # public : accessible depuis la classe elle-meme ainsi que dans les classes dérivées et à travers les instances de classe  
    # private : accessible uniquement depuis la classe elle-meme
    # protected : accessible uniquement depuis la classse elle-meme et les classes dérivées

    private string $nom; 
    private int $age; 
    private string $sexe;
    private string $nationalite;

    # Constructeur : methode(fonction dans une classe) chargée d'initialiser l'objet. Appelée automatiquement lors de la création de l'objet
    public function __construct($nom, $age, $sexe, $nationalite = "?")
    {
        # les variables ou methodes sont utilisées par le biais de l'opérateur ->
        # L'objet contenant est à gauche de l'opérateur. Dans les methodes, il s'agit de $this, l'objet actuel/courant
        
        $this->nom = $nom;
        $this->age = $age;
        $this->sexe = $sexe;
        $this->nationalite = $nationalite;
        
        echo 'Debut de la vie de ' . $this->nom;
        echo '<br>';
    }
    
    public function parler()
    {
        switch ($this->nationalite)
        {
            case 'fr': echo 'Bonjour'; break;
            case 'es': echo 'Hola'   ; break;    
            case 'it': echo 'Ciao'   ; break;    
            default  : echo 'Hello'  ; break;    
        }
    }

    public function vieillir()
    {
        echo '<br>';
        echo 'age de Sony '. ++$this->age;
    }
}