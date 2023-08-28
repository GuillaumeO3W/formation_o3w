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

if(!empty($_POST['pagination']))
{
    $messagePerPage=$_POST['pagination'];
}
else
{
    $messagePerPage=10;
}

?>

    <?php
    try
    {
        $messageModel = new MessageModel;
        $messages = $messageModel->readAll($c_id,$messagePerPage);  
    }
    catch(PDOException $e)
    {
        die($e->getMessage());
    }
    if(!empty($messages)): ?>

        <a href="index.php" class="button is-dark ">Retour</a>
        <div class="section">
          <h1 class="title">Messages de la conversation n°<?= $c_id ?></h1>
          <form action="" method="POST">
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Afficher</label>
              </div>
                <div class="field">
                  <div class="select" >
                    <select name="pagination">
                      <option value="10">10</option>
                      <option value="20">20</option>
                      <option value="50">50</option>
                    </select>
                  </div>
                </div>
                <div class="field">
                  <div class="select">
                    <select name="orderby">
                      <option value="id">ID</option>
                      <option value="date">Date</option>
                      <option value="author">Auteur</option>
                    </select>
                  </div>
                </div>
                <div class="field">
                  <div class="select">
                    <select name="order">
                      <option  value="ASC">Croissant</option>
                      <option  value="DESC">Décroissant</option>
                    </select>
                  </div>
                </div>
                <div class="control">
                  <button class="button is-dark" type="submit">Trier</button>
                </div>
            </div>
          </form>

          <div class="card is-shadowless">
            <div class="card-content">
            
                <table class="table is-hoverable is-fullwidth">
                    <thead>
                        <tr>
                            <th><a href="">Date</a></th>
                            <th>Heure</th>
                            <th><a href="">Auteur</a></th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php   foreach($messages as $data):
                        $message = new Message($data);?>
                        <tr>
                            <td><?= $message->getDate(); ?></td>
                            <td><?= $message->getHeure(); ?></td>
                            <td><?= $message->getAuteur(); ?></td>
                            <td><?= $message->getContenu(); ?></td>
                        </tr>
                <?php   endforeach; ?> 
                    </tbody>
                </table>

              <!-- PAGINATION -->

              <?php

                $totalMessages = $messages[0]['nbMessages'];
                $totalPages = ceil($totalMessages / $messagePerPage);
                $currentMessagesPage = (isset($_GET['page']) && !empty($_GET['page'])) ? $_GET['page'] : 1;

              ?>
              <nav class="pagination is-centered" >
                <a href="?c_id=<?= $c_id ?>&page=<?= $currentMessagesPage - 1 ?>" class="pagination-previous">Page précédente</a>
                <a href="?c_id=<?= $c_id ?>&page=<?= $currentMessagesPage + 1 ?>" class="pagination-next">Page suivante</a>
                <ul class="pagination-list">
                <?php for($i = 1; $i <= $totalPages; $i++) : ?>
                    <li><a class="pagination-link <?= $i == $currentMessagesPage ? 'is-current' : '' ?>" href="?c_id=<?= $c_id ?>&page=<?= $i ?>"><?= $i ?></a></li>
                <?php endfor; ?>
                </ul>
              </nav>
            </div>
          </div>
        </div>
<?php 
    else: 
        header('location: erreur404.php');
        exit;
    endif; ?>

<?php 
require 'inc/foot.php'; 
?>