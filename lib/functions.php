<?php

function redirect_to($action=null)
{
    $action = _link($action);
   header('location:'.$action );
  exit;
}


function anchor_link($text='',$action=null, $attributes=[])
{
    //$arr = array_walk($attributes, 'set_attributes', $attributes);
    $attr = "";
    if(!empty($attributes)){
        foreach($attributes as $proberty => $value){
            $attr .= " $proberty=\"$value\"";
        }
    }

    $link = _link($action);
    
   return "<a href=\"$link\" $attr>$text</a>";
}

function set_attributes($attributes=[]){
    $attr = "";
    if(!empty($attributes)){
        foreach($attributes as $proberty => $value){
            $attr .= " $proberty=\"$value\"";
        }
    }
    return $attr;
}

 /**
 * generates url link for 
 * @param string 'post' or 'get', 'p' or 'g'
 * @param string optional key  $key
 * @return bool true or false
 */
function _link($action = ""){
    
    if(trim($action) == '') : 
        $url ='?';
    elseif(trim($action)== '#'):
        $url ='#';
    else:
        $url = "?action=$action";
    endif;
    return $url;
}
 //checks if post or get value is not null
 /**
 * Check for get post in requests
 * @param string 'post' or 'get', 'p' or 'g'
 * @param string optional key  $key
 * @return bool true or false
 */
 function check_post_get($post_or_get, $key = null, $value = null){
    if(trim($post_or_get) == 'get' || trim($post_or_get) == 'g'){
        if(isset($_GET[$key]) && trim($_GET[$key]) != ''){
            if(trim($value) != ''){
                if(trim($_GET[$key]) == "$value"){
                    return true;
                }
                return false;
            }
                return true;
            }
    }
    if(trim($post_or_get) == 'post' || trim($post_or_get) == 'p'){
        if(isset($_POST[$key]) && trim($_POST[$key]) != ''){
            if(trim($value) != ''){
                if(trim($_POST[$key]) == "$value"){
                    return true;
                }
                return false;
            }
                return true;
            }
    }
    return false;
}



//Formatting date and time
/**
 * format date month
 * @param mysql timestamp $mysql_timestamp
 * @param format string $format = 'M j'
 * @return string
 */
function format_time($format ,$mysql_timestamp)
{
    $unix_time = strtotime($mysql_timestamp);
    return date($format, $unix_time);
}

function sanitizeFormString($string){
    return $string = trim(strip_tags($string));
}

function proper_nouns(string $string){
    return ucfirst(strtolower($string));
}

function check_key_exists($array, $arrayKey=null){
    if(isset($array[$arrayKey])){
        return true;
    }   
    return false;
}