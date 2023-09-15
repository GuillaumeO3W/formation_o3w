<?php
class User
{
    private $_id;
    private $_nom;
    private $_email;
    private $_mdp;



    public function __construct(array $data)
    {
        $this->hydrate($data);
    }
////////////////////////////////////////////////////   ID    
    public function getId(): int
    {
        return $this->_id;
    }

    public function setId(int $id)
    {
        $this->_id = $id;
    }

//////////////////////////////////////////////////     NOM     
    public function getNom(): string
    {
        return $this->_Nom;
    }

    public function setNom(string $nom)
    {
        $this->_Nom = $nom;
    }

//////////////////////////////////////////////////     EMAIL     

    public function getEmail(): string
    {
        return $this->_Email;
    }

    public function setEmail(null | string $email)
    {
        $this->_Email = $email;
    }

//////////////////////////////////////////////////     MDP            
    public function getMdp(): string
    {
        return $this->_Mdp;
    }

    public function seMdp(string $mdp)
    {
        $this->_Mdp= $mdp;
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