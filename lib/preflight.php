<?php

// All preflight checks configuration file and applies settings before app runs up can be done here.

//load mode of the application instance
$__mode = get_config('mode');
if( $__mode == 'development'){
    ini_set('display_error', 1);
}elseif(get_config('mode') == 'production'){
    ini_set('display_error', 0);
}

//database initializer. sets up db connection. and options
$__db_creds = get_config('database');
if($__db_creds['db_auto']){
    try{
        $__db = new PDO("mysql:host=$__db_creds[host];dbname=$__db_creds[database]", 
                        $__db_creds['username'], 
                        $__db_creds['password']);

                        
        if($__mode == 'development'){
            $__db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
        }
        if($__db_creds['persist']){
            $__db->setAttribute(PDO::ATTR_PERSISTENT, true);
        }

        /**
         * Expreimental********
         * foreach($__db['options'][$__mode] as $options){
            foreach($options as  $option => $value){
                $__db->setAttribute($option, $value);
            }
        }
         */
        
        set_config('db', $__db);
    }
    catch (PDOException $e){
        if($__mode == 'development'){
        exit("Database connection failed: ".$e->getMessage());
        }
    }
}


/**
 * classes to auto load at runtime - see config
 * Thes are class files place in lib/classes. (CLASS_PATH)
 */
$__autoload = get_config('auto_load');
if($__autoload['enable']){
    if(count($__autoload['classes']) > 0){
        foreach($__autoload['classes'] as $file){
            include_once(CLASS_PATH. $file.'.php');
        }
    }

    if(count($__autoload['libs']) > 0){
        foreach($__autoload['libs'] as $file){
            include_once(LIB_PATH. $file.'.php');
        }
    }
}

/**
     * Configuring child classes
     */
    $__class_children = get_config('child_classes');
    if($__class_children['enable']){
        if(count($__class_children['classes']) > 0){
            foreach($__class_children['classes'] as $classes_object){
                 foreach($classes_object as $class_file => $parent){
                     if($__class_children['auto_parent']){
                        include_once(CLASS_PATH. $parent.'.php');
                     }
                     include_once(CLASS_PATH. $class_file.'.php');
                 }
                
            }
        }
    }

    // setup default session class
    if(class_exists('Sessions')){
        $__sessions = new Sessions;
        set_config('sessions', $__sessions); 
    }

    
    //Setup controller guards
    $__gaurds = get_config('guards');
    $act = @$_GET[CONTOLLER];
    foreach($__gaurds['auth_required'] as $auth_guarded => $redirect){
        if($__sessions->isAuthenticated() !== true){
            if($act == $auth_guarded){
                redirect_to($redirect);
            }
        }
    }

    foreach($__gaurds['auth_not_required'] as $auth_guarded => $redirect){
        if($__sessions->isAuthenticated() === true){
            if($act == $auth_guarded){
                redirect_to($redirect);
            }
        }
    }






