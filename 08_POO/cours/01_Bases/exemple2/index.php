<?php 
require 'Personne.php';

# Pour instancier une classe on utilise le mot clé new et on stocke l'objet créé dans une variable
# les paramètres sont ceux du constructeur de la classe Personne
$sony = new Personne('Sony', 26, 'Homme', 'fr');
$sony->parler();
$sony->vieillir();
