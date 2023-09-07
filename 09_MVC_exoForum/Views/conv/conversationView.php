<?php 

  require 'inc/head.php';
  require 'config/ini.php';
  require 'lib/functions.php';
  require 'lib/_helpers/tools.php';

  # On initialise la valeur de la page courante a 1 
  $currentPage = 1;
  # Si il y a un parametre dans l'url (?page=numero-de-page  => $_GET['page'])
  # IF : si $_GET['page'] n'est pas vide et que sa valeur est de type numérique alors on stocke la valeur de $_GET['page'] dans $currentPage
  if(!empty($_GET['page']) && ctype_digit($_GET['page'])){
    $currentPage = $_GET['page'];
  }

  # On stocke la valeur par défaut de la pagination (constante) définit dans le ini.php
  $pagination = PAGINATION;
  # Si il y a un parametre dans l'url (?pagination=nombre-message-par-page  => $_GET['pagination'])
  # IF : si $_GET['pagination'] n'est pas vide et que sa valeur est de type numérique alors on stocke la valeur de $_GET['pagination'] dans $pagination
  if(!empty($_GET['pagination']) && ctype_digit($_GET['pagination'])){
    $pagination = $_GET['pagination'];
  }
  # Marche aussi mais moins logique par rapport a la structuration du code 
  // if(!empty($_REQUEST['pagination']) && ctype_digit($_REQUEST['pagination'])){
  //   $pagination = $_REQUEST['pagination'];
  // }
  
    # On initialise une valeur par default 
  $orderBy = 'date';
  # Si il y a un parametre dans l'url  et 
  # IF : si $_GET['orderBy'] n'est pas vide alors on stocke la valeur de $_GET['orderBy'] dans $orderBy
  if(!empty($_GET['orderBy'])){
    $orderBy = $_GET['orderBy'];
  }

  # On initialise une valeur par default 
  $order = 'DESC';
    # Si il y a un parametre dans l'url  et 
  # IF : si $_GET['order'] n'est pas vide alors on stocke la valeur de $_GET['order'] dans $order
  if(!empty($_GET['order'])){
    $order = $_GET['order'];
  }

  # Si on a pas de données dans $listMessages alors on redirige vers la page 404
  // if(count($listMessages) == 0){
  //   header('Location: page404.php?_err=404');
  //   exit;
  // }
  
?>

<a href="index.php?ctrl=conversations&action=conversationsList" class="button is-dark ">Retour</a>
        <div class="section">
          <!-- On affiche le numéro de la conversation choisie -->
          <h1 class="title">Messages de la conversation n°<?= $_GET['conv'] ?> </h1>
          <form action="" method="GET">
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Afficher</label>
              </div>
                <div class="field">
                  <div class="select" >
                    <!-- On met un input caché pour transmettre la valeur de conv -->
                    <input type="hidden" name="conv" value="<?= $_GET['conv'] ?>" >
                    <select name="pagination">
                      <!-- On fait une ternaire pour afficher/selectionner la valeur actuelle de $pagination  -->
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
                    <!-- tri au clic sur le titre dans un sens ou dans l'autre si on clic 2 fois -->
                    <th><a href="?conv=<?= $_GET['conv'] ?>&pagination=<?= $pagination ?>&orderBy=date&order=<?= $order === 'ASC' ? 'DESC' : 'ASC' ?>">Date</a></th>
                    <th>Heure</th>
                    <!-- tri au clic sur le titre dans un sens ou dans l'autre si on clic 2 fois -->
                    <th><a href="?conv=<?= $_GET['conv'] ?>&pagination=<?= $pagination ?>&orderBy=author&order=<?= $order === 'ASC' ? 'DESC' : 'ASC' ?>">Auteur</a></th>
                    <th>Message</th>
                  </tr>
                </thead>
                <tbody>
                <?php

                    foreach($listMessages as $data) :
                      $msg = new Message($data);

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

                  # calcul du nombre total de page (ceil() fonction qui nous renvoie l'arrondi superieur de la division)
                  // $pageTotales = ceil($listMessages[0]['nbMsg']/$pagination);
                  $pageTotales = ceil($nbMsg['nbMsg']/$pagination);
              ?>

              <nav class="pagination is-centered" >

                <!-- la premiere ternaire si elle remplit la condition alors elle affiche le href -->
                <!-- la deuxieme ternaire si elle ne remplit pas la condition alors elle affiche le disabled qui fait rendre le bouton en gris -->
                <a <?= ($currentPage > 1) ? 'href="?conv='. $_GET['conv'].'&page='. $currentPage - 1 .'"' : '' ?> class="pagination-previous " <?= ($currentPage > 1) ? '' : 'disabled' ?> >Page précédente</a>

                <a <?= ($currentPage < $pageTotales) ? 'href="?conv='. $_GET['conv'].'&page='. $currentPage + 1 .'"' : '' ?> class="pagination-next" <?= ($currentPage < $pageTotales) ? '' : 'disabled' ?>>Page suivante</a>

                <ul class="pagination-list">
                
                      <?php 
                        # On génère les liens de chaque page (ajouter dans l'url le parametre  ?conv='. $_GET['conv'].'&page='.$i.' ) on garde dans l'url le parametre de la conversation et on ajoute le parametre du numero de la page
                        # des que l'on veut rajouter un deuxieme parametre ou plus dans l'url il faut ajouter & avant 

                        for($i = 1; $i <= $pageTotales; $i++){
                          # si $i est égale a la page courante 
                          # on affihe le carre bleu 
                          # sino on affiche le carre avec le numero de la page + on ajoute dans le href(lien)?conv='. $_GET['conv'].'&page='.$i.'  
                          if($i == $currentPage){
                            echo '<li><a class="pagination-link is-current">'.$i.'</a></li>';
                          }else{
                            echo '<li><a href="?conv='. $_GET['conv'].'&page='.$i.'" class="pagination-link">'.$i.'</a></li>';
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