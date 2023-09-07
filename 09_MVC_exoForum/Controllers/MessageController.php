<?php 

class MessageController 
{
    public function index()
    {
        isset($_GET['idConv']) ? $_GET['idConv'] = $_GET['idConv'] : $_GET['idConv'] = 1;
        $messageModel = new MessageModel;
        $datas = $messageModel->readAll($_GET['idConv']);
        $messages =[];
        if(count($datas) > 0){
            foreach($datas as $data){
                $messages[] = new Message($data);
            }
        }
        include './Views/messages/index.php';
    }

}
?>
