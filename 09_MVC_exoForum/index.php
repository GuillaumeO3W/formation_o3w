<?php 
require_once 'lib/functions.php';
require_once 'lib/_helpers/tools.php';
require_once 'config/ini.php';
require_once 'Controllers/UserController.php'; 
require_once 'Models/CoreModel.php';
require_once 'Models/UserModel.php';

$ctrl = 'UserController';
if(isset($_GET['ctrl']))
{
  $ctrl = ucfirst(strtolower($_GET['ctrl'])).'Controller';
}

$method = 'userList';
if(isset($_GET['action']))
{
  $method = $_GET['action'];
}

try
{
  if(class_exists($ctrl))
  {
    $controller = new $ctrl;
    if(method_exists($controller, $method))
    {
      $controller->$method();
    }
  }
}
catch(Exception $e)
{
  die($e->getMessage());
}






?>

        <!-- <h1 class="title">Dashboard</h1>
        <div class="section">
          <div class="card is-shadowless">
            <div class="card-content">
            <a href="Views/users/usersList.php" class="button is-dark ">Voir utilisateurs</a>
            </div>
          </div>
        </div>


        <div class="section">
          <div class="card is-shadowless">
            <div class="card-content">
            <a href="Views/conv/conversations.php" class="button is-dark ">Voir Conversations</a>
            </div>
          </div>
        </div> -->


<?php 
        require 'inc/foot.php'; 
?>