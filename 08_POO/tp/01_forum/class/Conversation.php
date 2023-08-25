<?php

class Conversation
{
    private $_id;
    private $_date;
    private $_termine;
    
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
    
    public function getTermine()
    {
        return $this->_termine;
    }
    public function setTermine($termine){
        $this->_termine = $termine;
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
