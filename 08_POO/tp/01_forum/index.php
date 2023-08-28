<?php 
require 'inc/head.php';
require 'config/ini.php';
require 'lib/functions.php';
require 'lib/_helpers/tools.php';
?>

<div class="container">
    
<?php
    try
    {
        $conversationModel = new ConversationModel;
        $conversations = $conversationModel->readAll(); 
    }
    catch(PDOException $e)
    {
        die($e->getMessage());
    }
        
    if(!empty($conversations)): 
?>
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>ID de la conversation</th>
                    <th>Date de la conversation</th>
                    <th>Heure de la conversation</th>
                    <th>Nombre de messages</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($conversations as $data):
                $conversation = new Conversation($data);?>
                <tr class="<?= (!$conversation->getTermine()) ? '' : 'has-background-danger'; ?>">
                    <th><?= $conversation->getId(); ?></th>
                    <td><?= $conversation->getDate(); ?></td>
                    <td><?= $conversation->getHeure(); ?></td>
                    <td><?= $conversation->getNbMessages(); ?></td>
                    <td><a href="pageConversation.php?c_id=<?= $conversation->getId(); ?>">voir messages</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>    

    <?php else: ?>
        <p>Aucune conversation</p>
    <?php endif; ?>

</div>   

<?php 
require 'inc/foot.php'; 
?>