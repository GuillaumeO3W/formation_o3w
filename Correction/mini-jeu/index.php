<?php
    session_start(); 
  
    $title = 'Mini jeu | Session';
    $currentPage = 'minijeu';

    require 'inc/head.php'; 
    require 'inc/navbar.php';

    ##### ENONCE ####
    /**
         * 1 - Faire un script qui affiche un nombre aléatoire
         * 2 - Enregistrer ce nombre en session. Une fois qu'il est généré, n'affiche que celui là.
         * 3 - Créer un lien "Nouvelle partie" qui va générer un nouveau nombre.
         * 4 - Ajouter un champs de formulaire pour saisir un nombre.
         * - A la validation, la page nous indique si le nombre généré aléatoirement est inférieur, supérieur ou égal à notre saisie.
         * 5 - Organiser un comportement de jeu.
         * - Masquer le nombre aléatoire
         * - Lorsqu'on a trouvé le nombre, faire une nouvelle partie etc...
         * 6 - Ajouter une gestion des erreurs (saisie non numérique etc...)
         * 7 - Afficher l'historique des coups joués
    */
    ##### FIN ENONCE ####


    /**
     * generateNumber : Génère un nombre aléatoire compris entre les marges passées en parmètres si elles sont précisées, ou entre 0 et la plus grande valeur aléatoire possible.
     * @param int $min [optional]
     * @param int $max [optional]
     * @return int
    **/
    function generateNumber(int $min=NULL, int $max=NULL) : int {
        // si on transmet des valeurs $min et $max lors de l'appel de la fonction, on vérifit qu'ils sont bien des entiers et on retourn le résultat de mt_rand($min, $max)
        if(is_int($min) && is_int($max)){
            return mt_rand($min, $max);
        }else{
            return mt_rand();
        }
    }


    // si vous voulez pouvoir retourner des types différents il faut le spécifié a la fin 
    // exemple function compareNumbers(int $userInput, int $randNumber) : string|int
    // ici dans l'exemple on autorise que le retour soit un entier ou une chaine de caracteres ( : string|int)


    /**
     * compareNumbers : Compare deux nombres passés en paramètre et nous retourne le rapport entre eux : plus petit, plus grand, égalité.
     * @param int $min [optional]
     * @param int $max [optional]
     * @return string
    **/
    function compareNumbers(int $userInput, int $randNumber) : string {
        if($userInput < $randNumber){
            return 'Trop petit !';
        }elseif($userInput > $randNumber){
            return 'Trop grand !';
        }else{
            return 'Bravo vous avez trouvé !';
        }
    }

    // on rentre dans le if de la fonction generateNumber
    // generateNumber(1,100);
    // on rentre dans le else de la fonction generateNumber
    // generateNumber();

    // si on a dans l'url ?newGame alors on efface la session et redirigé vers la page en cours(ce qui va évité d'avoir tout le temps ?newGame dans l'url)
    if(isset($_GET['newGame'])){
        unset($_SESSION['game']);
        $page = $_SERVER['PHP_SELF'];
        header('Location:'.$page);
        exit;
    }

    const MIN = 1;
    const MAX = 100;
    
    // si $_SESSION['game']['rand'] n'existe pas alors on la crée en generant le nombre aléatoire
    if(!isset($_SESSION['game']['rand'])) {
        $_SESSION['game']['rand'] = generateNumber(MIN, MAX);
    }

    if(isset($_POST['userTry'])){
        if(ctype_digit($_POST['userTry'])){
            // on appelle la fonction de comparaison et on stocke le résultat dans $result
            $result = compareNumbers(intval($_POST['userTry']), $_SESSION['game']['rand']);

            // On stocke tous les essaies et les messages retournés par la fonction de comparaison 
            $_SESSION['game']['historic'][] = [
                'attempt' => $_POST['userTry'],
                'compareMsg' => $result
            ];

        }else{
            $error = 'Veuillez saisir un entier!';
        }

    }
    // $_SESSION['game']['historic'][count($_SESSION['game']['historic'])-1]['compareMsg']
    // $_SESSION['game']['historic'][1]['compareMsg']
?>


<div class="container my-5">

    <!-- Si $error existe alors on affiche le message d'erreur -->
    <?php if(isset($error)) :?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
    <?php endif;?>


    <form class="row g-3" method="POST" action="">
        <div class="col-auto">
            <input type="number" id="number" name="userTry" class="form-control" aria-labelledby="numberHelp" min="<?= MIN ?>" max="<?= MAX ?>">
            <div id="numberHelp" class="form-text">
            Devinez un nombre compris entre <?= MIN ?> et <?= MAX ?>.
            </div>
        </div>

        <div class="col-auto">
            <!-- Pour rendre le bouton désactivé si on a trouvé  -->
            <button type="submit" class="btn btn-primary" 
            <?= isset($_SESSION['game']['historic']) 
            && $_SESSION['game']['historic'][count($_SESSION['game']['historic'])-1]['compareMsg'] === 'Bravo vous avez trouvé !' ? 'disabled' : '' ?>>Essayer</button>
        </div>
    </form>

    <!-- si $_SESSION['game']['historic'] existe  -->
    <?php if(isset($_SESSION['game']['historic'])) : ?>

        <!-- Bouton pour réinitialisé la partie -->
        <a href="?newGame" class="btn btn-primary my-5" >Nouvelle partie</a>

        <!-- on parcours le tableau $_SESSION['game']['historic'] pour pouvoir affiché les tentatives et les messages associés -->
        <?php foreach($_SESSION['game']['historic'] as $cle => $attempt) : ?>

            <!-- on choisit la classe alert-success ou alert-warning en fonction de si on a trouvé ou pas le nombre -->
            <div class="alert <?= $attempt['compareMsg'] === 'Bravo vous avez trouvé !'  ? 'alert-success' : 'alert-warning' ?>">
                <!-- on affiche les tentatives et messages associés -->
                Tentative n°<?= $cle + 1?> : <?= $attempt['attempt'] ?> => <?= $attempt['compareMsg'] ?> <?= $attempt['compareMsg'] === 'Bravo vous avez trouvé !' ? ' 🎉 en '.count($_SESSION['game']['historic']).' coups 🎉)': '' ?>
                <!-- exemple d'affichage Tentative n°1 : 27 => Trop petit ! -->
            </div>
    
        <?php endforeach; ?>
    <?php endif;?>


    <!-- #### DEBUG #### -->
    <hr>
    <h2>DEBUG</h2>
    <pre>
        <?php var_dump($_SESSION['game']['historic'][count($_SESSION['game']['historic'])-1]['compareMsg']);?>
        <?php var_dump($_SESSION['game']);?>
    </pre>
    <!-- #### FIN DEBUG #### -->


</div>

<?php require 'inc/foot.php'; ?>