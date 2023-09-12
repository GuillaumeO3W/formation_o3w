<?php
class Groupe
{
    private $_id;
    private $_debutTravail;
    private $_finTravail;
    private $_taverneId;
    private $_tunnel;


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
    
    public function getDebut(): string
    {
        return $this->_Debut;
    }

    public function setDebut(string $debut)
    {
        $this->_Debut = $debut;
    }
    
    public function getFin(): string
    {
        return $this->_Fin;
    }

    public function setFin(string $fin)
    {
        $this->_Fin = $fin;
    }

    public function getTaverneId(): int
    {
        return $this->_TaverneId;
    }

    public function setTaverneId(int $taverneId)
    {
        $this->_TaverneId = $taverneId;
    }
    
    public function getTaverne(): string
    {
        return $this->_Taverne;
    }

    public function setTaverne(string $taverne)
    {
        $this->_Taverne = $taverne;
    }
    
    public function getTunnel(): int
    {
        return $this->_Tunnel;
    }

    public function setTunnel(int $tunnel)
    {
        $this->_Tunnel = $tunnel;
    }


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