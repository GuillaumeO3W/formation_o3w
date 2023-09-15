<?php 

class VilleController 
{
    public function villesList()
    {
        $model = new VilleModel;
        $datas = $model->readAll();
        $villes = [];
        if(count($datas) > 0){
            foreach($datas as $data){
                $villes[] = new Ville($data);

            }
        }
        $title = 'VillesList';
        $nbVilles = $model->countNbVilles();
        include './Views/villes/villesList.php';
    }
    public function villeView()
    {
        isset($_GET['id']) ? $_GET['id'] = $_GET['id'] : $_GET['id'] = 1;
        $villeModel = new VilleModel;
        $ville = $villeModel->readOne($_GET['id']);
        $ville = new Ville($ville);
        include './Views/villes/villeView.php';
    }

}