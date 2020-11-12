<?php
ob_start();
date_default_timezone_get('Europe/London');

include_once 'lib/constants.php';
include_once CONFIG_PATH.'config.php';
include_once LIB_PATH.'sysfunctions.php';
include_once LIB_PATH.'functions.php';
include_once LIB_PATH.'preflight.php';
require_once 'vendor/autoload.php';


$data = [];

$action = empty($_GET[CONTOLLER])? get_config('default_controller'): $_GET[CONTOLLER];

$controlFile = $action.'.php';


set_page_title();


@include_once CONTOLLER_PATH.$controlFile ;

//render_client_layout('', $data);
include_once VIEWS_PATH.'_layout.php';



ob_flush();