<?php

#### MVC ####

## MODEL ##
# le modèle (Model) contient les données à afficher.
# c'est la partie qui gère les données, son rôle c'est d'aller récupérer les données dans la base de données, de les organiser et les assembler pour qu'elles puissent être traitées par le controleur. Donc c'est la ou on y trouve les requetes SQL et du PHP.

## VIEW ##
# la vue (View) contient l'affichage/presentation de l'interface graphique.
# c'est la partie qui gère l'affichage, elle ne fait presque aucun calcul, elle se contente de récupérer des variables pour savoir ce qu'elle doit afficher. On y trouve essentiellement du HTML et aussi quelques boucles, conditons PHP simple.


## CONTROLLER ##
# le contrôleur (Controller) contient la logique concernant les actions effectuées par l'utilisateur.
# c'est la partie qui gère la logique du code donc c'est elle qui prend les décisions. c'est en quelque sorte l'intermédiaire entre le modèle et la vue, le conrôleur va demander au modele les données, les analyser, prendre des décisions et renvoyer les données à afficher à la vue.Le controleur contient que du PHP. C'est lui aussi qui va déterminer si l'utilisateur a droit de voir la page ou non (gestion des droits d'accès).

require_once 'Model.php';
require_once 'Controller.php';

$ctrl = new Controller;
$ctrl->action();




