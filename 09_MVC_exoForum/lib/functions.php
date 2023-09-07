<?php 
function loadClass($className){
    if(file_exists('class/'.$className.'.php')){
        require_once 'class/'.$className.'.php';
    }
}
spl_autoload_register('loadClass');

function loadModel($modelName){
    if(file_exists('models/'.$modelName.'.php')){
        require_once 'models/'.$modelName.'.php';
    }
}
spl_autoload_register('loadModel');

function loadController($controllerName){
    if(file_exists('controllers/'.$controllerName.'.php')){
        require_once 'controllers/'.$controllerName.'.php';
    }
}
spl_autoload_register('loadController');

