<?php

class MessageModel extends CoreModel
{
    private $_req;
    private $_c_id;
    private $_pagination;
    private $_offset;
    private $_orderby;

    //Methode pour récupérer toutes les messages d'une conversation
    public function readAll($c_id,$pagination,$offset,$orderby,$order)
    {
          try
        {
            if(($this->_req = $this->getDb()->prepare('SELECT (SELECT COUNT(m_id)FROM message WHERE m_conversation_fk = :c_id) as nbMessages , m_id as id , m_contenu as message , DATE_FORMAT(m_date,"%d/%m/%Y") as date , DATE_FORMAT(m_date,"%H:%i:%s") as heure , CONCAT(u_prenom," ",u_nom) as auteur FROM message RIGHT JOIN user ON m_auteur_fk = u_id WHERE m_conversation_fk = :c_id ORDER BY '.$orderby.'  '.$order.' LIMIT :offset , :pagination ')) !==false)
            {
                $this->_req->bindValue('c_id', $c_id);
                $this->_req->bindValue('pagination', (int) $pagination, PDO::PARAM_INT);
                $this->_req->bindValue('offset', (int) $offset, PDO::PARAM_INT);
                // $this->_req->bindValue('orderby', (string) $orderby, PDO::PARAM_STR);

                if($this->_req->execute())
                {
                    $datas = $this->_req->fetchAll(PDO::FETCH_ASSOC);
                    $this->_req->closeCursor();
                    return $datas;
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