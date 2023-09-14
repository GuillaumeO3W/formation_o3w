<?php 


class UserController 
{
    // private $_title;

    // public function __construct($title)
    // {
    //     $this->_title = $title;
    //     require 'inc/head.php';
    // }


    # READALL - Affichage de tous les users
    public function index(){

        $model = new UserModel;
        $datas = $model->readAll();

        $users = [];

        if(count($datas) > 0){
            foreach($datas as $data){
                $users[] = new User($data);
            }
        }

        $title = 'UsersList';

        include './views/users/index.php';

    }

    # READONE - Affichage d'un user
    public function show($id){

        $model = new UserModel;
        $datas = $model->readOne($id);

        if(count($datas) > 0){
            $user = new User($datas);
        }

        include './views/users/show.php';

    }

    # CREATE - Affichage du formulaire pour la création d'un user
    public function create() {

        include './views/users/create.php';

    } 

    # TRAITEMENT DU CREATE - Récupère le $_POST pour le transmettre au model et faire la redirection vers la liste des users 
    public function store($request){

        # FAIRE VERIF
        # FAIRE ENCRYTAGE MDP

        $model = new UserModel;
        $id = $model->create($request);

        if($id){
            header('Location: ./index.php?adduser=success');
        }else {
            header('Location: ./index.php?adduser=error');
        }

    }

    # UPDATE - Affichage du formulaire avec les données d'un user 
    public function edit($id){
        $model = new UserModel;
        $datas = $model->readOne($id);

        if(count($datas) > 0){
            $user = new User($datas);
        }

        include './views/users/edit.php';
    }

    # TRAITEMENT UPDATE - On récupère l'id du user qu'on modifie ainsi que les données modifiées pour les transmettre au modele
    public function update($id, $request){

        $model = new UserModel;
        $upd = $model->update($id, $request);

        if($upd){
            header('Location: ./index.php?edituser=success');
        }else {
            header('Location: ./index.php?edituser=error');
        }

    }


    # DELETE - Suppression du user choisi
    public function delete($id){

        $model = new UserModel;
        $del = $model->delete($id);

        if($del){
            header('Location: ./index.php?deleteuser=success');
        }else {
            header('Location: ./index.php?deleteuser=error');
        }

    }

}