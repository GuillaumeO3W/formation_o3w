<?php 


class UserController 
{
    // private $_title;

    // public function __construct($title)
    // {
    //     $this->_title = $title;
    //     require 'inc/head.php';
    // }

    public function userList(){

        $model = new UserModel;
        $datas = $model->readAll();

        $users = [];

        if(count($datas) > 0){
            foreach($datas as $data){
                $users[] = new User($data);
            }
        }

        $title = 'UsersList';

        include './Views/users/usersList.php';

    }

    public function show(){

        include './Views/users/userView.php';

    }

}