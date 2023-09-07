<?php
class Calculatrice
{
    public function division($a,$b)
    {
        if(!is_numeric($a) || !is_numeric($b))
        {
            throw new numberException('Les deux chiffres ou nombres doivent être des entiers');
        }

        if(!$b)
        {
            throw new Exception('Division par zéro impossible !');
        }
        return 'Résultat : '.($a / $b). '<br>';
    }
}