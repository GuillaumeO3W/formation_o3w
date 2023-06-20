<?php
  
    $title = 'Utilisateurs';
    $currentPage = 'users';

    require 'inc/head.php'; 
    require 'inc/navbar.php';


$datas = [
    ['letter' => 'a', 'goto' => 10], # 0
    ['letter' => 'e', 'goto' => -1], # 1
    ['letter' => 'e', 'goto' => 6], # 2
    ['letter' => 'l', 'goto' => 1], # 3 
    ['letter' => 'p', 'goto' => 8], # 4
    ['letter' => 'o', 'goto' => 11], # 5
    ['letter' => 'x', 'goto' => 12], # 6
    ['letter' => 'p', 'goto' => 3], # 7
    ['letter' => 'r', 'goto' => 5], # 8
    ['letter' => 'm', 'goto' => 7], # 9
    ['letter' => 'b', 'goto' => 3], # 10
    ['letter' => 'b', 'goto' => 0], # 11 
    ['letter' => 'a', 'goto' => 9] # 12
];

    # exemple : $datas[2]['letter'] = e
    # exemple : $datas[2]['goto'] = 6

    # Objectif : 
        # - récupérer les lettres et les concaténer pour en faire un mot 

    # saisie utilisateur pour démarrer la lecture a un index du tableau 
    # qui va nous donner une lettre (la clé 'letter') et l'index suivant (la clé 'goto') auquel se rendre 
    # pour récuperer l'élément jusqu'à ce que le 'goto' soit égale a -1

    
    // ETAPE 1 - Comprendre et faire la logique du code

    $index = 2; # saisie utilisateur 
    $word = ''; # variable qui va stocker les lettres récupérées


    while($index != -1){ # Tant que l'index est différent de -1 on boucle et exécute les instructions 

        echo '<p>$index actuelle = '. $index .'<p>' ;

        $word = $word . $datas[$index]['letter']; # on ajoute la lettre a stocker
        // $word .= $datas[$index]['letter']; # on ajoute la lettre a stocker
    
        $index = $datas[$index]['goto']; # On récupére l'index suivant et 
        # on le stocke(redéfinie la valeur de $index) dans la variable $index
        
        echo '<p>$word = ' . $word . ' et le nouveau $index = '. $index .'<p><br>';

    }


?>

    <div class="container">


        

    <hr>
  <h2>DEBUG</h2>
  <pre>
      <?php var_dump($word);?>
  </pre>

    </div>



<?php require 'inc/foot.php'; ?>


