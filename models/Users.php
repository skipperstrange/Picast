<?php


class Users extends FluentModel {
    
    function __construct()
    {
        $this->setUniqueColumn('username');
        parent::__construct();
    }

    function login(){
        
        $query = $this->from($this->table)->select('username')->where($this->data);
        $user = $query->fetch();
        if(isset($user['id'])){
            print_r($user);
            return true;
        }
        return false;
    }
    
}