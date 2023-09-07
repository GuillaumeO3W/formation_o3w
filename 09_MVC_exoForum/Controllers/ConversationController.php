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


}