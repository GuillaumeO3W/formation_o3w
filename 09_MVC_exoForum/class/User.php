<?php

class User
{
    private $_id;
    private $_login;
    private $_prenom;
    private $_nom;
    private $_dateNaissance;
    private $_dateInscription;
    private $_rang;


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
    
    public function getLogin(): string
    {
        return $this->_login;
    }

    public function setLogin(string $login)
    {
        $this->_login = $login;
    }

    public function getPrenom(): string
    {
        return $this->_prenom;
    }

    public function setPrenom(string $prenom)
    {
        $this->_prenom = $prenom;
    }

    public function getNom(): string
    {
        return $this->_nom;
    }

    public function setNom(string $nom)
    {
        $this->_nom = $nom;
    }

    public function getDateNaissance(): string
    {
        return $this->_dateNaissance;
    }

    public function setDateNaissance(string $dateNaissance)
    {
        $this->_dateNaissance = $dateNaissance;
    }

    public function getDateInscription(): string
    {
        return $this->_dateInscription;
    }

    public function setDateInscription(string $dateInscription)
    {
        $this->_dateInscription = $dateInscription;
    }

    public function getRang(): string
    {
        return $this->_rang;
    }

    public function setRang(string $rang)
    {
        $this->_rang = $rang;
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