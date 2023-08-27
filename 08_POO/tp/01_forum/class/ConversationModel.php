<?php

class ConversationModel
{
    private $_db;
    private $_req;

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

    //Methode pour récupérer toutes les conversations du Forum
    public function readAll()
    {
        try
        {
            if(($this->_req=$this->_db->query('SELECT c_id, DATE_FORMAT(c_date,"%d/%m/%Y") as c_date,DATE_FORMAT(c_date,"%H:%i:%s") as c_heure, c_termine,COUNT(m_id) as m_nbMessages FROM conversation LEFT JOIN message ON c_id = m_conversation_fk GROUP BY c_id ORDER BY c_id')) !==false)
            {
                if($this->_req->execute())
                {
                    $datas = $this->_req->fetchAll(PDO::FETCH_ASSOC);
                    // debug($datas);
                    foreach($datas as $conversation)
                    {
                        $conversations[]= new Conversation($conversation);
                    }
                    return $conversations;
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