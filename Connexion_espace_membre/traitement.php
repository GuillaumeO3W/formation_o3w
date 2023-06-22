<?php
session_start(); 
?>

<?php
$users=[
    [
        'id'=>'1',
        'pwd'=>'111',
        'name'=>'John',
        'lastname'=>'Do',
        'role'=>'superadmin'
    ],
    [
        'id'=>'2',
        'pwd'=>'222',
        'name'=>'Luc',
        'lastname'=>'Skywalker',
        'role'=>'admin'
    ],
    [
        'id'=>'3',
        'pwd'=>'333',
        'name'=>'Antonio',
        'lastname'=>'Montana',
        'role'=>'invite'
    ],
];

if(isset($_POST['id'])){
    $_SESSION['name'] = $_POST['id'];
}elseif(isset($_SESSION['name'])){
    $_SESSION['name']=$_SESSION['name'];
}else{
    $_SESSION['name']=null;
}

foreach ($users as $index => $user):
    if($_SESSION['name']==$user['id']){
        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = $user['role'];
        $connect='ok';
        if($_POST['pwd']==$user['pwd']){
            $_SESSION['lastname'] = $user['lastname'];
        }else{
            header('location: index.php?wrongpwd');
        }
    }
endforeach;

if($_SESSION['name']==null){
    header('location: index.php?error ');
}

include ('nav.php');
?>

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
