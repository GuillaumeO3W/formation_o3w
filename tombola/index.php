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

if(isset($_SESSION['tombola']['bankroll'])){
    $bankroll = $_SESSION['tombola']['bankroll'];
}else{
    $_SESSION['tombola']['bankroll'] = 500;
    $bankroll = $_SESSION['tombola']['bankroll'];
}

$userQuantity = 69;

$quantity = quantity($userQuantity, $bankroll);
$tickets = tickets($quantity);
$tirages=tirages();
$results=(results($tickets , $tirages));
$gains = gains($results);
$bankroll = bankroll($quantity,$gains);
?>
<div>
        <a href="?reset">reset</a>
        <a href="?newGame">Nouveau Tirage</a>
</div>
<div class="main">
    <div>
        <h3>Bankroll</h3>
        <div>
            <?php print_r($bankroll." €") ;?>
        </div>
    </div>
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
        <pre><?php print_r($gains." €");?></pre>
    </div>
</div>


<?php
include ('inc/footer.php');
?>