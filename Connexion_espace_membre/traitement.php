<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
<?php
$users=[
    [
        'id'=>'1',
        'pwd'=>'111',
        'name'=>'John',
        'lastname'=>'Do'
    ],
    [
        'id'=>'2',
        'pwd'=>'222',
        'name'=>'Luc',
        'lastname'=>'Skywalker'
    ],
    [
        'id'=>'3',
        'pwd'=>'333',
        'name'=>'Antonio',
        'lastname'=>'Montana'
    ],
];

$_SESSION['name'] = null;

foreach ($users as $index => $user):
    if($_POST['id']==$user['id']){
        $_SESSION['name'] = $user['name'];
        if($_POST['pwd']==$user['pwd']){
            $_SESSION['lastname'] = $user['lastname'];
        }else{
            header('location: index.php?wrongpwd ');
        }
    }
endforeach;

if($_SESSION['name'] == null){
    header('location: index.php?error ');
}

?>
<div class="fixed-top">
    <ul class="nav nav-underline justify-content-center">
        <li class="nav-item"><a class="nav-link"  href="page1.php">page1</a></li>
        <li class="nav-item"><a class="nav-link" href="page2.php">page2</a></li>
        <li class="nav-item"><a class="nav-link" href="page3.php">page3</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?logout">Déconnexion</a></li>
    </ul>
</div>

<div class="container d-flex flex-column min-vh-100 justify-content-center align-items-center">
    <p>Hello</p>
    <p class="fw-bold"><?= $_SESSION['name']. " ".$_SESSION['lastname']  ?></p>
</div>




<!-- DEBUG ---------------------------- -->
<div class="d-none ">
    <h2 >Debug</h2>
    <pre class="text-warning"><?php print_r($_SESSION); ?></pre>
    <pre class="text-info"><?php print_r($users); ?></pre>
</div>

</body>
</html>
