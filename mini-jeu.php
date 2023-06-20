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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        h1 p{
            opacity : 0%;
            transition : 0.4s;
        }
        h1 p:hover{
            opacity : 100%;
            transition : 0.4s;
        }
    </style>
</head>
<body>

<?php
session_start();
// session_destroy();

// reset 
if(isset($_GET['reset'])){
    unset($_SESSION['rand']);
    unset($_SESSION['historic']);
    $page = $_SERVER['PHP_SELF'];  // Récupére la page actuelle
    header('Location: '.$page);    // ATTENTION DE NE PAS METTRE D'ESPACE ENTRE Location et les :
    exit();                        // header('Location: mini-jeu.php'); 
}

// Génération du nombre aléatoire 
if(isset($_SESSION['rand']) && !empty($_SESSION['rand'])){
    $rand=$_SESSION['rand'];
}else{
    $rand=rand(1,50);
    $_SESSION['rand']=$rand;
}

// traitement de la saisie utilisateur
if (isset($_POST) && !empty($_POST) && $_POST['number'] != null  ){
    $number = $_POST['number'];
    $histo ='Historique :';
    if (is_numeric($_POST['number'])){
        $_SESSION['historic'][]=$number;
        
        $number < $rand ? $message = '<p>plus grand !</p>' :'';
        $number > $rand ? $message = '<p>plus petit !</p>' :'';
        $number == $rand ? $message = '<p class="text-success fw-bold">Gagné !</p>' :'';
    }else{
        $message = '<p class="text-danger fw-bold">error !: Veuillez entrez une valeur numérique<p>';
        
        
    }
    $historic = array_reverse($_SESSION['historic']);
}else{
    $message = 'Saissisez un nombre :';
    $number=null;
    $histo ='';
    $historic = [];
}

?>
<div class="container d-flex flex-column min-vh-100 justify-content-center align-items-center text-center">
    <div class="border rounded p-4 ">
        <h1><p class="display-1"><?= $_SESSION['rand']?></p>Trouvez le nombre caché </h1>
        <form action="" method="post" class="m-3">
            <div class="mb-2"><?= $message ?></div>
            <input type="text" name="number" class="inline"value="<?= $number ?>">
            <input type="submit" value="jouer" class="btn btn-info">
        </form>
        <a href="?reset" class="btn btn-warning mb-3">Nouvelle partie</a>   <!-- "boutton : Nouvelle partie" pour générer un nouveau nombre aléatoire  -->
        <p>
            <?= $histo ?>
            <?php foreach ($historic as $value): ?>
            <?= $value.' / ' ?>
            <?php endforeach ?>
        </p>
    </div>
    <div class="d-flex gap-2 d-none">
        <pre class="border"><?php echo '$_POST :'; var_dump($_POST); ?></pre>
        <pre class="border"><?php echo '$_SESSION :'; var_dump($_SESSION) ; ?></pre>
        <pre class="border"><?php echo '$historic :'; var_dump($historic) ; ?></pre>
    </div>
</div>
</body>
</html>