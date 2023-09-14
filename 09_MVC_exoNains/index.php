<?php 
require_once 'lib/functions.php';
require_once 'lib/_helpers/tools.php';
require_once 'config/ini.php';

?>

<div class="section">
  <div class="card is-shadowless">
    <div class="card-content">
      <a href="index.php?ctrl=nain&action=nainsList" class="button is-dark ">Liste des Nains</a>
      <a href="index.php?ctrl=ville&action=villesList" class="button is-dark ">Liste des Villes</a>            
      <a href="index.php?ctrl=taverne&action=tavernesList" class="button is-dark ">Liste des Tavernes</a>            
      <a href="index.php?ctrl=groupe&action=groupesList" class="button is-dark ">Liste des Groupes</a>            
    </div>
  </div>
</div>

<?php 
$ctrl = 'NainController';
if(isset($_GET['ctrl']))
{
    $ctrl = ucfirst(strtolower($_GET['ctrl'])).'Controller';
}
$method = 'nainsList';
if(isset($_GET['action']))
{
    $method = $_GET['action'];
}

try{
    if(class_exists($ctrl)){
        $controller = new $ctrl;
        if(!empty($_POST))
        {
            if(method_exists($controller, $method)){
                if(!empty($_GET['id']) && ctype_digit($_GET['id']))
                {
                    $controller->$method($_GET['id'], $_POST);
                }else 
                {
                    $controller->$method($_POST);
                }
            }
        }else 
        {
            if(method_exists($controller, $method)){
                if(!empty($_GET['id']) && ctype_digit($_GET['id']))
                {
                    $controller->$method($_GET['id']);
                }else 
                {
                  $controller->$method();
                }
            }
        }
    }

}catch(Exception $e ){
    die($e->getMessage());
}



// if(!empty($_GET['ctrl']))
// {
//   $controllerName = ucfirst(strtolower($_GET['ctrl'])).'Controller';
//   if(class_exists($controllerName))
//   {
//     $controller = new $controllerName;

//   }
// }
// else
// {
//   $controller = new NainController;
// }



// if(!empty($_GET['action']))
// {
//   $methodName = $_GET['action'];
//   if(method_exists($controller, $methodName))
//   {
//       $controller->$methodName();
//   }
// }
// else
// {
//   $controller->nainsList();
// }

require 'inc/foot.php'; 
?>