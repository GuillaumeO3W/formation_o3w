<?php
function quantity($quantity, $money){
    $money>=200 ? $ticketAvaible = 100 : $ticketAvaible = $money/2;
    $quantity >= $ticketAvaible ? $quantity = $ticketAvaible : $quantity = $quantity;
    return $quantity;
}

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

function tirages($nb=3){
    $tirages=[];
    while (count($tirages) != $nb){
        $newTirage=rand(1,100);
        if (!in_array($newTirage,$tirages)){
            $tirages[]=$newTirage;
        }
    }
    return $tirages;
}

function results($tickets , $tirages){
    $results=[];
    foreach ($tirages as $key => $tirage){
        foreach($tickets as $ticket){
            if($ticket == $tirage){
                $results[$tirage]=$key;
            }
        }
    }
    return $results;
}
?>