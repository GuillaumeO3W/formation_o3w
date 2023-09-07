<?php 
require_once 'lib/functions.php';
require_once 'lib/_helpers/tools.php';
require_once 'config/ini.php';
// require_once 'Controllers/UserController.php'; 
// require_once 'Controllers/ConversationController.php'; 
// require_once 'Models/CoreModel.php';
// require_once 'Models/UserModel.php';
// require_once 'Models/ConversationModel.php';
?>

<div class="section">
  <div class="card is-shadowless">
    <div class="card-content">
      <a href="index.php?ctrl=user&action=usersList" class="button is-dark ">Voir utilisateurs</a>
      <a href="index.php?ctrl=conversation&action=conversationsList" class="button is-dark ">Voir Conversations</a>            
    </div>
  </div>
</div>

<?php 

if(!empty($_GET['ctrl']))
{
  $controllerName = ucfirst(strtolower($_GET['ctrl'])).'Controller';
  if(class_exists($controllerName))
  {
    $controller = new $controllerName;
  }
}
else
{
  $controller = new ConversationController;
}

if(!empty($_GET['action']))
{
  $methodName = $_GET['action'];
  if(method_exists($controller, $methodName))
  {
    $controller->$methodName();
  }
}
else
{
  $controller->conversationsList();
}



// $ctrl = 'UserController';
// if(isset($_GET['ctrl']))
// {
//   $ctrl = ucfirst(strtolower($_GET['ctrl'])).'Controller';
// }

// $method = 'usersList';
// if(isset($_GET['action']))
// {
//   $method = $_GET['action'];
// }

// try
// {
//   if(class_exists($ctrl))
//   {
//     $controller = new $ctrl;
//     if(method_exists($controller, $method))
//     {
//       $controller->$method();
//     }
//   }
// }
// catch(Exception $e)
// {
//   die($e->getMessage());
// }

require 'inc/foot.php'; 
?>