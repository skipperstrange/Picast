<?php

class Categories extends Model{

    function __construct(){
        parent::__construct();
        $this->orderBy = "name ASC";
    }
}