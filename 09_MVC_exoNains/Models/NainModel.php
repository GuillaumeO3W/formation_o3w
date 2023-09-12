<?php

class NainModel extends CoreModel {

    public function readAll()
    {
        try 
        {
            if(($req = $this->getDb()->query('SELECT n_id AS id, n_nom AS nom FROM nain ')) !== false)
            {
                if($req->execute())
                {
                    $nains = $req->fetchAll(PDO::FETCH_ASSOC);
                    $req->closeCursor();
                    return $nains;
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
            if(($req = $this->getDb()->prepare(
                'SELECT n_id AS id,
                    n_nom AS nom,
                    n_barbe AS barbe,
                    g_id AS groupe,
                    v_id,
                    v_nom AS ville,
                    t_id,
                    t_nom AS taverne,
                    g_debuttravail AS debut,
                    g_fintravail AS fin,
                        (SELECT v_nom FROM ville
                        LEFT JOIN tunnel ON v_id = t_villedepart_fk
                        LEFT JOIN groupe ON tunnel.t_id = g_tunnel_fk
                        WHERE g_id = groupe) AS depart,
                        (SELECT v_nom FROM ville
                        LEFT JOIN tunnel ON v_id = t_villearrivee_fk
                        LEFT JOIN groupe ON tunnel.t_id = g_tunnel_fk
                        WHERE g_id = groupe) AS arrivee
                        
                    FROM nain 
                    LEFT JOIN ville ON n_ville_fk = v_id 
                    LEFT JOIN groupe ON n_groupe_fk = g_id 
                    LEFT JOIN taverne ON taverne.t_id = g_taverne_fk 
                    WHERE n_id = :id')) !== false)
                // 'SELECT n_id AS id,
                //     n_nom AS nom,
                //     n_barbe AS barbe,
                //     g_id AS groupe,
                //     v_id,
                //     v_nom AS ville,
                //     t_id,
                //     t_nom AS taverne,
                //     g_debuttravail AS debut,
                //     g_fintravail AS fin 
                //     FROM nain 
                //     LEFT JOIN ville ON n_ville_fk = v_id 
                //     LEFT JOIN groupe ON n_groupe_fk = g_id 
                //     LEFT JOIN taverne ON t_id = g_taverne_fk 
                //     WHERE n_id = :id')) !== false)
            {
                
                if(($req->bindValue('id', $id)) !==false)
                {
                    if($req->execute())
                    {
                        $nain = $req->fetch(PDO::FETCH_ASSOC);
                        $req->closeCursor();
                        return $nain;
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

    public function countNbNains()
    {
        try
        {
            if(($req = $this->getDb()->prepare(' SELECT COUNT(n_id) AS nbNains FROM nain ')) !== false)
            {
                if($req->execute())
                {
                    $nbNains = $req->fetch(PDO::FETCH_ASSOC);
                    $req->closeCursor();
                    return $nbNains;
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