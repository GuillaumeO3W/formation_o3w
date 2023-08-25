<?php 

class UserModel {

    private $_db;
    private $_req;

    public function __construct()
    {
        try{
            $this->_db = new PDO('mysql:host=localhost;dbname=administration;charset=utf8mb4', 'root', '', [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function __destruct()
    {
        if(!empty($this->_req)){
            $this->_req->closeCursor();
        }
    }

    # Methode pour récupérer tous les utilisateurs
    public function readAll(){

        try{
            
            if(($this->_req = $this->_db->query('SELECT use_id, use_login, use_role, rol_libelle FROM user JOIN role ON use_role = rol_id')) !== false){
                if($this->_req->execute()){
                    $datas = $this->_req->fetchAll(PDO::FETCH_ASSOC);
                    # On parcours le tableau associatif pour transformer chaque user en objet de la classe User 
                    foreach($datas as $user){
                        # au moment de l'instanciation de User on enregristre les données dans chaque variable de l'objet User
                        $users[] = new User($user);
                    }
                    return $users;
                }
            }
            return false;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    # Methode pour récupérer un seul utilisateur
    public function readOne($id){
                try{
            if(($this->_req = $this->_db->prepare('SELECT use_id, use_login, use_role, rol_libelle FROM user JOIN role ON use_role = rol_id WHERE use_id=:id')) !== false){
                if($this->_req->bindValue('id', $id)){
                    if($this->_req->execute()){
                        $datas = $this->_req->fetch(PDO::FETCH_ASSOC);
                        return new User($datas);
                    }
                }
        }
            return false;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }



}