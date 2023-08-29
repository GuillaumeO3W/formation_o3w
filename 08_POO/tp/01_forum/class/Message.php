<?php

class Message
{
    private $_date;
    private $_heure;
    private $_auteur;
    private $_message;
    
    public function __construct($data)
    {     
        $this->hydrate($data);
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
    
    public function getAuteur()
    {
        return $this->_auteur;
    }
    public function setAuteur($auteur){
        $this->_auteur = $auteur;
        return $this;
    }

    public function getMessage()
    {
        return $this->_message;
    }
    public function setMessage($message){
        $this->_message = $message;
        return $this;
    }
    
    public function hydrate($data)
    {   
        // debug($data);
        foreach($data as $key => $value)
        {
            $methodName = 'set'. ucfirst($key);
            if(method_exists($this, $methodName))
            {
                $this->$methodName($value);
            }
        }
    }

}
?>