<?php
include ('header.php');
include ('footer.php');

$quantity = 10;

function tickets($quantity){
    for ($i=1; $i<=$quantity ; $i++){
        $tickets[]=rand(1,100);
    }
    return $tickets;
}

?>
<pre><?php print_r(tickets($quantity)) ?></pre>



