<?php

class Conversation
{
    private $_id;
    private $_date;
    private $_heure;
    private $_termine;
    private $_nbMessages;
    
    public function __construct($data)
    {     
        $this->hydrate($data);
    }
    
    public function getId()
    {
        return $this->_id;
    }
    public function setId($id){
        $this->_id = $id;
        return $this;
    }
    
    public function getDate()
    {
        return $this->_date;
    }
    public function setDate($date){
        $this->_date = $date;
        return $this;
    }
    
    public function getHeure()
    {
        return $this->_heure;
    }
    public function setHeure($heure){
        $this->_heure = $heure;
        return $this;
    }
    
    public function getTermine()
    {
        return $this->_termine;
    }
    public function setTermine($termine){
        $this->_termine = $termine;
        return $this;
    }

    public function getNbMessages()
    {
        return $this->_nbMessages;
    }
    public function setNbMessages($nbMessages){
        $this->_nbMessages = $nbMessages;
        return $this;
    }
    
    
    public function hydrate($data)
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
