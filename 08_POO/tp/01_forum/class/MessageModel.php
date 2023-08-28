<?php

class MessageModel extends CoreModel
{
    // private $_db;
    private $_req;
    private $_id;

    // public function __construct()
    // {
    //     try
    //     {
    //         $this->_db = new PDO('mysql:host=localhost;dbname=forum;charset=utf8mb4','root','',[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
    //     }
    //     catch(PDOException $e)
    //     {
    //         die($e->getMessage());
    //     }
    // }

    public function __destruct()
    {
        if(!empty($this->_req))
        {
            $this->_req->closeCursor();
        }
    }

    //Methode pour récupérer toutes les messages d'une conversation'
    public function readAll($c_id)
    {
        try
        {
            if(($this->_req = $this->getDb()->prepare('SELECT (SELECT COUNT(m_id)  FROM message WHERE m_conversation_fk = :c_id) as nbMessages,m_contenu, DATE_FORMAT(m_date,"%d/%m/%Y") as m_date,DATE_FORMAT(m_date,"%H:%i:%s") as m_heure, CONCAT(u_prenom," ",u_nom) as m_auteur FROM message JOIN user ON m_auteur_fk = u_id WHERE m_conversation_fk = :c_id')) !==false)
            {
                if($this->_req->bindValue('c_id', $c_id))
                {
                    if($this->_req->execute())
                    {
                        $datas = $this->_req->fetchAll(PDO::FETCH_ASSOC);
                        // debug($datas);
                        // echo $datas[0]["nbMessages"];
                        if($datas[0]["nbMessages"]>1)
                        {
                            foreach($datas as $message)
                            {
                                $messages[]= new Message($message);

                            }
                            return $messages;
                        }else{
                            header('location: erreur404.php');
                        }
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