<?php  //if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// This function must always be availible
function is_secure_connection(){
    $secure_connection = 0;    
    if(isset($_SERVER['HTTPS'])){        
        $secure_connection = 1;        
        if ($_SERVER["HTTPS"] == "on"){
               return $secure_connection;
            }else{
                $secure_connection = 0;
            }
        return $secure_connection;
    }
    return $secure_connection;
}


define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

define('DS', '/');
define('UP_ONE', '../');

define('APP', basename(dirname(dirname(__FILE__))));


if(is_secure_connection() == 0):
define('BASE_URL', 'http://' . $_SERVER['HTTP_HOST'].DS.APP . DS);
define('WEB_URL', 'http://' . $_SERVER['SERVER_NAME'].DS.APP  . DS);
elseif(is_secure_connection() == 1):
define('BASE_URL', 'https://' . $_SERVER['HTTP_HOST'].DS.APP  . DS);
define('WEB_URL', 'https://' . $_SERVER['SERVER_NAME'].DS.APP  .  DS);
endif;

define('BASE_LINK', WEB_URL);

//ResourcesPath
define('CSS_PATH', WEB_URL . 'assets' . DS . 'css' . DS);
define('JS_PATH', WEB_URL . 'assets' . DS . 'js' . DS);

//controllers
define('CONTOLLER', 'action');
define('CONTOLLER_PATH', 'controllers'.DS);

//Library paths
define('LIB_PATH', 'lib'.DS);
define('CONFIG_PATH', LIB_PATH.'config'.DS);
define('CLASS_PATH', LIB_PATH.'classes'.DS);
define('CUSTOM_LIB', LIB_PATH.'custom'.DS);

//models
define('MODEL', 'models');
define('MODELS_PATH', MODEL.DS);

define('PROVIDERS_PATH', 'providers'.DS);
define('HELPERS_PATH', 'helpers'.DS);

//views
define('VIEW', 'views');
define('VIEWS_PATH', VIEW.DS);

define('CLIENT_VIEWS_PATH', VIEWS_PATH.'client'.DS);
define('ADMIN_VIEWS_PATH', VIEWS_PATH.'admin'.DS);



