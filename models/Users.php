<?php


class Users extends Model {

    function __construct()
    {
        $this->setUniqueColumn('username');
        parent::__construct();
    }

    function login(){
        $query = $this->from($this->table)->select('username')->where($this->data);
        $user = $query->fetch();
       
        if(isset($user['id'])){
            $this->session->set('userid',$user['id']);
            $this->session->set('username',$user['username']);
            $this->session->setLogIn();
            return true;
        }
        $this->setError('login_failed', "Invalid username password combination");
        return false;
    }

    function loggedInUser(){
        $user['userid'] = $this->session->get('userid');
        $user['username'] = $this->session->get('username');
        return $user;
    }

    function logout(){
        $this->session->end();
        $this->session->setLogout();
    }
    
}