<?php 
function loadClass($className){
    if(file_exists('class/'.$className.'.php')){
        require_once 'class/'.$className.'.php';
    }
}
spl_autoload_register('loadClass');

function loadModel($modelName){
    if(file_exists('Models/'.$modelName.'.php')){
        require_once 'Models/'.$modelName.'.php';
    }
}
spl_autoload_register('loadModel');

function loadController($controllerName){
    if(file_exists('Controllers/'.$controllerName.'.php')){
        require_once 'Controllers/'.$controllerName.'.php';
    }
}
spl_autoload_register('loadController');