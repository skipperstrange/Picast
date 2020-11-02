<?php


class Users extends FluentModel {
    
    function __construct($con = null)
    {
        $this->setUniqueColumn('username');
        parent::__construct($con);
    }
    
}