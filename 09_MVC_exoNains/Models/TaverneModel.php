<?php

class TaverneModel extends CoreModel {


    public function readAll()
    {
        try 
        {
            if(($req = $this->getDb()->query('SELECT t_id AS id, t_nom AS nom, t_chambres AS chambres FROM taverne ')) !== false){
                if($req->execute()){
                    $tavernes = $req->fetchAll(PDO::FETCH_ASSOC);
                    $req->closeCursor();
                    return $tavernes;
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
            if(($req = $this->getDb()->prepare('SELECT t_id AS id, t_nom AS nom, t_chambres AS chambres, t_blonde AS blonde, t_brune AS brune, t_rousse AS rousse, v_nom AS ville FROM taverne LEFT JOIN ville ON t_ville_fk = v_id WHERE t_id = :id')) !== false){
                
                if(($req->bindValue('id', $id)) !==false){
                    if($req->execute()){
                        $taverne = $req->fetch(PDO::FETCH_ASSOC);
                        $req->closeCursor();
                        return $taverne;
                    }
                }
            }
            return false;

        } catch(PDOException $e) 
        {
            die($e->getMessage());
        }
    }


    public function countNbTavernes()
    {
        try
        {
            if(($req = $this->getDb()->prepare(' SELECT COUNT(t_id) AS nbTavernes FROM taverne ')) !== false)
            {
                if($req->execute()){
                    $nbTavernes = $req->fetch(PDO::FETCH_ASSOC);
                    $req->closeCursor();
                    return $nbTavernes;
                }
            }
            return false;

        } catch(PDOException $e){
            die($e->getMessage());
        }
    }
}