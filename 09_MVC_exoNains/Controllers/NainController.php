<?php 

class NainController 
{

    public function nainsList()
    {

        $model = new NainModel;
        $datas = $model->readAll();
        $nains = [];
        if(count($datas) > 0){
            foreach($datas as $data){
                $nains[] = new Nain($data);

            }
        }
        $title = 'nainsList';
        $nbNains = $model->countNbNains();
        include './Views/nains/nainsList.php';
    }
    public function nainView()
    {
        isset($_GET['id']) ? $_GET['id'] = $_GET['id'] : $_GET['id'] = 1;
        $nainModel = new NainModel;
        $nain = $nainModel->readOne($_GET['id']);
debug($nain);
        $nain = new Nain($nain);
        include './Views/nains/nainView.php';
    }

}