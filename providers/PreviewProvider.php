<?php

class PreviewProvider {

    public $EntityModel;
    public $CategoryModel;

    function __construct()
    {
        
        $this->EntityModel = auto_load_model('Entities');
        $this->CategoryModel = auto_load_model('Categories');
       
        $this->EntityModel->setData(['id'=>'','name'=>'', 'thumbnail'=>'', 'preview'=>'', 'categoryId'=>'']);
        $this->CategoryModel->setData(['id'=>'','name'=>'']);
    }


    function getRandomEntity(){
        return $this->EntityModel->getRandomEntity();
    }

    function getCategory($id = null){
        if($id){
            $this->CategoryModel->setPrimaryKey($id);
        }
        return $this->CategoryModel->quickSelect()->fetchAll();
    }


    function getCategoryEntities($id = null){

        $CategoryEntities = $this->getCategory($id);
        foreach($CategoryEntities as $Entities => $val){
           $CategoryEntities[$Entities]['entities'] = $this->EntityModel->getEntitiesByCategory($CategoryEntities[$Entities]['id']);
        }
        return $CategoryEntities;
    }


}