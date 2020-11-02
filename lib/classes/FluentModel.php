<?php

class FluentModel extends FluentPDO  {

    private $con;
    public $table;
    public $primaryKey;
    public $primaryKeyColumn = 'id';
    protected $data;
    public $uniqueColumn;
    protected $errors = [];
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

    function save($unique = false){
       if(isset($this->primaryKey)){
          return  $this->update($this->table, $this->data, $this->primaryKey)->execute();
      }elseif($unique == true){
        
                if($this->checkUniq()){
                    $this->setError($this->uniqueColumn, $this->data[$this->uniqueColumn].' already exists.');
                    return;
                }
             }
                echo "hi";
                 return  $this->insertInto($this->table, $this->data)->execute(true);
        
    }

    function setPrimaryKey($id){
        $this->primaryKey = $id;
    }
    

    function setPrimaryKeyCoulum($column_name = 'id'){
        $this->primaryKeyColumn = $column_name;
    }

    function  setTable (?string $table = '') {
        $this->table = $table;
    }

    function initData($data){
        if(is_array($data)){
            foreach($data as $field => $value)
                $this->setData($field, $value);
        }
        else{
           $this->data = $data; 
        }
    }

    function setUniqueColumn($column_name = ''){
        $this->uniqueColumn = (isset($column_name)) ? $column_name : $this->primaryKeyColumn;
    }

    function getData(){
        return $this->data;
    }

    function setData($field, $value){
        $this->data[$field] = $value;
    }

    function checkUniq(){
        $check = $this->from($this->table)->where($this->uniqueColumn, $this->data[$this->uniqueColumn]);
       if(count($check)> 0){
            return true;
        }
        return false;
    }

    protected function setError($key, $msg){
        $this->errors[$key] = $msg;
        return;
    }

    public function getErrors(){
        if(count($this->errors) > 0){
            return $this->errors;
        }
    }

    function error(){
        if(count($this->errors) > 0){
            return true;
        }
        return false;
    }
   
}