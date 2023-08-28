<?php 
require 'inc/head.php';
require 'config/ini.php';
require 'lib/functions.php';
require 'lib/_helpers/tools.php';


if(!empty($_GET['c_id']))
{
    if(ctype_digit($_GET['c_id']))
    {
        $c_id=$_GET['c_id'];
    }
}
?>
<div class="container">
    <h1 class="title">Conversation n°<?= $c_id ?></h1>
    <a href="index.php">Retour à la liste des Conversations</a>

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
                        <td><?= $message->getAuteur(); ?></td>
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
</div>   

<?php 
require 'inc/foot.php'; 
?>