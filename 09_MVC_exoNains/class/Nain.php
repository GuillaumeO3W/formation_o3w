<?php
class Nain
{
    private $_id;
    private $_nom;


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
    
    public function getNom(): string
    {
        return $this->_login;
    }

    public function setNom(string $login)
    {
        $this->_login = $login;
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