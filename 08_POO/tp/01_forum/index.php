<?php 
require 'inc/head.php';
require 'lib/_helpers/tools.php';
require 'lib/functions.php';


try
{

    $conversationModel = new ConversationModel;
    $conversations = $conversationModel->readAll(); 
    ?>

    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>ID de la conversation</th>
                <th>Date de la conversation</th>
                <th>Heure de la conversation</th>
                <th>Nombre de messages</th>
                <th>Etat conversation</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($conversations as $conversation):?>
            <tr class="<?= ($conversation->getTermine() == 1) ? "closed" : "opened"; ?>">
                <th><?= $conversation->getId(); ?></th>
                <td><?= $conversation->getDate(); ?></td>
                <td><?= $conversation->getHeure(); ?></td>
                <td><?= $conversation->getNbMessages(); ?></td>
                <td><?= $conversation->getTermine(); ?></td>
                <td><a href="pageConversation.php?c_id=<?= $conversation->getId(); ?>">voir messages</a></td>
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