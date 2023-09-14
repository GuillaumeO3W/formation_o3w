<?php 

$currentPage = 1;
if(!empty($_GET['page']) && ctype_digit($_GET['page'])){
  $currentPage = $_GET['page'];
}

$pagination = PAGINATION;
if(!empty($_GET['pagination']) && ctype_digit($_GET['pagination'])){
  $pagination = $_GET['pagination'];
}

?>
<div class="section">
  <h1 class="title">Liste des Groupes</h1>
  <div class="card is-shadowless">
    <div class="card-content">
      <table class="table is-hoverable is-fullwidth">
        <thead>
          <tr>
            <th>Id</th>
            <th>Début travail</th>
            <th>Fin travail</th>
            <th>Taverne</th>
            <th>Tunnel</th>
            <th>Détails</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            if(!empty($groupes)) :
              foreach($groupes as $groupe) :  
          ?>
    
          <tr>
            <th><?= $groupe->getId() ?></th>
            <td><?= $groupe->getDebut() ?></td>
            <td><?= $groupe->getFin() ?></td>
            <td><?= $groupe->getTaverneId() ?></td>
            <td><?= $groupe->getTunnel() ?></td>
            <td><a href="index.php?ctrl=groupe&action=groupeView&id=<?= $groupe->getId() ?>" class="button is-dark is-small">Voir groupe</a></td>
          </tr>   
          <?php 
            endforeach;
          ?>
        </tbody>
      </table>
      <?php
        else: 
      ?>
          <p>Aucun nain</p>
      <?php
        endif
      ?>
      
      <?php 
      $pageTotales = ceil($nbGroupes['nbGroupes']/$pagination);
      ?>

      <nav class="pagination is-centered" >

      <a <?= ($currentPage > 1) ? 'href="?page='. $currentPage - 1 .'"' : '' ?> class="pagination-previous " <?= ($currentPage > 1) ? '' : 'disabled' ?> >Page précédente</a>

      <a <?= ($currentPage < $pageTotales) ? 'href="?page='. $currentPage + 1 .'"' : '' ?> class="pagination-next" <?= ($currentPage < $pageTotales) ? '' : 'disabled' ?>>Page suivante</a>

      <ul class="pagination-list">

          <?php 
            for($i = 1; $i <= $pageTotales; $i++){
        
              if($i == $currentPage){
                echo '<li><a class="pagination-link is-current">'.$i.'</a></li>';
              }else{
                echo '<li><a href="?page='.$i.'" class="pagination-link">'.$i.'</a></li>';
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