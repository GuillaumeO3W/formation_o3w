<?php

class GroupeModel extends CoreModel 
{

    public function readAll()
    {
        try 
        {
            if(($req = $this->getDb()->query('SELECT g_id AS id, g_debuttravail AS debut, g_fintravail AS fin , g_taverne_fk AS taverneId, g_tunnel_fk AS tunnel  FROM groupe')) !== false){
                if($req->execute()){
                    $groupes = $req->fetchAll(PDO::FETCH_ASSOC);
                    $req->closeCursor();
                    return $groupes;
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
            if(($req = $this->getDb()->prepare('SELECT g_id AS id, g_debuttravail AS debut, g_fintravail AS fin , t_nom AS taverne, g_tunnel_fk AS tunnel FROM groupe LEFT JOIN taverne ON g_taverne_fk = t_id WHERE g_id = :id')) !== false){
                
                if(($req->bindValue('id', $id)) !==false){
                    if($req->execute()){
                        $groupe = $req->fetch(PDO::FETCH_ASSOC);
                        $req->closeCursor();
                        return $groupe;
                    }
                }
            }
            return false;

        } catch(PDOException $e) 
        {
            die($e->getMessage());
        }
    }


    public function countNbGroupes()
    {
        try
        {
            if(($req = $this->getDb()->prepare(' SELECT COUNT(g_id) AS nbGroupes FROM groupe ')) !== false)
            {
                if($req->execute()){
                    $nbGroupes = $req->fetch(PDO::FETCH_ASSOC);
                    $req->closeCursor();
                    return $nbGroupes;
                }
            }
            return false;

        } catch(PDOException $e){
            die($e->getMessage());
        }
    }
}