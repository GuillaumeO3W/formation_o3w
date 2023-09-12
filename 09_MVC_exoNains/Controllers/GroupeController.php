<?php 

class GroupeController 
{
    public function groupesList()
    {
        $model = new GroupeModel;
        $datas = $model->readAll();
        $groupes = [];
        if(count($datas) > 0){
            foreach($datas as $data){
                $groupes[] = new Groupe($data);

            }
        }
        $nbGroupes = $model->countNbGroupes();
        include './Views/groupes/groupesList.php';
    }
    public function groupeView()
    {
        isset($_GET['id']) ? $_GET['id'] = $_GET['id'] : $_GET['id'] = 1;
        $groupeModel = new GroupeModel;
        $groupe = $groupeModel->readOne($_GET['id']);
        $groupe = new Groupe($groupe);
        include './Views/groupes/groupeView.php';
    }

}