<?php
session_start();
// reset 
if(isset($_GET['reset'])){
    unset($_SESSION['quiz']);
    $page = $_SERVER['PHP_SELF'];  
    header('Location: '.$page);    
    exit();                       
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUIZ ?</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>


<div class="container d-flex flex-column min-vh-100 justify-content-center align-items-center">
    <h1 class="mb-5">QU¿Z</h1>
    <form action="quiz.php" method="POST" class=" d-flex flex-column">
        <input type="hidden" name="start">
        <button type="submit" class="btn btn-outline-info">Lancer le Quiz</button>
    </form>
</div>

</body>
</html>

<!-- 
énoncé:

Le but est de créer un quiz, qui affiche les questions une par une ainsi que la bonne réponse après
chaque question et avec calcul du score en fin de partie.

Le quiz se déroulera selon le scénario suivant :

1. Au début du quiz, vous avez un écran de début avec un bouton commencer le quiz.

2. Au clique de celui-ci, vous avez un écran avec la première question, les différentes réponses
et un bouton pour valider la réponse.

3. Au clique de celui-ci, vous avez un écran avec la première question, les différentes réponses
ainsi que la mise en évidence de la bonne réponse et celle de l'utilisateur puis un bouton
question suivante.

4. Celui-ci nous amène à la question suivante et on répète les 2 étapes précédentes jusqu'à que
toutes les questions ont été répondu.

5. Puis à la fin, on affichera le score des bonnes réponses.

Voici les questions :
(à vous de renseigné la bonne réponse dans la clé 'answer' pour chaque question ...) -->