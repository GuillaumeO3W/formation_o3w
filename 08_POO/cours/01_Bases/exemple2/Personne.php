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

    # Constructeur : methode magique (fonction dans une classe) chargée d'initialiser l'objet. Appelée automatiquement lors de la création de l'objet
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
        $this->parler();
    }

    
    # tostring : méthode magique qui est appelée lors de la conversion en chaine de caractère
    public function __toString()
    {
        return $this->nom .' a ' . $this->age .' ans.';
    }

    # destruct : methode magique appelée lors de la fin de vie de l'objet
    public function __destruct()
    {
        echo 'Fin de vie de '. $this->nom;
        echo '<br>';
    }


    # Définition des méthodes de Personne
    # Ce sont des actions disponibles pour chaque instance(objet de Personne).Leur nom contient presque toujours un verbe
    public function parler(){
        switch($this->nationalite){
            case 'fr': 
                echo 'Bonjour';
                break;
            case 'es':
                echo 'Hola';
                break;
            case 'it':
                echo 'Ma qué';
                break;
            default:
                echo 'Hello';
                break;
        }
        echo '<br>';
    }

    public function viellir(){
        $this->age++;
        echo $this->age;
        // echo ++$this->age;
    }


    # Les methodes permettant de lire les données sont appelées Getters (ou accesseur) sont généralement de la forme getNomDonnée() 

    public function getNom(){
        return $this->nom;
    }

    # Les methodes permettant de modifier les données sont appelées Setters (ou mutateur) sont généralement de la forme setNomDonnée($nouvelleValeur) 
    public function setNom($value){
        $this->nom = $value;
    }

    public function getAge(){
        return $this->age;
    }
    
    public function setAge($value){
        $this->age = $value;
    }

    public function getSexe(){
        return $this->sexe;
    }

    public function setSexe($value){
        $this->sexe = $value;
    }

    public function getNationalite(){
        return $this->nationalite;
    }

    public function setNationalite($value){
        $this->nationalite = $value;
    }

}