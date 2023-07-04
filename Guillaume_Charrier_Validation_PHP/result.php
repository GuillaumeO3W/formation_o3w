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

// inialisation des variables-----------------------
if(isset($_POST['userAnswer'])):
    // si l'utilisateur à valider une réponse on la stock dans $_SESSION
    $_SESSION['quiz']['userAnswer']=$_POST['userAnswer'];
else:
    // si l'utilisateur à cliqué sur Valider sans cocher de réponse on le renvoi sur le formulaire du quiz
    header ('location: quiz.php');
    exit;
endif;

if(!isset($_SESSION['quiz']['score'])):
    $_SESSION['quiz']['score']=0;
endif;

if(!isset($_SESSION['quiz']['currentIndex'])):
    $_SESSION['quiz']['currentIndex']=-1;
endif;

?>
<div class="container d-flex flex-column min-vh-100 justify-content-center align-items-center">

    <h4><?= $_SESSION['quiz']['currentQuestion']['question'] ?></h4>
    <form action="quiz.php" method="POST" class=" d-flex flex-column mb-5 p-2">
        <?php foreach($_SESSION['quiz']['currentQuestion']['options'] as $key => $option): ?>
            <!-- on affiche les réponses possible de la questions -->
        <div>
            <label for="<?= $key ?>" class="form-label 
            <?= ($option == $_SESSION['quiz']['currentQuestion']['answer'])? "text-decoration-underline fw-bold" : ''; // On met en gras la bonne réponse?>
            <?= ($option == $_SESSION['quiz']['userAnswer'])? "text-success" : ''; // si l'utilisateur à la bonne réponse on l'affiche en vert ?>
            <?= ($option == $_SESSION['quiz']['userAnswer'] && $option !=  $_SESSION['quiz']['currentQuestion']['answer'])? "fw-bold text-danger" : ''; //  si l'utilisateur à la mauvaise réponse on l'affiche en rouge ?>
            
            "><?= $option ?></label>
        </div>
        <?php endforeach ?>

        <div>
        <?php if($_SESSION['quiz']['index']<count($questions)-1):?>
                <!--  tant qu'il reste une question à afficher on affiche un boutton "question suivante, sinon on affiche un boutton "fin du quiz" -->
                <a type="submit" class="btn btn-outline-primary me-2" href="quiz.php?next">Question suivante</button>
        <?php else: ?>
                <a type="submit" class="btn btn-outline-primary me-2" href="quiz.php?next">Fin du Quiz</button>
        <?php endif; ?>

            <a href="index.php?reset" class="btn btn-outline-warning">reset</a>
        </div>
    </form>

    <div class="border rounded bg-light p-2 text-center">
        <p>vous avez répondu : <span class="fw-bold">"<?= $_SESSION['quiz']['userAnswer'] ?>"</span></p>
    <?php 
        if( $_SESSION['quiz']['userAnswer']== $_SESSION['quiz']['currentQuestion']['answer']): ?>
            <p>c'est la bonne réponse, vous marquez 1 point</p>
            <?php 
            if($_SESSION['quiz']['currentIndex']!=$_SESSION['quiz']['index']):
                $_SESSION['quiz']['score']+=1; 
                $_SESSION['quiz']['currentIndex']=$_SESSION['quiz']['index'];
            endif;
        else: ?>
            <p>La bonne réponse était : <span class="fw-bold">"<?= $_SESSION['quiz']['currentQuestion']['answer'] ?>".</span></p>
            <p>Vous marquez 0 point.</p>
<?php   endif; ?>
        <span class="badge text-bg-dark">Score : <?= $_SESSION['quiz']['score'] ?></span>
    </div>

</div>
<div class="d-none">
    <hr>
    <h1>DEBUG</h1>
    <pre><?php var_dump($_POST)?></pre>
    <pre><?php var_dump($_SESSION['quiz'])?></pre>
</div>
</body>
</html>