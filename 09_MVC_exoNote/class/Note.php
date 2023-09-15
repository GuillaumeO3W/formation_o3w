<?php
class Note
{
    private $_id;
    private $_titre;
    private $_texte;
    private $_date;
    private $_auteur;


    public function __construct(array $data)
    {
        $this->hydrate($data);

    }
////////////////////////////////////////////////
    public function getId(): int
    {
        return $this->_id;
    }

    public function setId(int $id)
    {
        $this->_id = $id;
    }
////////////////////////////////////////////////    
    public function getTitre(): string
    {
        return $this->_Titre;
    }

    public function setTitre(string $titre)
    {
        $this->_Titre = $titre;
    }
////////////////////////////////////////////////    
 
    public function getTexte(): string
    {
        return $this->_Texte;
    }

    public function setTexte(string $texte)
    {
        $this->_Texte = $texte;
    }
////////////////////////////////////////////////    
 
    public function getDate(): string
    {
        return $this->_Date;
    }

    public function setDate(string $date)
    {
        $this->_Date = $date;
    }
////////////////////////////////////////////////    
 
    public function getAuteur(): string
    {
        return $this->_Auteur;
    }

    public function setAuteur(string $auteur)
    {
        $this->_Auteur = $auteur;
    }

////////////////////////////////////////////////    

    private function hydrate(array $data)
    {
        foreach($data as $key=>$value)
        {
            $setter = 'set'. ucfirst($key);
            if(method_exists($this, $setter))
            {
                $this->$setter($value);
            }
        }
    }
}