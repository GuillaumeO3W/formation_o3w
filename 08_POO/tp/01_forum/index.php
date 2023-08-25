<?php 
require 'inc/head.php';
require 'lib/_helpers/tools.php';
require 'lib/functions.php';
require 'class/ConversationModel.php';
require 'class/Conversation.php';

try
{

    $conversationModel = new ConversationModel;
    $conversationModel->readAll(); 
    foreach($conversations as $conversation):
        echo $conversation->getId();
        echo $conversation->getDate();
        echo $conversation->getTermine();


    endforeach;

}
catch(PDOException $e)
{
    die($e->getMessage());
}

?>



<?php 
require 'inc/foot.php'; 
?>