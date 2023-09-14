<?php 
require_once 'lib/functions.php';
require_once 'lib/_helpers/tools.php';
require_once 'config/ini.php';
require 'inc/head.php';
?>
  <div class="card is-shadowless">
    <div class="card-content">
        <div class="columns is-centered">
            <div class="is-flex">
                <div class="column">
                    <a href="index.php?ctrl=nain&action=nainsList" class="button is-dark">Liste des Nains</a>
                </div>
                <div class="column">
                    <a href="index.php?ctrl=ville&action=villesList" class="button is-dark">Liste des Villes</a>
                </div>
                <div class="column">            
                    <a href="index.php?ctrl=taverne&action=tavernesList" class="button is-dark">Liste des Tavernes</a>  
                </div>
                <div class="column">          
                    <a href="index.php?ctrl=groupe&action=groupesList" class="button is-dark">Liste des Groupes</a> 
                </div>
            </div>
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




require 'inc/foot.php'; 
?>