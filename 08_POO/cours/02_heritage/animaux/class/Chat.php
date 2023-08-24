<?php 


class Chat extends Animal{

    private string $robe;


    public function __construct($nom,$age,$race,$robe)
    {
        parent::__construct($nom,$age,$race);
        $this->robe = $robe;
    }


    public function getRobe(){
        return $this->robe;
    }

    public function setRobe($value){
         $this->robe = $value;
    }

    public function manger(){
        echo $this->getNom() .' mange dans ton assiette';

        # fonctionne que si la propriete $nom est en protected ou en public dans la classe parente
        echo $this->nom .' mange dans ton assiette';
    }

    public function miaule(){
        echo 'Miaou';
    }

}