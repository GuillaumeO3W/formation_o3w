<?php
include ('inc/header.php');
include ('lib/functions.php');

$quantity = 20;
$tickets = tickets($quantity);
$tirages=tirages();
?>

<div class="container">
    <div>
        <h3>Tickets</h3>
        <pre><?php print_r($tickets) ;?></pre>
    </div>
    <div>
        <h3>Tirage</h3>
        <pre><?php print_r($tirages) ;?></pre>
    </div>
    <div>
        <h3>Résultat</h3>
        <pre><?php print_r(results($tickets , $tirages)) ;?></pre>
    </div>
    
</div>


<?php
include ('inc/footer.php');
?>