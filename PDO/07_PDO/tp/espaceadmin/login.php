<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Admin</title>
</head>
<body>
<?php
# AFFICHAGE | affiche le message d'erreur 
if(isset($_GET['_err'])){
    switch($_GET['_err']){
        # message pour acces refusé (au cas ou un petit malin taperait directement l'url pour essayer d'acceder a la partie admin) 
        case '403': 
            echo 'Vous devez vous connecter !';
            break;
        # message pour les champs vides
        case 'empty':
            if(isset($_GET['field'])){
                switch($_GET['field']){
                    case 'login':
                        echo 'Vous devez saisir un identifiant !';
                        break;
                    case 'pwd':
                        echo 'Vous devez saisir un mot de passe !';
                        break;
                    default:
                        echo 'Vous devez remplir tous les champs !';
                        break;
                }
            }
            break;
        # message si on ne trouve pas l'utilisateur en BDD
        case 'connect':
            echo 'Mauvais identifiant ou mot de passe !';
            break;
    }
}

?>
    <form action="admin/index.php" method="POST">
        <input type="text" name="login" placeholder="login">
        <input type="password" name="pwd" placeholder="password">
        <input type="submit" value="Login">
    </form>
</body>
</html>