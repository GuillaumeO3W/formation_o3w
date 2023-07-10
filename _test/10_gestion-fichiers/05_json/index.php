<?php 

# JSON : JavaScript Object Notation
# les clés et les chaines de caracteres doivent OBLIGATOIREMENT entourées de guillemets doubles. 
# 6 types de données en JSON : string, int, float, bool, array, objet

$filename = __DIR__.'/data.json';

$data = file_get_contents($filename);

echo $data;
echo '<br>';
echo '<br>';
# json_decode — Décode une chaîne JSON
$arr = json_decode($data, true);
echo '<pre>';
var_dump($arr);
echo '</pre>';

foreach($arr as $key => $value){
    if(is_array($value)){
        echo $key .' : <br>'; 
        foreach($value as $label => $element )
        echo $label . ' : '.$element .'<br>';
    }else {
        echo $key . ' : '.$value .'<br>';
    }
}


echo '<br>';echo '<br>';echo '<br>';
# json_encode — Encode une chaîne en JSON / Retourne la représentation JSON d'une valeur(c'est PHP manual qui le dit)
$json = json_encode($arr);
echo '<br>';
echo $json;