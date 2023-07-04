<?php
function tickets($quantity){
    $tickets=[];
    while (count($tickets) != $quantity){
                $newTicket=rand(1,100);
                if (!in_array($newTicket,$tickets)){
                    $tickets[]=$newTicket;
                }
            }
    return $tickets;
}
?>