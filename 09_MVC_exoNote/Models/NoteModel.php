<?php

class NoteModel extends CoreModel {


    public function readAll()
    {
        try 
        {
            if(($req = $this->getDb()->query('SELECT id, titre, date, (SELECT nom FROM user WHERE id = user_id) AS auteur FROM note ')) !== false)
            {
                if($req->execute())
                {
                    $notes = $req->fetchAll(PDO::FETCH_ASSOC);
                    $req->closeCursor();
                    return $notes;
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
            if(($req = $this->getDb()->prepare('SELECT id, titre, texte, date FROM note WHERE id = :id')) !== false){
                
                if(($req->bindValue('id', $id)) !==false){
                    if($req->execute()){
                        $note = $req->fetch(PDO::FETCH_ASSOC);
                        $req->closeCursor();
                        return $note;
                    }
                }
            }
            return false;
        } catch(PDOException $e) 
        {
            die($e->getMessage());
        }
    }


    public function countNbNotes()
    {
        try
        {
            if(($req = $this->getDb()->prepare(' SELECT COUNT(id) AS nbNotes FROM note ')) !== false)
            {
                if($req->execute()){
                    $nbNotes = $req->fetch(PDO::FETCH_ASSOC);
                    $req->closeCursor();
                    return $nbNotes;
                }
            }
            return false;

        } catch(PDOException $e){
            die($e->getMessage());
        }

    }
}