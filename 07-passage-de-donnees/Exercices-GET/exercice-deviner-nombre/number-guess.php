<?php 
  $title = 'Guess Number';
  $currentPage = 'get';

  $guessNumber = 300;

  require 'inc/head.php'; 
  require 'inc/navbar.php';

  # ETAPE 1 - simple
  # on utilise la fonction isset() pour vérifier que $_GET['number'] existe et n'est pas nul 
  # cf : https://www.php.net/manual/fr/function.isset

  if(isset( $_GET['number'])){

    $userInput = (int)$_GET['number'];

    if($userInput > $guessNumber){
      echo 'Essayes plus petit';
    }elseif($userInput < $guessNumber){
      echo 'Essayes plus grand';
    }else{
      echo 'Bravo !';
    }

  }

?>

<h2>DEBUG</h2>
<pre>
    <?php var_dump($_GET);?>
</pre>
<hr>


<h1 class="display-1 text-center my-5">Devinez le nombre !</h1>

<div class="container w-25">


  <form class="row g-3" method="get" action="">
    <div class="col-auto"> 
      <label for="number" class="visually-hidden">Number</label>
      <!-- <input type="number" class="form-control" id="number" name="number" value="<?php //echo isset($_GET['number']) ? $_GET['number'] : '' ;?>" > -->
      <input type="number" class="form-control" id="number" name="number"  placeholder="<?= isset($_GET['number']) ? $_GET['number'] : 'Saisir un nombre' ;?>">
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-3">Envoyer</button>
    </div>
  </form>

</div>

<?php require 'inc/foot.php'; ?>



