<?php
/**
 * This file contains system functions 
 */
include_once 'constants.php';

//get a cofiguration value
function get_config(string $key){
    global $config;
    return @$config[$key];
}

//get a cofiguration value from custom config file
function getr_config(string $config_file, string $key){
    load_config($config_file);
    return get_config($key);
}

//set a cofiguration value
function set_config(string $key, $value){
    global $config;
    return $config[$key] = $value;
}

//system encryption function. uses encrypt option in config file config 
function encrypt($value, $hash = ['sha512']){
    $enc_opt = get_config('encryption');
    foreach($hash as $h => $function){
        $value = hash($function, $value);
    }
    $value = ($enc_opt['enable'] == true)? crypt($value, $enc_opt['salt']) : $value;
  return  $value;
}

//loads files. return set to true returns full file path
function load_file(string $file, $return = false){
    if($return){
        return $file;
    }
    include_once $file;
}

//load a config file
function load_config(string $file){
    load_file(CONFIG_PATH.$file.'.php');
}

//load files from custom lib folder
function load_custom_library(string $file){
    load_file( CUSTOM_LIB.$file.'.php');
}


//load and instatiate class from anywhere
function load_class(string $file = null,  $instantiate=false , $class_name = ''){
    if(trim($file) !== '' ){
        load_file($file.'.php');
        if($instantiate == true){
            if(trim($class_name) !== ''){
                if(class_exists($class_name)){
                    return new $class_name();
                }
            }
        return $file = new $file();
        }
    }
}

function load_helper($file = null,  $instantiate = false, $class_name = ''){
    return load_class(HELPERS_PATH.$file,$instantiate, $class_name);
}


//load a config file
function load_model(string $file){
    load_file(MODELS_PATH.$file.'.php');
}

function auto_load_model(string $file){
    load_file(MODELS_PATH.$file.'.php');
    if(class_exists($file)){
        return $file = new $file;
    }
}

//load a config file
function load_provider(string $file){
    load_file(PROVIDERS_PATH.$file.'.php');
}

function auto_load_provider(string $file){
    load_file(PROVIDERS_PATH.$file.'.php');
    if(class_exists($file)){
        return $file = new $file;
    }
}

function render(string $view_file , $data = []){
    extract($data);
    if(IS_AJAX){
        return @$view_file.'.php';
    }
    @include $view_file.'.php';
}

//loads view file from client folder
function render_client(string $view_file, $data = []){

    if($view_file !== ''){
        if(file_exists(CLIENT_VIEWS_PATH.$view_file.'.php')){
        render(CLIENT_VIEWS_PATH.$view_file, $data);
        }else{
            render(VIEWS_PATH.'_404', $data);
        }
    }else{
        render('', $data);
    }
    
}

//loads view file from admin
function render_admin(string $view_file, $data = []){
    return render(ADMIN_VIEWS_PATH.$view_file, $data);
}


//loads default client template 
function render_client_layout($layout = '_layout', $data){
    if(trim($layout) == ''){$layout = '_layout';}
    render(VIEWS_PATH.$layout, $data);
}


//loads default admin template 
function render_admin_layout($layout = '_admin'){
    if(trim($layout) == ''){$layout = '_admin';}

    render(VIEWS_PATH.$layout);
}


//Sets title of pages
function set_page_title( $title=''){
    global $config;
    if(trim($title) == ''){
        return $config['page_title'] = APP;
    }
    return $config['page_title'] = APP.' - '.$title;
}

function json_response($message = null, $code = 200, $headers = [''])
{
    // clear the old headers
    header_remove();
    // set the actual code
    http_response_code($code);

    // set the header to make sure cache is forced
    header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
    // treat this as json
    header('Content-Type: application/json');
    if(count($headers) > 0):
        foreach($headers as $header => $value){
            header("$header: $value");
        }
    endif;
    $status = array(
        200 => '200 OK',
        201 => '201 Created',
        204 => '204 No Content',
        205 => 'Reset Content',
        304 => 'Not Modified',
        400 => '400 Bad Request',
        401 => '401 Unauthorized',
        402 => '402 Payment Required',
        403 => '403 Forbidden',
        404 => '404 Not Found',
        405 => '405 Method Not Allowed',
        408 => '408 Request Timeout',
        422 => '422 Unprocessable Entity',
        500 => '500 Internal Server Error'
        );
    // ok, validation error, or failure
    header('Status: '.$status[$code]);
    // return the encoded json
    return json_encode(array(
        'status' => $code , // success or not?
        'message' => $message
        ));
}


