<?php

class MessageModel extends CoreModel
{
    public function readAll( int $idConv, int $pagination = 20, int $start = 0, string $orderBy = 'date', string $order = 'DESC')
    {

        # Au cas ou quelqu'un modifirait la value de l'option 
        if(strtoupper($order) !='ASC' && strtoupper($order) != 'DESC'){
            $order = 'DESC';
        }

        # On gere avec un switch pour pouvoir creer une variable unique qui contiendra le $orderBy et le $order afin de simlpifier l'écriture de la requete pour qu'il y est qu'une seul concatenation 
        switch($orderBy){
            case 'id':
                $orderBy = 'id ' . $order;
                break;
            case 'author':
                // $orderBy = 'u_nom ' . $order . ', u_prenom ' . $order;
                $orderBy = 'author ' . $order;
                # exemple de ce que ça peut donner 'author DESC' pour pouvoir avoir ORDER BY author DESC
                break;
            default: 
                $orderBy = 'm_date ' . $order;
        }


        try
        {
            if(($req = $this->getDb()->prepare('SELECT m_id AS id, DATE_FORMAT(m_date, "%d/%m/%Y") AS date, DATE_FORMAT(m_date, "%T") AS hour,  CONCAT(u_nom," ", u_prenom) AS author, m_contenu AS message, ( SELECT COUNT(m_id) FROM message WHERE m_conversation_fk = :idConv ) AS nbMsg FROM message RIGHT JOIN user ON m_auteur_fk = u_id WHERE m_conversation_fk = :idConv ORDER BY '. $orderBy .' LIMIT :start , :pagination')) !== false)
            {
                # Attention pour les marqueurs du LIMIT il faut spécifier le PDO::PARAM_INT pour etre sur d'avoir des entiers
                if($req->bindValue('idConv', $idConv) && $req->bindValue(':start', $start, PDO::PARAM_INT) && $req->bindValue(':pagination', $pagination, PDO::PARAM_INT)){
                    if($req->execute()){
                        $messages = $req->fetchAll(PDO::FETCH_ASSOC);
                        $req->closeCursor();
                        return $messages;
                    }

                }
            }

            return false;

        } catch(PDOException $e){
            die($e->getMessage());
        }


    }

    public function countNbMessage($idConv)
    {
        try
        {
            if(($req = $this->getDb()->prepare(' SELECT COUNT(m_id) AS nbMsg FROM message WHERE m_conversation_fk = :idConv   ')) !== false)
            {
                if($req->bindValue('idConv', $idConv))
                {
                    if($req->execute()){
                        $nbMsg = $req->fetch(PDO::FETCH_ASSOC);
                        $req->closeCursor();
                        return $nbMsg;
                    }
                }
            }
            return false;
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }
}