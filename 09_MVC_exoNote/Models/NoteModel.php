<?php

class VilleModel extends CoreModel {


    public function readAll()
    {
        try 
        {
            if(($req = $this->getDb()->query('SELECT v_id AS id, v_nom AS nom, v_superficie AS superficie FROM ville ')) !== false){
                if($req->execute()){
                    $villes = $req->fetchAll(PDO::FETCH_ASSOC);
                    $req->closeCursor();
                    return $villes;
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
            if(($req = $this->getDb()->prepare('SELECT v_id AS id, v_nom AS nom, v_superficie AS superficie FROM ville WHERE v_id = :id')) !== false){
                
                if(($req->bindValue('id', $id)) !==false){
                    if($req->execute()){
                        $ville = $req->fetch(PDO::FETCH_ASSOC);
                        $req->closeCursor();
                        return $ville;
                    }
                }
                
            }
            return false;

        } catch(PDOException $e) 
        {
            die($e->getMessage());
        }
    }


    public function countNbVilles()
    {
        try
        {
            if(($req = $this->getDb()->prepare(' SELECT COUNT(v_id) AS nbVilles FROM ville ')) !== false)
            {
                if($req->execute()){
                    $nbVilles = $req->fetch(PDO::FETCH_ASSOC);
                    $req->closeCursor();
                    return $nbVilles;
                }
            }
            return false;

        } catch(PDOException $e){
            die($e->getMessage());
        }

    }
}