<?php 
require_once 'lib/functions.php';
require_once 'lib/_helpers/tools.php';
require_once 'config/ini.php';

?>

<!-- <div class="section">
  <div class="card is-shadowless">
    <div class="card-content">
      <a href="index.php?ctrl=user&action=usersList" class="button is-dark ">Voir utilisateurs</a>
      <a href="index.php?ctrl=conversation&action=conversationsList" class="button is-dark ">Voir Conversations</a>            
    </div>
  </div>
</div> -->

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
  $controller = new NainController;
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
  $controller->nainsList();
}

require 'inc/foot.php'; 
?>