<?php
class Groupe
{
    private $_id;
    private $_debutTravail;
    private $_finTravail;
    private $_taverne;
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
    
    public function getDebutTravail(): string
    {
        return $this->_DebutTravail;
    }

    public function setDebutTravail(string $debutTravail)
    {
        $this->_DebutTravail = $debutTravail;
    }
    
    public function getFinTravail(): string
    {
        return $this->_FinTravail;
    }

    public function setFinTravail(string $finTravail)
    {
        $this->_FinTravail = $finTravail;
    }

    public function getTaverne(): int
    {
        return $this->_Taverne;
    }

    public function setTaverne(int $taverne)
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
            $setter = 'set'. ucfirst($key);
            if(method_exists($this, $setter))
            {
                $this->$setter($value);
            }
        }
    }
}