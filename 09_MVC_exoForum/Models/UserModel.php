<?php

class UserModel extends CoreModel {


    public function readAll()
    {
        try 
        {
            if(($req = $this->getDb()->query('SELECT u_id AS id, u_login AS login, u_date_inscription AS dateInscription FROM user LIMIT 20 ')) !== false){
                if($req->execute()){
                    $users = $req->fetchAll(PDO::FETCH_ASSOC);
                    $req->closeCursor();

                    return $users;
                }
            }
            return false;

        } catch(PDOException $e) 
        {
            die($e->getMessage());
        }

    }
    public function readOne(int $id)
    {
        try 
        {
            if(($req = $this->getDb()->prepare('SELECT u_id AS id, u_login AS login, u_prenom AS prenom, u_nom AS nom, DATE_FORMAT(u_date_naissance, "%d/%m/%Y") AS dateNaissance, u_date_inscription AS dateInscription , r_libelle AS rang FROM user LEFT JOIN rang ON u_rang_fk = r_id WHERE u_id = :id')) !== false){
                
                if(($req->bindValue('id', $id)) !==false){
                    if($req->execute()){
                        $user = $req->fetch(PDO::FETCH_ASSOC);
                        $req->closeCursor();
    
                        return $user;
                        // return json_encode($user);
                    }
                }
                
            }
            return false;

        } catch(PDOException $e) 
        {
            die($e->getMessage());
        }

    }


    public function countNbUsers()
    {

        try
        {
            if(($req = $this->getDb()->prepare(' SELECT COUNT(u_id) AS nbUsers FROM user ')) !== false)
            {
                
                if($req->execute()){
                    $nbUsers = $req->fetch(PDO::FETCH_ASSOC);
                    $req->closeCursor();
                    return $nbUsers;
                }

            }
            

            return false;

        } catch(PDOException $e){
            die($e->getMessage());
        }

    }


}