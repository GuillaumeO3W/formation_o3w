<?php 
  $title = '$_GET';
  $currentPage = 'get';
  require 'inc/head.php'; 
  require 'inc/navbar.php';
?>

<h1 class="display-1 text-center my-5">$_GET</h1>
<div class="container w-25">

  <!-- <a href="profil.php?id=12&user=sony&casquette=oui">Voir le profil</a> -->

<form class="row g-3" method="get">
    <div class="col-auto">
      <label for="number" class="visually-hidden">Number</label>
      <input type="number" class="form-control" id="number" name="nbr" >
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-3">Envoyer</button>
    </div>
</form>
  <?php
  if(isset($_GET['nbr'])){
    $nbr = $_GET['nbr'];
    if ($nbr<10){?>
      <p>trop petit !</p>
      <?php 
    }elseif ($nbr>20){?>
    <p>trop grand !</p>
      <?php }
    else {?>
    <p>c'est bon !</p>
  <?php }
}else{
  $nbr=null;
}

?>
</div>

<?php require 'inc/foot.php'; ?>



