<!-- Minijeu

1 - Faire un script qui affiche un nombre aléatoire
2 - Enregistrer ce nombre en session. Une fois qu'il est généré, n'affiche que celui là.
3 - Créer un lien "Nouvelle partie" qui va générer un nouveau nombre.
4 - Ajouter un champs de formulaire pour saisir un nombre.
A la validation, la page nous indique si le nombre généré aléatoirement est inférieur, supérieur ou égal à notre saisie.
5 - Organiser un comportement de jeu.
● Masquer le nombre aléatoire
● Lorsqu'on a trouvé le nombre, faire une nouvelle partie etc...
6 - Ajouter une gestion des erreurs (saisie non numérique etc...)
7 - Afficher l'historique des coups joués -->

<?php
echo $_SESSION=rand();
?>