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

!empty($_GET['pagination']) ? $pagination=$_GET['pagination'] :  $pagination=PAGINATION;
!empty($_GET['orderby']) ? $orderby=$_GET['orderby'] : $orderby="m_date";
!empty($_GET['order']) ? $order=$_GET['order'] : $order="ASC";


$page = (isset($_GET['page']) && !empty($_GET['page']) && ctype_digit($_GET['page'])) ? $_GET['page'] : 1;
$offset = ($page-1) * $pagination;


    try
    {
        $messageModel = new MessageModel;
        $messages = $messageModel->readAll($c_id,$pagination,$offset,$orderby,$order); 
        $totalMessages = $messages[0]["nbMessages"];
        $totalPages = ceil($totalMessages / $pagination);
    }
    catch(PDOException $e)
    { 
        die($e->getMessage());
    }
    if(!empty($messages)): ?>

        <a href="index.php" class="button is-dark ">Retour</a>
        <div class="section">
          <h1 class="title">Messages de la conversation n°<?= $c_id ?></h1>
          <form action="" method="GET">
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Afficher</label>
              </div>
                <div class="field">
                  <div class="select" >
                    <select name="pagination">
                      <option value="10" <?= $pagination == 10 ? "selected" : "" ;?> >10</option>
                      <option value="20" <?= $pagination == 20 ? "selected" : "" ;?> >20</option>
                      <option value="50" <?= $pagination == 50 ? "selected" : "" ;?>>50</option>
                    </select>
                  </div>
                </div>
                <div class="field">
                  <div class="select">
                    <select name="orderby">
                      <option value="id" <?= $orderby == "id" ? "selected" : "" ;?>>ID</option>
                      <option value="m_date" <?= $orderby == "m_date" ? "selected" : "" ;?>>Date</option>
                      <option value="auteur" <?= $orderby == "auteur" ? "selected" : "" ;?>>Auteur</option>
                    </select>
                  </div>
                </div>
                <div class="field">
                  <div class="select">
                    <select name="order">
                      <option  value="ASC" <?= $order == "ASC" ? "selected" : "" ;?>>Croissant</option>
                      <option  value="DESC" <?= $order == "DESC" ? "selected" : "" ;?>>Décroissant</option>
                    </select>
                  </div>
                </div>
                <div class="control">
                  <input type="hidden" name="c_id" value="<?= $c_id?>">
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
                      
                <?php   
                        
                        foreach($messages as $data):
                        $message = new Message($data); ?>
                        <tr>
                            <td><?= $message->getDate(); ?></td>
                            <td><?= $message->getHeure(); ?></td>
                            <td><?= $message->getAuteur(); ?></td>
                            <td><?= $message->getMessage(); ?></td>
                        </tr>
                <?php   endforeach; ?> 
                    </tbody>
                </table>

              <!-- PAGINATION -->

              <nav class="pagination is-centered" >
                <a href="?c_id=<?= $c_id ?>&page=<?= $page - 1 ?>&pagination=<?= $pagination ?>&order=<?= $order ?>&orderby=<?= $orderby ?>" class="pagination-previous" <?= $page<=1 ? "disabled" : "" ?>>Page précédente</a>
                <a href="?c_id=<?= $c_id ?>&page=<?= $page + 1 ?>&pagination=<?= $pagination ?>&order=<?= $order ?>&orderby=<?= $orderby ?>" class="pagination-next" <?= $page>=$totalPages? "disabled" : "" ?>>Page suivante</a>
                <ul class="pagination-list">

                <?php 
                
                  for($i = 1; $i <= $totalPages; $i++) :
                    if(($i==1) || (($i>=$page-3) && ($i<=$page+3)) || ($i==$totalPages)):
                ?>
                    <li>
                      <a class="pagination-link  <?= $i == $page ? 'is-current' : '' ?>" 
                          <?= ($i == $page+3) || ($i == $page-3) ? "disabled" : "href=\"?c_id=".$c_id."&page=".$i."&pagination=".$pagination."&order=".$order."&orderby=".$orderby."\""   ?>
                           >
                          <?= ($i == $page+3) || ($i == $page-3) ? "..." : $i  ?>
                      </a>
                    </li>
                <?php 
                    endif;
                  endfor; 
                ?>
                  <form action="" method="GET">
                    <div class="select">
                      <select name="page" id="">
                        <?php
                          for($i = 1; $i <= $totalPages; $i++) :
                            ?>
                              <option value="<?= $i ?>" <?= $i==$page ? "selected" : "" ?>><?= $i ?></option>
                            <?php
                          endfor; 
                        ?>
                      </select>
                    </div>
                      <input type="hidden" name="c_id" value="<?= $c_id?>">
                      <input type="submit" class="button" value="Go !">
                  </form>
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