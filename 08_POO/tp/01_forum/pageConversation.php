<?php
require 'inc/head.php';
require 'lib/_helpers/tools.php';
require 'lib/functions.php';


if(!empty($_GET['c_id']))
{
    if(ctype_digit($_GET['c_id']))
    {
        $c_id=$_GET['c_id'];
    }
}
?>
<h1 class="title">Conversation n°<?= $c_id ?></h1>
<a href="index.php">Retour à la liste de Conversations</a>

<?php
try
{

    $messageModel = new MessageModel;
    $messages = $messageModel->readAll($c_id); 
    ?>

    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>Date du message</th>
                <th>Heure du message</th>
                <th>Auteur</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($messages as $message):?>
            <tr>
                <td><?= $message->getDate(); ?></td>
                <td><?= $message->getHeure(); ?></td>
                <td><?= $message->getAuteur_fk(); ?></td>
                <td><?= $message->getContenu(); ?></td>
            </tr>
        <?php   endforeach; ?>
        </tbody>
    </table>    
        
    <?php


}
catch(PDOException $e)
{
    die($e->getMessage());
}

?>


<?php 
require 'inc/foot.php'; 
?>