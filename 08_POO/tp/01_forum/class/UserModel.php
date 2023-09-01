<?php

class UserModel extends CoreModel
{
    private $_req;
    private $_pagination;
    private $_offset;
    private $_orderby;

    //Methode pour récupérer tous les utilisateurs du forum
    public function readAll($orderby,$order,int $pagination,int $offset)
    {
          try
        {
            if(($req = $this->getDb()->prepare('SELECT(SELECT COUNT(u_id) FROM user) AS nbUsers, u_id AS id , u_login AS login, CONCAT(u_prenom," ",u_nom) AS user, DATE_FORMAT(u_date_naissance,"%d/%m/%Y") AS birthDate , DATE_FORMAT(u_date_inscription,"%d/%m/%Y") AS registrationDate FROM user LIMIT :offset , :pagination')) !==false)
            {
                if( $req->bindValue(':pagination', $pagination, PDO::PARAM_INT) && $req->bindValue(':offset', $offset, PDO::PARAM_INT))
                {
                    if($req->execute())
                    {
                        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
                        $req->closeCursor();
                        return $datas;
                    }
                }
            }
            return false;
        }
        catch(PDOException $e)
        {
            die($e->getMessage());
        }
    }


    //Methode pour récupérer tous les utilisateurs du forum
    public function readOne($id)
    {
          try
        {
            if(($req = $this->getDb()->prepare('SELECT u_id AS id , u_login AS login, CONCAT(u_prenom," ",u_nom) AS user, DATE_FORMAT(u_date_naissance,"%d/%m/%Y") AS birthDate , DATE_FORMAT(u_date_inscription,"%d/%m/%Y") AS registrationDate FROM user WHERE u_id = :id')) !==false)
            {

                if( $req->bindValue(':id', $id, PDO::PARAM_INT))
                {
                    if($req->execute())
                    {
                        $datas = $req->fetch(PDO::FETCH_ASSOC);
                        $req->closeCursor();
                        return $datas;
                    }
                }
            }
            return false;
        }
        catch(PDOException $e)
        {
            die($e->getMessage());
        }
    }
}

?>