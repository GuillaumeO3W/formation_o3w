<?php 

class ConversationController 
{

    public function conversationsList()
    {
        $model = new ConversationModel;
        $datas = $model->readAll();
        $conversations = [];
        if(count($datas) > 0){
            foreach($datas as $data){
                $conversations[] = new Conversation($data);
            }
        }
        $title = 'ConversationsList';
        include './Views/conv/conversationsList.php';
    }

    public function conversationView()
    {
        isset($_GET['idConv']) ? $_GET['idConv'] = $_GET['idConv'] : $_GET['idConv'] = 1;
        $conversationModel = new ConversationModel;
        $datas = $conversationModel->readOne($_GET['idConv']);
        $conversation =[];
        if(count($datas) > 0){
            foreach($datas as $data){
                $conversation[] = new Message($data);
            }
        }
        include './Views/conv/conversationView.php';
    }
}