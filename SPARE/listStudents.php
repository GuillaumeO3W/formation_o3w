<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Elèves</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<h1 class="text-center">SPARE</h1>


<form method="POST" class="d-flex flex-column gap-2 mx-auto mt-5">
    <label>Choisir la classe :</label>
    <select name="classId">
        <option value="">-----</option>
        <option value="cine1">Cinéma 1</option>
        <option value="cine2">Cinéma 2</option>
        <option value="3d1">3D 1</option>
    </select>
    <input type="submit" name="submit" value="Valider" class="btn btn-primary"/>
</form>

<!-- ----------------------------------------------------------- -->
<!-- <form  method="post" class="d-flex flex-column gap-2 mx-auto mt-5">
    <input type="text" name="name" placeholder="Nom">
    <input type="text" name="lastname" placeholder="Prénom">
    <select name="classId">
        <option value="cine1">Cinéma 1</option>
        <option value="cine2">Cinéma 2</option>
        <option value="3d1">3D 1</option>
    </select>
    <input type="submit" name="submit" value="Ajouter un élève" class="btn btn-primary"/>
</form>
// 
// foreach($students as $value){
//     $value['name'][]=$_POST['name'];
//     $value['lastname'][]=$_POST['lastname'];
//     $value['class'][]=$_POST['classId'];
// }
// ------------------------------------------------------------------------

<?php

// -------------------BDD ELEVES ----------------------

$students = [
    [
        'name' => 'jean',
        'lastname' => 'jean',
        'class' => 'cine1'
    ],
    [
        'name' => 'martin',
        'lastname' => 'dupont',
        'class' => 'cine1'
    ],
    [
        'name' => 'penelope',
        'lastname' => 'cruz',
        'class' => 'cine2'
    ],
    [
        'name' => 'jean',
        'lastname' => 'dujardin',
        'class' => '3d1'
    ],
    [
        'name' => 'didier',
        'lastname' => 'deschamp',
        'class' => 'cine2'
    ],
    [
        'name' => 'manu',
        'lastname' => 'macron',
        'class' => '3d1'
    ],
];
// ----------------------------------------------------------------


    function listStudent($students,$selectedClass){
        echo "<div class=\"container mt-4\">
            Les élèves de la classe ".$_POST['classId']." sont : ";
        echo '
                <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th class="mx-auto"></th>
                    </tr>
                </thead>
                <tbody>
                    ';
            foreach ($students as $value){    
                foreach ($value as  $data){
                    if($data == $selectedClass){
                        echo '<tr>
                                <td class="col-sm-1 text-capitalize">'.$value['name'].'</td>'.
                                '<td class="text-capitalize">'.$value['lastname'].'</td>'.
                            '</tr>';
                    }
                }
            }
        echo "</tbody></table></div>";  
    }

$selectedClass = $_POST['classId'];
listStudent ($students,$selectedClass);
?>

</body>
</html>