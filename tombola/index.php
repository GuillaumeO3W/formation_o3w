<?php
include ('inc/header.php');
include ('lib/functions.php');

$userMoney = 120;
$userQuantity = 20;
$quantity = quantity($userQuantity, $userMoney);
$tickets = tickets($quantity);
$tirages=tirages();
?>

<div class="main">
    <div>
        <h3>Tickets</h3>
        <div class="tickets">
            <?php foreach($tickets as $value):?>
                    <span class="ticket"><?= $value ; ?></span>
            <?php endforeach ?>
        </div>
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