<?php
include ('inc/header.php');
include ('lib/functions.php');

$quantity = 10;
?>

<div class="container">
    <p>Tickets</p>
    <pre><?php print_r(tickets($quantity)) ;?></pre>
</div>


<?php
include ('inc/footer.php');
?>