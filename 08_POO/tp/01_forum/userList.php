<?php

require 'inc/head.php';
require 'config/ini.php';
require 'lib/functions.php';
require 'lib/_helpers/tools.php';

!empty($_GET['pagination']) ? $pagination=$_GET['pagination'] :  $pagination=PAGINATION;
!empty($_GET['orderby']) ? $orderby=$_GET['orderby'] : $orderby="id";
!empty($_GET['order']) ? $order=$_GET['order'] : $order="ASC";

$page = (isset($_GET['page']) && !empty($_GET['page']) && ctype_digit($_GET['page'])) ? $_GET['page'] : 1;
$offset = ($page-1) * $pagination;


    try
    {
        $userModel = new UserModel;
        $users = $userModel->readAll($orderby,$order,$pagination,$offset); 
        // echo $pagination;
        // debug($users); exit;
        $totalUsers = $users[0]["nbUsers"];
        $totalPages = ceil($totalUsers / $pagination);
    }
    catch(PDOException $e)
    { 
        die($e->getUser());
    }
    if(!empty($users)): ?>

<a href="index.php" class="button is-dark ">Retour</a>
        <div class="section">
          <h1 class="title">Liste des Utilisateurs du forum</h1>
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
                      <option value="auteur" <?= $orderby == "auteur" ? "selected" : "" ;?>>Nom utilisateur</option>
                      <option value="m_date" <?= $orderby == "birthDate" ? "selected" : "" ;?>>Date inscription</option>
                      <option value="m_date" <?= $orderby == "registrationDate" ? "selected" : "" ;?>>Date de naissance</option>
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
                  <button class="button is-dark" type="submit">Trier</button>
                </div>
            </div>
          </form>

          <div class="card is-shadowless">
            <div class="card-content">
            
                <table class="table is-hoverable is-fullwidth">
                    <thead>
                        <tr>
                            <th><a href="">id</a></th>
                            <th><a href="">Login</a></th>
                            <th>Nom</th>
                            <th>date de naissance</th>
                            <th>date d'inscription</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                <?php   
                        
                        foreach($users as $data):
                        $user = new User($data); ?>
                        <tr>
                            <td><?= $user->getId(); ?></td>
                            <td><?= $user->getLogin(); ?></td>
                            <td><?= $user->getUser(); ?></td>
                            <td><?= $user->getBirthDate(); ?></td>
                            <td><?= $user->getregistrationDate(); ?></td>
                            <td><a href="userPage.php?id=<?= $user->getId(); ?>" ><span class="icon"><i class="fas fa-eye"></i></span></a></td>
                        </tr>
                <?php   endforeach; ?> 
                    </tbody>
                </table>
                       <!-- PAGINATION -->

              <nav class="pagination is-centered" >
                <a href="?page=<?= $page - 1 ?>&pagination=<?= $pagination ?>&order=<?= $order ?>&orderby=<?= $orderby ?>" class="pagination-previous" <?= $page<=1 ? "disabled" : "" ?>>Page précédente</a>
                <a href="?page=<?= $page + 1 ?>&pagination=<?= $pagination ?>&order=<?= $order ?>&orderby=<?= $orderby ?>" class="pagination-next" <?= $page>=$totalPages? "disabled" : "" ?>>Page suivante</a>
                <ul class="pagination-list">

                <?php 
                
                  for($i = 1; $i <= $totalPages; $i++) :
                    if(($i==1) || (($i>=$page-3) && ($i<=$page+3)) || ($i==$totalPages)):
                ?>
                    <li>
                      <a class="pagination-link  <?= $i == $page ? 'is-current' : '' ?>" 
                          <?= ($i == $page+3) || ($i == $page-3) ? "disabled" : "href=\"?page=".$i."&pagination=".$pagination."&order=".$order."&orderby=".$orderby."\""   ?>
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
                      <input type="hidden" name="pagination" value="<?= $pagination?>">
                      <input type="hidden" name="orderby" value="<?= $orderby?>">
                      <input type="hidden" name="order" value="<?= $order?>">
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