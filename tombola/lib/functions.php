<?php
session_start();

function bankroll($quantity , $gains){
    $_SESSION['tombola']['bankroll'] = $_SESSION['tombola']['bankroll'] - ($quantity*2)+$gains;
    return $_SESSION['tombola']['bankroll'];
}

function quantity($quantity, $bankroll){
    $bankroll>=200 ? $ticketAvaible = 100 : $ticketAvaible = $bankroll/2;
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

function gains($results){

    $gains=null;
    foreach ($results as $ticket => $rank){
        if($rank == 0){
            $gain = 100;
        }elseif($rank == 1){
            $gain = 50;
        }elseif($rank == 2){
            $gain = 20;
        }else{
            $gain = 0;
        }
        $gains += $gain;
    }
    return $gains;
}
?>