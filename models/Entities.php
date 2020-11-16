
<?php 

class Entities extends  Model {



    function __construct()
    {
        parent::__construct();
        
    }

    function getEnities(){
       return $results = $this->quickSelect();
    }

    function getRandomEntity(){
        $this->limit = 1;
        $this->orderBy = "RAND()";
        return $results = $this->quickSelect()->fetch();
    }

    function getEntitiesByCategory($categoryId){
        return  $this->from($this->table)->select($this->getDataColumns())->where('categoryId', $categoryId)->fetchAll();
    }
}