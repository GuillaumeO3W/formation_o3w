<?php
class Nain
{
    private $_id;
    private $_nom;
    private $_barbe;
    private $_groupe;
    private $_ville;
    private $_taverne;


    public function __construct(array $data)
    {
        $this->hydrate($data);

    }

    public function getId(): int
    {
        return $this->_id;
    }

    public function setId(int $id)
    {
        $this->_id = $id;
    }
    
    public function getNom(): string
    {
        return $this->_Nom;
    }

    public function setNom(string $nom)
    {
        $this->_Nom = $nom;
    }
    
    public function getBarbe(): float
    {
        return $this->_Barbe;
    }

    public function setBarbe(float $barbe)
    {
        $this->_Barbe = $barbe;
    }
    
    public function getGroupe(): int
    {
        return $this->_Groupe;
    }

    public function setGroupe(int $groupe)
    {
        $this->_Groupe = $groupe;
    }
  
    public function getVille(): string
    {
        return $this->_Ville;
    }

    public function setVille(string $ville)
    {
        $this->_Ville = $ville;
    }
  
    public function getTaverne(): string
    {
        return $this->_Taverne;
    }

    public function setTaverne(string $taverne)
    {
        $this->_Taverne = $taverne;
    }


    private function hydrate(array $data)
    {
        foreach($data as $key=>$value)
        {
            if($value != NULL)
            {
                $setter = 'set'. ucfirst($key);
                if(method_exists($this, $setter))
                {
                    $this->$setter($value);
                }
            }
            
        }
    }
}