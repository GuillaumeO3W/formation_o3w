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
                        echo '<div class="alert alert-danger" role="alert">Vous devez vous connecter !</div>';
                        break;
                    # message pour les champs vides
                    case 'empty':
                        if(isset($_GET['field'])){
                            switch($_GET['field']){
                                case 'login':
                                    echo '<div class="alert alert-danger" role="alert">Vous devez saisir un identifiant !</div>';
                                    break;
                                case 'pwd':
                                    echo '<div class="alert alert-danger" role="alert">Vous devez saisir un mot de passe !</div>';
                                    break;
                                default:
                                    echo '<div class="alert alert-danger" role="alert">Vous devez remplir tous les champs !</div>';
                                    break;
                            }
                        }
                        break;
                    # message si on ne trouve pas l'utilisateur en BDD
                    case 'connect':
                        echo '<div class="alert alert-danger" role="alert">Mauvais identifiant ou mot de passe !</div>';
                        break;
                }
            }

            ?>
    <form action="admin/connexion.php" method="POST">
        <input type="text" name="login" placeholder="login">
        <input type="password" name="pwd" placeholder="password">
        <input type="submit" value="Login">
    </form>
</body>
</html>