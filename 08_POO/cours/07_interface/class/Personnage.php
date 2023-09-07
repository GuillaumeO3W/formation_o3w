<?php

abstract class Personnage implements iInteraction, iMouvement
{
    private $nom;

    public function setNom($nom)
    {
        $this->_nom = $nom;
    }
    public function getNom()
    {
        return $this->_nom;
    }
}