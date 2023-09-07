<?php

class Magicien extends Personnage implements iMouvement
{
    public function seDeplace()
    {
        echo "Je marche";
    }

    public function parle()
    {
        echo "Abracadabra !! ";
    }
}