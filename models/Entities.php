
<?php 

class Entities extends  Model {



    function __construct()
    {
        parent::__construct();
        
    }

    function getEnities(){
       return $results = $this->quickSelect();
    }

    function getEntity(){
        $this->limit = 1;
        $this->orderBy = "RAND()";
        $results = $this->quickSelect();
        if(isset($this->primaryKey)){
            $results->where($this->primaryKeyColumn, $this->primaryKey);
        }
        return $results->fetch();
    }

    function getEntitiesByCategory($categoryId){

        return  $this->from($this->table)->
        select($this->getDataColumns())->
        limit($this->limit)->
        where('categoryId', $categoryId)->orderBy($this->orderBy)->fetchAll();
    }
}