<?php 
require 'inc/head.php';
require 'config/ini.php';
require 'lib/functions.php';
require 'lib/_helpers/tools.php';

try
{
    $conversationModel = new ConversationModel;
    $conversations = $conversationModel->readAll(); 
}
catch(PDOException $e)
{
    die($e->getMessage());
}
?>
<div class="section">
    <h1 class="title">Liste des conversations</h1>
    <a href="userList.php">Liste des utilisateurs</a>
    <div class="card is-shadowless">
        <div class="card-content">

        <?php if(!empty($conversations)) :?>

            <table class="table is-hoverable is-fullwidth">
                <thead>
                    <tr>
                        <th>Id Conv</th>
                        <th>Date Conv</th>
                        <th>Heure Conv</th>
                        <th>Nb Messages Conv</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($conversations as $data):
                        $conversation = new Conversation($data);
                ?>
                        <tr class="<?= (!$conversation->getTermine()) ? '' : 'has-background-danger'; ?>">
                            <th><?= $conversation->getId(); ?></th>
                            <td><?= $conversation->getDate(); ?></td>
                            <td><?= $conversation->getHeure(); ?></td>
                            <td><?= $conversation->getNbMessages(); ?></td>
                            <td><a href="pageConversation.php?c_id=<?= $conversation->getId(); ?>">voir messages</a></td>
                        </tr>
    
                <?php
                    endforeach; 
                ?>
                </tbody>
            </table>
        <?php
            else: 
        ?>
                <p>Aucune conversation</p>
        <?php
            endif
        ?>
    </div>
    </div>
</div>

<?php 
require 'inc/foot.php'; 
?>