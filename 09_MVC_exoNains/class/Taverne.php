<?php
class Taverne
{
    private $_id;
    private $_nom;
    private $_chambres;
    private $_blonde;
    private $_brune;
    private $_rousse;
    private $_ville;


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
  
    public function getChambres(): int
    {
        return $this->_Chambres;
    }

    public function setChambres(int $chambres)
    {
        $this->_Chambres = $chambres;
    }
   
    public function getBlonde(): int
    {
        return $this->_Blonde;
    }

    public function setBlonde(int $blonde)
    {
        $this->_Blonde = $blonde;
    }
   
    public function getBrune(): int
    {
        return $this->_Brune;
    }

    public function setBrune(int $brune)
    {
        $this->_Brune = $brune;
    }
   
    public function getRousse(): int
    {
        return $this->_Rousse;
    }

    public function setRousse(int $rousse)
    {
        $this->_Rousse = $rousse;
    }
   
    public function getVille(): string
    {
        return $this->_Ville;
    }

    public function setVille(string $ville)
    {
        $this->_Ville = $ville;
    }


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