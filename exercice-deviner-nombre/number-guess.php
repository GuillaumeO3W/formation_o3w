<?php 
  $title = '$_GET';
  $currentPage = 'get';

  $guessNumber = 300;

  require 'inc/head.php'; 
  require 'inc/navbar.php';



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
      <input type="number" class="form-control" id="number" name="number" value="<?= isset($_GET['number']) ? $_GET['number'] : '' ; ?>">
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-3">Envoyer</button>
    </div>
  </form>

<?php
if (isset($_GET['number'])) :

        $nbr = $_GET['number'];
        
        if ($nbr == $guessNumber) : ?>
          <p>Bravo !</p>
        <?php 
        
        elseif ($nbr < $guessNumber) : ?>
          <p>trop petit !</p>
        
        <?php  else : ?>
          <p>trop grand !</p>

<?php endif; endif;  ?>

</div>
<?php require 'inc/foot.php'; ?>
