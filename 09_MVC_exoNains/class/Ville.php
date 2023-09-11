<?php
class Ville
{
    private $_id;
    private $_nom;
    private $_superficie;


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
  
    public function getSuperficie(): int
    {
        return $this->_Superficie;
    }

    public function setSuperficie(int $superficie)
    {
        $this->_Superficie = $superficie;
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