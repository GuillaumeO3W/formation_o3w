<?php
include ('inc/header.php');
include ('lib/functions.php');
if(isset($_GET['reset'])){
    unset($_SESSION['tombola']);
    header ('location: index.php');
    exit;
}
if(isset($_GET['newGame'])){
    header ('location: index.php');
    exit;
}

$userMoney = 120;
$userQuantity = 20;

$quantity = quantity($userQuantity, $userMoney);
$tickets = tickets($quantity);
$tirages=tirages();
$results=(results($tickets , $tirages));
$gains = gains($results);
?>
<div>
        <a href="?reset">reset</a>
        <a href="?newGame">Nouvelle partie</a>
</div>
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
        <pre><?php print_r($results) ;?></pre>
    </div>
    <div>
        <h3>Gains</h3>
        <pre><?php print_r($gains) ;?></pre>
    </div>
</div>



<?php
include ('inc/footer.php');
?>