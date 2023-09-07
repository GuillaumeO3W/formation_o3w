<?php 

class UserController 
{
    // private $_title;

    // public function __construct($title)
    // {
    //     $this->_title = $title;
    //     require 'inc/head.php';
    // }

    public function usersList()
    {

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
    public function userView()
    {
        isset($_GET['id']) ? $_GET['id'] = $_GET['id'] : $_GET['id'] = 1;
        $userModel = new UserModel;
        $user = $userModel->readOne($_GET['id']);
        $user = new User($user);
        include './Views/users/userView.php';
    }

}