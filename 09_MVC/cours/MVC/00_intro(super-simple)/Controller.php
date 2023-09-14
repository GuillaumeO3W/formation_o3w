<?php

class Controller 
{

    public function action()
    {
        $model = new Model;
        $data = $model->getData();
        require 'view.php';
    }

}