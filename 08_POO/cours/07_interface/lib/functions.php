<?php

function loadClass(string $className)
{
    if(file_exists('class/'. $className . '.php'))
    {
        require_once('class/'. $className .'.php');
    }
}

spl_autoload_register('loadClass');


function loadInterfaces(string $interfaceName)
{
    if(file_exists('interfaces/'. $interfaceName . '.php'))
    {
        require_once('interfaces/'. $interfaceName .'.php');
    }
}

spl_autoload_register('loadInterfaces');