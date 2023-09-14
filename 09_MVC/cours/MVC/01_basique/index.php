<?php

require 'inc/head.php';
require_once 'config/ini.php';
require_once 'class/User.php';

require_once 'models/CoreModel.php';
require_once 'models/UserModel.php';


require_once 'controllers/UserController.php'; 

# On est censé avoir ce genre d'url 
# index.php?ctrl=user&action=index
# index.php?ctrl=role&action=index
# index.php?ctrl=user&action=show&id=2



// $ctrl = new UserController;
// $ctrl->index();

# ucfirst() — Met le premier caractère en majuscule
# ucwords() — Met en majuscule la première lettre de tous les mots



#### ON AUTOMATISE L'INSTANTIATION D'UN CONTROLLER AVEC L'APPEL D'UNE DE SES METHODES GRACE AUX PARAMETRES PASSER PAR L'URL ####



# On donne a $ctrl une valeur par défaut (pour la premiere fois ou on arrive sur l'appliication)
$ctrl = 'UserController';
# Si on a un $_GET['ctrl']) (c'est à dire si on dans l'url index.php?ctrl='nomDuControlleur' )
if(isset($_GET['ctrl'])){
    # Alors on stocke la valeur du $_GET['ctrl'] dans $ctrl et on la passe en minuscule puis on met une majuscule a la premiere lettre puis on la concataine avec 'Conroller' (ex : si j'ai dans l'url # index.php?ctrl=role&action=index alors ici  $_GET['ctrl'] = 'role' donc on aura $ctrl = 'RoleController')
    $ctrl = ucfirst(strtolower($_GET['ctrl'])).'Controller';
}

# On donne a $method une valeur par défaut (pour la premiere fois ou on arrive sur l'appliication)
$method = 'index';
# Si on a un $_GET['action]
if(isset($_GET['action'])){
    # Alors on stocke la valeur du $_GET['action'] dans $method (ex : si j'ai dans l'url # index.php?ctrl=role&action=index alors ici  $_GET['action'] = 'index' donc on aura $method = 'index')
    $method = $_GET['action'];
}
// else {
//     # On donne a $method une valeur par défaut (pour la premiere fois ou on arrive sur l'appliication)
//     $method = 'index';
// }


try{
    # On vérifie que la classe du controller exist (controller récupéré du $_GET['ctrl'])
    if(class_exists($ctrl)){
        # Si il existe on instancie le controller récupéré
        $controller = new $ctrl;
        # exemples : 
        # $controller = new UserController    (si par défaut ou si index.php?ctrl=user... )
        # $controller = new RoleController    (si index.php?ctrl=role... )

        # On gère le cas simple (ex : $method = 'index' soit pr défaut soit par ...&action=index )
        # On vérifie que la méthode/action existe bien dans la classe du controller récupéré
        
        # On gere la création ou la misa a jour d'éléments 
        # Si on reçoit des données (POST) via un formulaire (create($_POST) ou update($_GET['id', $_POST]) ))
        if(!empty($_POST)){
            if(method_exists($controller, $method)){

                # On vérifie si on a un $_GET['id'] qui n'est pas vide et de type numerique
                if(!empty($_GET['id']) && ctype_digit($_GET['id'])){
                    
                    $controller->$method($_GET['id'], $_POST);
                    # $controller->update($_GET['id'], $_POST)
    
                }else {
                    
                    $controller->$method($_POST);
                    # $controller->store()
                }
            }
        }else {

            if(method_exists($controller, $method)){

                # On vérifie si on a un $_GET['id'] qui n'est pas vide et de tpe numerique
                if(!empty($_GET['id']) && ctype_digit($_GET['id'])){
                    # Alors on lance la methode récupérée du $_GET['action'] en lui passant en paremetre la valeur du $_GET['id'] (ex : avec $controller->show($_GET['id']))
                    $controller->$method($_GET['id']);
                    # la suppression ou l'affichage d'un user
    
                }else {
                    # Sinon On lance la méthode récupérée du $_GET['action']
                    $controller->$method();
                    # exemples :
                    # $controller->index()
                }
            }

        }

        
    }


}catch(Exception $e ){
    die($e->getMessage());
}







// $ctrl = new UserController;
// $ctrl->show($id);




