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


    function getEntity($id = null){
        if($id){
            $this->EntityModel->setPrimaryKey($id);
        }
        return $this->EntityModel->getEntity();
    }

    function getCategory($id = null){
        if($id){
            $this->CategoryModel->setPrimaryKey($id);
        }
        return $this->CategoryModel->quickSelect()->fetchAll();
    }


    function getCategoryEntities($id = null){


        $this->EntityModel->setLimit(21);
        $this->EntityModel->setOrderBy("RAND()");
        $Categories = $this->getCategory($id);
        $CategoryEntities = [];
        foreach($Categories as $Category => $val){
            $entities = $this->EntityModel->getEntitiesByCategory($Categories[$Category]['id']);
            if(count($entities) > 0){
                $Categories[$Category]['entities'] = $entities;
                $CategoryEntities[] = $Categories[$Category];
            }

        }
        
        return $CategoryEntities;
    }


}