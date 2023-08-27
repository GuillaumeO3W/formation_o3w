<?php

class MessageModel
{
    private $_db;
    private $_req;
    private $_id;

    public function __construct()
    {
        try
        {
            $this->_db = new PDO('mysql:host=localhost;dbname=forum;charset=utf8mb4','root','',[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
        }
        catch(PDOException $e)
        {
            die($e->getMessage());
        }
    }

    public function __destruct()
    {
        if(!empty($this->_req))
        {
            $this->_req->closeCursor();
        }
    }

    //Methode pour récupérer toutes les mesages d'une conversation'
    public function readAll($c_id)
    {
        try
        {
            if(($this->_req=$this->_db->prepare('SELECT m_id,m_contenu, m_auteur_fk, DATE_FORMAT(m_date,"%d/%m/%Y") as m_date,DATE_FORMAT(m_date,"%H:%i:%s") as m_heure FROM message WHERE m_conversation_fk = :c_id')) !==false)
            {
                if($this->_req->bindValue('c_id', $c_id))
                {
                    if($this->_req->execute())
                    {
                        $datas = $this->_req->fetchAll(PDO::FETCH_ASSOC);
                        // debug($datas);
                        foreach($datas as $message)
                        {
                            $messages[]= new Message($message);
                        }
                        return $messages;
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