<?php

class Model extends FluentModel {

    function __construct()
    {
        if(get_config('sessions')){
            $this->session = get_config('sessions');
        }
        parent::__construct();
    }

}