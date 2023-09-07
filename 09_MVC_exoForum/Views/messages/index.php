<?php 
  require 'inc/head.php';
  
?>

<a href="index.php?ctrl=conversation&action=conversationsList" class="button is-dark ">Retour</a>
        <div class="section">
          <h1 class="title">Messages de la conversation n°<?= $_GET['idConv'] ?> </h1>
          <form action="" method="GET">
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Afficher</label>
              </div>
                <div class="field">
                  <div class="select" >
                    <input type="hidden" name="ctrl" value="message" >
                    <input type="hidden" name="action" value="index" >
                    <input type="hidden" name="idConv" value="<?= $_GET['idConv'] ?>" >
                    <select name="pagination">
                      <option <?= $pagination == 10 ? 'selected' : '' ?> value="10" >10</option>
                      <option <?= $pagination == 20 ? 'selected' : '' ?> value="20" >20</option>
                      <option <?= $pagination == 50 ? 'selected' : '' ?> value="50" >50</option>
                    </select>
                  </div>
                </div>
                <div class="field">
                  <div class="select">
                    <select name="orderBy">
                      <option <?= $orderBy == 'id' ? 'selected' : '' ?> value="id">ID</option>
                      <option <?= $orderBy == 'date' ? 'selected' : '' ?> value="date">Date</option>
                      <option <?= $orderBy == 'author' ? 'selected' : '' ?> value="author">Auteur</option>
                    </select>
                  </div>
                </div>
                <div class="field">
                  <div class="select">
                    <select name="order">
                      <option <?= $order == 'ASC' ? 'selected' : '' ?> value="ASC">Croissant</option>
                      <option <?= $order == 'DESC' ? 'selected' : '' ?> value="DESC">Décroissant</option>
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
                    <th>IdMessage</th>
                    <th><a href="?ctrl=message&action=index&idConv=<?= $_GET['idConv'] ?>&pagination=<?= $pagination ?>&orderBy=date&order=<?= $order === 'ASC' ? 'DESC' : 'ASC' ?>">Date</a></th>
                    <th>Heure</th>
                    <th><a href="?ctrl=message&action=index&idConv=<?= $_GET['idConv'] ?>&pagination=<?= $pagination ?>&orderBy=author&order=<?= $order === 'ASC' ? 'DESC' : 'ASC' ?>">Auteur</a></th>
                    <th>Message</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    foreach($messages as $msg) :
                ?>
                  <tr>
                    <td><?= $msg->getId() ?></td>
                    <td><?= $msg->getDate() ?></td>
                    <td><?= $msg->getHour() ?></td>
                    <td><?= $msg->getAuthor() ?></td>
                    <td><?= $msg->getMessage() ?></td>   
                  <tr>
                    <?php endforeach; ?>     
                </tbody>
              </table>
  
              <?php 
                  $pageTotales = ceil($nbMsg['nbMsg']/$pagination);
              ?>

              <nav class="pagination is-centered" >
                <a <?= ($currentPage > 1) ? 'href="?ctrl=message&action=index&idConv='. $_GET['idConv'].'&page='. $currentPage - 1 .'"' : '' ?> class="pagination-previous " <?= ($currentPage > 1) ? '' : 'disabled' ?> >Page précédente</a>
                <a <?= ($currentPage < $pageTotales) ? 'href="?ctrl=message&action=index&idConv='. $_GET['idConv'].'&page='. $currentPage + 1 .'"' : '' ?> class="pagination-next" <?= ($currentPage < $pageTotales) ? '' : 'disabled' ?>>Page suivante</a>
                <ul class="pagination-list">
                
                      <?php 
                        for($i = 1; $i <= $pageTotales; $i++){
                          if($i == $currentPage){
                            echo '<li><a class="pagination-link is-current">'.$i.'</a></li>';
                          }else{
                            echo '<li><a href="?ctrl=message&action=index&idConv='. $_GET['idConv'].'&page='.$i.'&order='.$_GET['order'].'&orderBy='.$_GET['orderBy'].'" class="pagination-link">'.$i.'</a></li>';
                          }
                        }
                    ?>
                </ul>
              </nav>
              
            </div>
          </div>
        </div>

<?php 
    require 'inc/foot.php'; 
?>