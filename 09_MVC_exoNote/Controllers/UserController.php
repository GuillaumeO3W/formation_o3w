<?php 

class UserController 
{
    public function index()
    {

        $model = new UserModel;
        $datas = $model->readAll();
        // debug($datas);
        $users = [];
        if(count($datas) > 0)
        {
            foreach($datas as $data)
            {
                $users[] = new User($data);
            }
        }
        $nbUsers = $model->countNbUsers();
        include './Views/users/index.php';
    }

    public function show()
    {
        isset($_GET['id']) ? $_GET['id'] = $_GET['id'] : $_GET['id'] = 1;
        $userModel = new NainModel;
        $user = $userModel->readOne($_GET['id']);
        $user = new User($user);
        include './Views/users/show.php';
    }

    // public function create()
    // {
    //     include './Views/users/create.php';
    // }

    public function edit()
    {
        isset($_GET['id']) ? $id = $_GET['id'] : $id = 1;
        $model = new UserModel;
        $datas = $model->readOne($id);

        if(count($datas) > 0)
        {
            $User = new User($datas);
        }

        include './Views/users/edit.php';
    }

    public function update($id, $request)
    {
        $model = new UserModel;
        $upd = $model->update($id, $request);

        if($upd){
            header('Location: ./index.php?editNain=success');
        }else {
            header('Location: ./index.php?editNain=error');
        }
    }



}