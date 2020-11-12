<?php

class Sessions {

    function __construct(){
            $this->start();
    }

    function start(){
        session_start();
    }

    function isAuthenticated(){
        if($this->get('logged_in') == 1){
            return true;
        }
        return false;
    }

    function setLogIn(){
        $this->set('logged_in',true);
    }

    function setLogOut(){
        $this->set('logged_in',null);
    }

    function set($key='', $value){
        if(trim($key) !== ''){
            $_SESSION[$key] = $value;
            return;
        }
        $_SESSION[] = $value;
        
    }

    function get($key){
        return @$_SESSION[$key];
    }

    function end(){
        session_destroy();
    }
}