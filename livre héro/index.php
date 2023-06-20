<!-- Le livre dont vous êtes le héro
Le livre dont vous êtes le héro est un concept bien connu dans lequel il existe plusieurs points d'arrêt où un choix vous
est proposé. Ce choix influence la suite de votre parcours dans l'histoire.
Dans cet exercice, le fichier story.php contenant les di

érents morceaux de l'histoire vous est mis à disposition.

Il vous est demandé :
de créer une fonction pour a

icher le chapitre n

mettre en place un formulaire proposant les choix possibles à chaque décision à prendre
faire en sorte d'ajouter une persistance des données pour ne pas perdre le cours de l'histoire -->

<?php 
session_start();
include ("story.php");

// reset 
if(isset($_GET['reset'])){
    unset($_SESSION['history']);
    $page = $_SERVER['PHP_SELF'];  // Récupére la page actuelle
    header('Location: '.$page);    // ATTENTION DE NE PAS METTRE D'ESPACE ENTRE Location et les :
    exit();                        // header('Location: mini-jeu.php'); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <style>
        body{
            font-family : 'times new romans';
        }
    </style>
</head>
<body>
    <?php 
    if(isset($_POST['choice'])){
        $choice=$_POST['choice'];
    }else{
        $choice=0;
    }
    // $_SESSION['history'][]=$story[$choice]['text'];
    if(isset($_SESSION['history'])){
        foreach ($_SESSION['history'] as $index => $chapter){
            if ($chapter == $story[$choice]['text']){
                unset($_SESSION['history'][$index]);
            }else{
                $_SESSION['history'][]=$story[$choice]['text'];
            }
        }
    }else{
        $_SESSION['history'][]=$story[0]['text'];
    }
    ?>
    <div class="container d-flex flex-column min-vh-100 justify-content-center align-items-center text-center">
        <div class="border p-3">
            <div class="mb-2">
                <?= $story[$choice]['text']; ?>
            </div>
            <div>
                <form action="" method="post">
                    <?php foreach($story[$choice]['choice'] as $key => $value):?>
                        <input type="radio" id="<?= $key ?>" name="choice" value="<?= $value['goto']; ?>">
                        <label for="<?= $key ?>"><?= $value['text']; ?></label>
                    <?php endforeach ?>    
                    <input type="submit" value="valider">
                </form>
            </div>
        </div>
        <p class="align-self-end">
            <a  class="link-secondary link-underline-danger link-underline-opacity-25 link-underline-opacity-100-hover me-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Afficher l'histoire</a>
            <a href="?reset"  class="link-secondary link-underline-danger link-underline-opacity-25 link-underline-opacity-100-hover">Reset</a>
        </p>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Histoire</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php foreach ($_SESSION['history'] as $chapter): ?>
                                <p><?= $chapter; ?></p>
                                <p>*****</p>
                        <?php endforeach ?>   
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <pre class="d-none"><?php print_r($story); ?></pre>
    <pre class=""><?php var_dump($_SESSION['history']); ?></pre>
</body>
</html>