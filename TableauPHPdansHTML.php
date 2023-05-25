<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TableauPHPdansHTML</title>
    <style>
      table, th, td {
        border: 2px solid;
        border-collapse: collapse;
      }
      th,td{
        padding: 8px;
      }
      input {
        display : block;
      }
    </style>
</head>

<body>

<h1>Tableau PHP dans HTML</h1>

<?php  

$vehicules = [
  'Voitures' => ['C3 aircross', 'Passat', 'Dacia Sandero'],
  'Camions' => ['Renault truck', 'Mercedes-Benz Unimog']
];

if($_POST['typeVehicule']==='voiture'){
  $vehicules ['Voitures'][]=$_POST['ajoutVehicule'];
}elseif($_POST['typeVehicule']==='camion'){
  $vehicules ['Camions'][]=$_POST['ajoutVehicule'];
}

echo "<table>";
foreach( $vehicules as $typeVehicule => $groupVehicule ){
  echo "<tr><th>$typeVehicule</th>";
 
  foreach ( $groupVehicule as $modelVehicule ){
   
    echo "<td>$modelVehicule</td>";
  }
  echo "</tr>";
 }
 echo "</table>";

?>

<form  method="POST">
<input type="radio" id="Voiture" name="typeVehicule" value="voiture">
<label for="voiture">Voiture</label>
<input type="radio" id="Camion" name="typeVehicule" value="camion">
<label for="camion">Camion</label>
<input type="text" name="ajoutVehicule">
<input type="submit" value="envoyer">
</form>

</body>
</html>