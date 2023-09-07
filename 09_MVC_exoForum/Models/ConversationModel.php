<?php
class ConversationModel extends CoreModel
{
    public function readAll()
    {
        try 
        {
            if(($req = $this->getDb()->query('SELECT c_id AS id, DATE_FORMAT(c_date, "%d/%m/%Y") AS date, DATE_FORMAT(c_date, "%T") AS hour, c_termine AS status, COUNT(m_id) AS nbMsg 
            FROM conversation 
            LEFT JOIN message ON c_id = m_conversation_fk 
            GROUP BY c_id')) !== false)
            {
                if($req->execute())
                {
                    $conversations = $req->fetchAll(PDO::FETCH_ASSOC);
                    $req->closeCursor();
                    return $conversations;
                }
            }
            return false;
        } catch(PDOException $e) 
        {
            die($e->getMessage());
        }
    }
}