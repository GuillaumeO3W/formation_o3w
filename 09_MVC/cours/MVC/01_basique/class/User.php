<?php

class User{


    private $_id;
    private $_login;
    private $_mdp;
    private $_role;
    private $_roleLabel;

    # A l'intanciation lance la méthode hydrate
    public function __construct($data)
    {
        $this->hydrate($data);
    }


    public function getId(){
        return $this->_id;
    }

    public function setId($id){
        $this->_id = $id;
        return $this;
    }

    public function getLogin(){
        return $this->_login;
    }

    public function setLogin($login){
        $this->_login = $login;
        return $this;
    }

    public function getMdp(){
        return $this->_mdp;
    }

    public function setMdp($mdp){
        $this->_mdp = $mdp;
        return $this;
    }

    public function getRole(){
        return $this->_role;
    }

    public function setRole($role){
        $this->_role = $role;
        return $this;
    }

    public function getLibelle(){
        return $this->_roleLabel;
    }

    public function setLibelle($roleLabel){
        $this->_roleLabel = $roleLabel;
        return $this;
    }

    # Automatise le processus des setters c'est à dire qu'il enregistre dans chaque proprièté les valeurs transmises lors de l'instanciation
    public function hydrate($data){

        foreach($data as $key => $value){

            # on vient stocker dans une  variable la chaine de caratère qui correspondra au nom de la methode pour setter pour automatiser l'appel des setter pour enregistrer les données dans les bonnes propriètés
            $methodName = 'set'. ucfirst(substr($key, 4, strlen($key)-4));
            
            # cas ou pas de prefixe sur les cles
            // $methodName = 'set'. ucfirst($key);

            if(method_exists($this, $methodName)){
                $this->$methodName($value);
                # $this->setLogin()
            }

        }

    }

}