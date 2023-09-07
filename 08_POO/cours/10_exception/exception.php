<?php

class numberException extends Exception
{
    public function errorMessage()
    {
        return 'Erreur à la ligne ' . $this->getLine() . ' dans le fichier ' . $this->getFile() . ' <strong> ' . $this->getMessage() . '</strong>'; 
    }
}