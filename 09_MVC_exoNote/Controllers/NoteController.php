<?php 

class NoteController 
{
    public function index()
    {
        $model = new NoteModel;
        $datas = $model->readAll();
        $notes = [];
        if(count($datas) > 0){
            foreach($datas as $data){
                $notes[] = new Note($data);

            }
        }
        $nbNotes = $model->countNbNotes();
        include './Views/notes/index.php';
    }
    
    public function show()
    {
        isset($_GET['id']) ? $_GET['id'] = $_GET['id'] : $_GET['id'] = 1;
        $noteModel = new NoteModel;
        $note = $noteModel->readOne($_GET['id']);
        $note = new Note($note);
        include './Views/notes/show.php';
    }

}