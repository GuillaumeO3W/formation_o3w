<?php 

class TaverneController 
{
    public function tavernesList()
    {
        $model = new TaverneModel;
        $datas = $model->readAll();
        $tavernes = [];
        if(count($datas) > 0){
            foreach($datas as $data){
                $tavernes[] = new Taverne($data);
            }
        }
        $title = 'TavernesList';
        $nbTavernes = $model->countNbTavernes();
        include './Views/tavernes/tavernesList.php';
    }
    public function taverneView()
    {
        isset($_GET['id']) ? $_GET['id'] = $_GET['id'] : $_GET['id'] = 1;
        $taverneModel = new TaverneModel;
        $taverne = $taverneModel->readOne($_GET['id']);
        $taverne = new Taverne($taverne);
        include './Views/tavernes/taverneView.php';
    }
}