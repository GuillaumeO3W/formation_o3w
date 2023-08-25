<?php 
require 'inc/head.php';
require 'lib/_helpers/tools.php';
require 'lib/functions.php';

try
{

    $conversationModel = new ConversationModel;
    $conversationModel->readAll(); 


}
catch(PDOException $e)
{
    die($e->getMessage());
}

?>



<?php 
require 'inc/foot.php'; 
?>