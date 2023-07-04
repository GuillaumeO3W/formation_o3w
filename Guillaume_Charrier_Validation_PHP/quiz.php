<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUIZ ?</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<?php
session_start();
include ('datas.php');

// on détermine qu'elle question afficher.

if(isset($_POST['start'])):
    // si on arrive de la page index, $_POST['start'] existe on va donc définir l'index à 0 pour afficher la première question.
    $_SESSION['quiz']['index']=0;
else:
    if(isset($_GET['next'])):
        // Si la varible $_GET['next'] existe on incremente l'index pour afficher la question suivante,
        // (et on recharge la page pour supprimmer la valeur next dans la variable $_GET.)
        $_SESSION['quiz']['index']=$_SESSION['quiz']['index']+1;
        $page = $_SERVER['PHP_SELF'];  
        header('Location: '.$page);    
        exit(); 
    else:
        // sinon on garde l'index stocké en SESSION pour afficher la question actuelle 
        //(dans la cas où l'utilisateur aurait valider le formulaire sans selectionner de choix).
        $_SESSION['quiz']['index']=$_SESSION['quiz']['index'];
    endif;
endif;
?>

<div class="container d-flex flex-column min-vh-100 justify-content-center align-items-center">
<?php


if($_SESSION['quiz']['index']<count($questions)):
// si l'index est plus petit que le nombre de questions contenu dans le tableau,
// on stock en SESSION Le tableau de la question en cours.
$_SESSION['quiz']['currentQuestion']=$questions[$_SESSION['quiz']['index']]; 
?>
    <!-- on affiche la question correspondant à cet index. -->
    <h4><?= $_SESSION['quiz']['currentQuestion']['question'] ?></h4>
    <form action="result.php" method="POST" class=" d-flex flex-column p-2">
        <!-- On affiche chaque réponses possible de la question en cours 
        La réponse sera envoyée dans la page result.php -->
        <?php foreach($_SESSION['quiz']['currentQuestion']['options'] as $key => $option): ?>
        <div>
            <input type="radio" name="userAnswer"id="<?= $key ?>" value="<?= $option ?>">
            <label for="<?= $key ?>" class="form-label"><?= $option ?></label>
        </div>
        <?php endforeach ?>
        <div class="mt-2">
            <button type="submit" class="btn btn-outline-info">Valider</button>
            <a href="index.php?reset" class="btn btn-outline-warning">Reset</a>
        </div>
    </form>

<?php else: ?>
    <!-- Une fois toutes les question affichées c'est la fin du Quiz,
    on affaiche le résultat final -->
    <p>Résultat</p>
    <p>score : <?= $_SESSION['quiz']['score'] ?></p>
    <a href="index.php?reset" class="btn btn-outline-warning">reset</a>

<?php endif; ?>
</div>
<div class="d-none">
    <hr>
    <h1>DEBUG</h1>
    <pre><?php var_dump($_POST)?></pre>
    <pre><?php var_dump($_SESSION['quiz'])?></pre>
</div>
</body>
</html>

