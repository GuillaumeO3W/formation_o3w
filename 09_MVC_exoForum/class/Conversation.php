<?php

###### ATTENTION ######
 ## les setters obligatoire pour l'hydratation !

class Conversation
{

    private $_id;
    private $_date;
    private $_hour;
    private $_status;
    private $_nbMsg;


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
    
    public function getDate(): string
    {
        return $this->_date;
    }

    public function setDate(string $date)
    {
        $this->_date = $date;
    }

    public function getHour(): string
    {
        return $this->_hour;
    }

    public function setHour(string $hour)
    {
        $this->_hour = $hour;
    }

    public function getStatus(): int
    {
        return $this->_status;
    }

    public function setStatus(int $status)
    {
        $this->_status = $status;
    }

    public function getNbMsg(): int
    {
        return $this->_nbMsg;
    }

    public function setNbMsg(int $nbMsg)
    {
        $this->_nbMsg = $nbMsg;
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