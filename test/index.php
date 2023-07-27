<?php
session_start();

$questions = [
    [
        'question' => 'Que signifie PHP ?',
        'options' => ['Page Helper Process', 'Programming Home Pages', 'PHP: Hypertext Preprocessor', 'Pitié Help us Please !'],
        'answer' => 'PHP: Hypertext Preprocessor',
    ],
    [
        'question' => 'Quelle fonction retourne la longueur d\'une chaîne de texte ?',
        'options' => ['strlen', 'strlength', 'length', 'substr'],
        'answer' => 'strlen',
    ],
    [
        'question' => 'Comment accède-t-on au 1er élément chaton dans le tableau suivant : $tableau = [\'chaton\' , \'ornithorynque\', \'dauphin\']; ?',
        'options' => ['$tableau[1]', '$tableau[0]', '$tableau{0}', '$tableau.get(1)'],
        'answer' => '$tableau[0]',
    ],
    [
        'question' => 'Comment vérifie-t-on l\'égalité de deux variables : $a et $b ?',
        'options' => ['$a = $b', '$a == $b', '$a != $b', 'if($a,$b)'],
        'answer' => '$a == $b',
    ],
    [
        'question' => 'La boucle for ($i=0 ; $i<=3 ; $i++ ) { echo $i; }...',
        'options' => ['Sera éxécutée 2 fois', 'Sera éxécutée 3 fois', 'Sera éxécutée 4 fois'],
        'answer' => 'Sera éxécutée 4 fois',
    ],
];

if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

if (!isset($_SESSION['current_question'])) {
    $_SESSION['current_question'] = 0;
}

if (isset($_POST['answer'])) {
    if ($_POST['answer'] == $questions[$_SESSION['current_question']]['answer']) {
        $_SESSION['score']++;
    }
    $_SESSION['current_question']++;
}

if ($_SESSION['current_question'] >= count($questions)) {
    echo "<p>Votre score est de {$_SESSION['score']} sur ".count($questions)."</p>";
    session_destroy();
} else {
    $current_question = $questions[$_SESSION['current_question']];
    echo "<p>{$current_question['question']}</p>";
    echo "<form method='post'>";
    foreach ($current_question['options'] as $index => $answer) {
        echo "<input type='radio' name='answer' value='{$answer}' id='answer{$index}'>";
        echo "<label for='answer{$index}'>{$answer}</label><br>";
    }
    echo "<input type='submit' value='Valider'>";
    echo "</form>";
}
?>