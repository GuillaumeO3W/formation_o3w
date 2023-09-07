<?php 

class MessageController 
{
    public function index()
    {

                $currentPage = 1;
        if(!empty($_GET['page']) && ctype_digit($_GET['page']))
        {
            $currentPage = $_GET['page'];
        }

        $pagination = PAGINATION;
        if(!empty($_GET['pagination']) && ctype_digit($_GET['pagination']))
        {
            $pagination = $_GET['pagination'];
        }

        $orderBy = 'date';
        if(!empty($_GET['orderBy']))
        {
            $orderBy = $_GET['orderBy'];
        }

        $order = 'DESC';
        if(!empty($_GET['order']))
        {
            $order = $_GET['order'];
        }



        isset($_GET['idConv']) ? $idConv = $_GET['idConv'] : $idConv = 1;
        $messageModel = new MessageModel;
        $datas = $messageModel->readAll($idConv, $pagination, $orderBy, $order);
        $messages =[];
        if(count($datas) > 0){
            foreach($datas as $data){
                $messages[] = new Message($data);
            }
        }
        $nbMsg = $messageModel->countNbMessage($idConv);
        include './Views/messages/index.php';
    }

}
?>
