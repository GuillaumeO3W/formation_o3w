<?php

class User
{
    private $_id;
    private $_login;
    private $_user;
    private $_birthDate;
    private $_registrationDate;
    
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

    public function getLogin()
    {
        return $this->_login;
    }
    public function setLogin($login){
        $this->_login = $login;
        return $this;
    }

    public function getUser()
    {
        return $this->_user;
    }
    public function setDate($user){
        $this->_user = $user;
        return $this;
    }

    public function getBirthDate()
    {
        return $this->_birthDate;
    }
    public function setBirthDate($birthDate){
        $this->_birthDate = $birthDate;
        return $this;
    }

    public function getRegistrationDate()
    {
        return $this->_registrationDate;
    }
    public function setRegistrationDate($registrationDate){
        $this->_registrationDate = $registrationDate;
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