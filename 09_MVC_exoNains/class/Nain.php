<?php
class Nain
{
    private $_id;
    private $_nom;
    private $_barbe;
    private $_groupe;
    private $_v_id;
    private $_ville;
    private $_taverne;
    private $_debut;
    private $_fin;
    private $_depart;
    private $_departId;
    private $_arrivee;
    private $_arriveeId;


    public function __construct(array $data)
    {
        $this->hydrate($data);
    }
////////////////////////////////////////////////////        
    public function getId(): int
    {
        return $this->_id;
    }

    public function setId(int $id)
    {
        $this->_id = $id;
    }
///////////////////////////////////////////////////           
    public function getNom(): string
    {
        return $this->_Nom;
    }

    public function setNom(string $nom)
    {
        $this->_Nom = $nom;
    }
//////////////////////////////////////////////////            
    public function getBarbe(): float
    {
        return $this->_Barbe;
    }

    public function setBarbe(null | float $barbe)
    {
        $this->_Barbe = $barbe;
    }
///////////////////////////////////////////////////                
    public function getGroupe(): int
    {
        return $this->_Groupe;
    }

    public function setGroupe(int $groupe)
    {
        $this->_Groupe = $groupe;
    }
///////////////////////////////////////////////////             
    public function getV_id(): int
    {
        return $this->_V_id;
    }

    public function setV_id(int $v_id)
    {
        $this->_V_id = $v_id;
    }
//////////////////////////////////////////////////               
    public function getVille(): string
    {
        return $this->_Ville;
    }

    public function setVille(string $ville)
    {
        $this->_Ville = $ville;
    }
//////////////////////////////////////////////////   
    public function getT_id(): int
    {
        return $this->_T_id;
    }

    public function setT_id(int $t_id)
    {
        $this->_T_id = $t_id;
    }
////////////////////////////////////////////////////    
    public function getTaverne(): string
    {
        return $this->_Taverne;
    }

    public function setTaverne(string $taverne)
    {
        $this->_Taverne = $taverne;
    }
//////////////////////////////////////////////////////        
    public function getDebut(): string
    {
        return $this->_Debut;
    }

    public function setDebut(string $fin)
    {
        $this->_Debut = $fin;
    }
//////////////////////////////////////////////////        
    public function getFin(): string
    {
        return $this->_Fin;
    }

    public function setFin(string $debut)
    {
        $this->_Fin = $debut;
    }
/////////////////////////////////////////////////        
    public function getDepart(): string
    {
        return $this->_Depart;
    }

    public function setDepart(string $depart)
    {
        $this->_Depart = $depart;
    }
/////////////////////////////////////////////////        
    public function getDepartId(): int
    {
        return $this->_DepartId;
    }

    public function setDepartId(int $departId)
    {
        $this->_DepartId = $departId;
    }
///////////////////////////////////////////////////        
    public function getArrivee(): string
    {
        return $this->_Arrivee;
    }

    public function setArrivee(string $arrivee)
    {
        $this->_Arrivee = $arrivee;
    }
///////////////////////////////////////////////////        
    public function getArriveeId(): int
    {
        return $this->_ArriveeId;
    }

    public function setArriveeId(int $arriveeId)
    {
        $this->_ArriveeId = $arriveeId;
    }
///////////////////////////////////////////////////
    private function hydrate(array $data)
    {
        foreach($data as $key=>$value)
        {
            $value == NULL ? $value = "0" : $value = $value;
            
                $setter = 'set'. ucfirst($key);
                if(method_exists($this, $setter))
                {
                    $this->$setter($value);
                }            
        }
    }
}