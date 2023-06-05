<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Chainee</title>
</head>
<body>
<form method="POST">
    <input type="number" name="index">
    <input type="submit">
</form>
<?php

$datas = [
    ['letter' => 'a', 'goto' => 10],   /* 0 */
    ['letter' => 'e', 'goto' => -1],   /* 1 */
    ['letter' => 'e', 'goto' => 6],    /* 2 */
    ['letter' => 'l', 'goto' => 1],    /* 3 */
    ['letter' => 'p', 'goto' => 8],    /* 4 */
    ['letter' => 'o', 'goto' => 11],   /* 5 */
    ['letter' => 'x', 'goto' => 12],   /* 6 */
    ['letter' => 'p', 'goto' => 3],    /* 7 */
    ['letter' => 'r', 'goto' => 5],    /* 8 */
    ['letter' => 'm', 'goto' => 7],    /* 9 */
    ['letter' => 'b', 'goto' => 3],    /* 10 */
    ['letter' => 'b', 'goto' => 0],    /* 11 */
    ['letter' => 'a', 'goto' => 9]     /* 12 */
];

if (isset($_POST['index'])){
    $index = $_POST['index'];
}else{
    $index = null;
}

$word =null;

while ($index != -1){
    $word.= $datas[$index]['letter'];
    $index = $datas[$index]['goto'];
}
echo $word;
?>
</body>
</html>






