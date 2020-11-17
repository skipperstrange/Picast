<?php

class FluentModel extends FluentPDO  {

    protected $con;
    protected $table;
    protected $primaryKey;
    protected $primaryKeyColumn = 'id';
    public $data;
    protected $contitions = []; // [orderBy=>'', 'limit'=>'', 'random'=>'()']
    protected $limit = null;
    protected $orderBy = "id desc";
    protected $uniqueColumn;
    public $errors = [];
    public $error = false;

    function __construct( $con = null)
    {   
        $this->setTable(strtolower(get_class($this)));
        if($con): 
            $this->con = $con;
        else:
            $this->con = get_config(('db'));
        endif;
        parent::__construct($this->con); 
    }


    public function getDataColumns(){
        $columns = array_keys($this->data);
        foreach($columns as $column){
            $column .= "`$this->table`.`$column`";
        }
        return implode(',', $columns);
    }

    public function quickSelect(){
       
        $query = $this->from($this->table)->select($this->getDataColumns());
        if(isset($this->primaryKey)){
            $query->where($this->primaryKeyColumn, $this->primaryKey)->fetch();
        }else{
            $query->orderBy($this->orderBy);
            if(isset($this->limit) && is_int($this->limit)){
                $query->limit($this->limit);
            }
            $query->fetchAll();
        }
        return $query;
    }

    function save(){
       if(isset($this->primaryKey)){
          return  $this->update($this->table, $this->data, $this->primaryKey)->execute();
      }else{         
            return $this->insertInto($this->table, $this->data)->execute(true);  
        }
    }

    function setPrimaryKey($id){
        $this->primaryKey = $id;
    }

    function getConnection(){
        return $this->con;
    }
    

    function setPrimaryKeyCoulum($column_name = 'id'){
        $this->primaryKeyColumn = $column_name;
    }

    function  setTable (?string $table = '') {
        $this->table = $table;
    }

    function getTable(){
        return  $this->table;
    }

    function setUniqueColumn(string $column_name = ''){
        $this->uniqueColumn = (isset($column_name)) ? $column_name : $this->primaryKeyColumn;
    }

    function getData(){
        return $this->data;
    }

    function setOrderBy($orderBy){
        $this->orderBy = " $orderBy ";
    }

    function setLimit($limit){
        $this->limit = $limit;
    }

    function setData($data){
        if(is_array($data)){
            foreach($data as $field => $value)
                $this->initData($field, $value);
        }
        else{
           $this->data = $data; 
        }
    }

    function initData($field, $value){
        $this->data[$field] = $value;
    }

    function checkUniq(string $column_name = ''){
        if(isset($column_name) && trim($column_name)!= ''){ $this->setUniqueColumn($column_name);}

        $check = $this->from($this->table)->where($this->uniqueColumn, $this->data[$this->uniqueColumn]);
       if(count($check)> 0){
           $this->setError($this->uniqueColumn, $this->data[$this->uniqueColumn].' already exists.');
            return true;
        }
        return false;
    }


    protected function setError($key, $msg){
       $this->errors[$key] = $msg;
    }

    public function getErrors(){
        return $this->errors;
    }

    function error(){
        if(count($this->errors) > 0){
            return true;
        }
        return false;
    }
   
}