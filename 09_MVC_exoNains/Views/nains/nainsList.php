<?php 
require 'inc/head.php';

$currentPage = 1;
if(!empty($_GET['page']) && ctype_digit($_GET['page'])){
  $currentPage = $_GET['page'];
}

$pagination = PAGINATION;
if(!empty($_GET['pagination']) && ctype_digit($_GET['pagination'])){
  $pagination = $_GET['pagination'];
}

?>
<a href="index.php" class="button is-dark ">Retour</a>
<div class="section">
  <h1 class="title">Liste des Nains 
    <?= (isset($_GET["v_id"])) ? "Originaires de la ville n°".$_GET["v_id"] :"" ?>
  </h1>
  <div class="card is-shadowless">
    <div class="card-content">
      <table class="table is-hoverable is-fullwidth">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Profil</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            if(!empty($nains)) :
              foreach($nains as $nain) :  
          ?>
    
          <tr>
            <th><?= $nain->getId() ?></th>
            <td><?= $nain->getNom() ?></td>
            <td><a href="index.php?ctrl=nain&action=nainView&id=<?= $nain->getId() ?>" class="button is-dark is-small">Voir nain</a></td>
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
      $pageTotales = ceil($nbNains['nbNains']/$pagination);
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