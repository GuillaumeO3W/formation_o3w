<?php

class MessageModel extends CoreModel
{

    private $_req;
    private $_id;

    //Methode pour récupérer toutes les messages d'une conversation'
    public function readAll($c_id)
    {
        try
        {
            if(($this->_req = $this->getDb()->prepare(
                'SELECT 
                (SELECT COUNT(m_id)FROM message WHERE m_conversation_fk = :c_id) as nbMessages,
                m_contenu, 
                DATE_FORMAT(m_date,"%d/%m/%Y") as m_date,
                DATE_FORMAT(m_date,"%H:%i:%s") as m_heure, 
                CONCAT(u_prenom," ",u_nom) as m_auteur 
                FROM message JOIN user ON m_auteur_fk = u_id 
                WHERE m_conversation_fk = :c_id
                ORDER BY m_date, m_heure
                LIMIT 10
                '
                )) !==false)
            {
                if($this->_req->bindValue('c_id', $c_id))
                {
                    if($this->_req->execute())
                    {
                        $datas = $this->_req->fetchAll(PDO::FETCH_ASSOC);
                        return $datas;
                        // debug($datas);
                        // echo $datas[0]["nbMessages"];
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