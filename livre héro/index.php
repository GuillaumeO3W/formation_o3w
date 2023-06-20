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

<?php include ("story.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
        $text=$story[$choice]['text'];
        $_SESSION['history'][]=$text;
    }else{
        $text=$story[0]['text'];
    }
    ?>
    <?= $story[0]['choice'][0]['text'].'--'; ?>
    <?= $story[0]['choice'][0]['goto'].'--'; ?>
    <?= $story[0]['choice'][1]['text'].'--'; ?>
    <?= $story[0]['choice'][1]['goto'].'--'; ?>
    <?= $_POST['choice']; ?>

    <div class="container d-flex flex-column min-vh-100 justify-content-center align-items-center text-center">
        <div class="border p-3">
            <div class="mb-2"><?= $text ?></div>
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
        <div>
            <?php foreach ($_SESSION['history'] as $chapter): ?>
                <p><?= $chapter; ?></p> 
            <?php endforeach ?>    
        </div>
    </div>
    <pre class="d-none"><?php print_r($story); ?></pre>
</body>
</html>