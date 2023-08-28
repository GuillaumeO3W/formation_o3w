<?php

class Conversation
{
    private $_id;
    private $_date;
    private $_heure;
    private $_termine;
    private $_nbMessages;
    
    public function __construct(array $data)
    {     
        $this->hydrate($data);
    }
    public function getId() : int
    {
        return $this->_id;
    }
    public function setId(int $id)
    {
        $this->_id = $id;
        return $this;
    }
    public function getDate() : string
    {
        return $this->_date;
    }
    public function setDate(string $date)
    {
        $this->_date = $date;
        return $this;
    }
    public function getHeure() : string
    {
        return $this->_heure;
    }
    public function setHeure(string $heure)
    {
        $this->_heure = $heure;
        return $this;
    }
    public function getTermine()
    {
        return $this->_termine;
    }
    public function setTermine( $termine)
    {
        $this->_termine = $termine;
        return $this;
    }
    public function getNbMessages() : int
    {
        return $this->_nbMessages;
    }
    public function setNbMessages(int $nbMessages)
    {
        $this->_nbMessages = $nbMessages;
        return $this;
    }
    public function hydrate(array $data)
    {
        foreach($data as $key => $value)
        {
            $methodName = 'set'. ucfirst(substr($key, 2, strlen($key)-2));
            if(method_exists($this, $methodName))
            {
                $this->$methodName($value);
            }
        }
    }
}
