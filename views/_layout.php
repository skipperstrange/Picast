<?php include_once('_header.php'); ?>
<body>
<div class="main">
<?php 
include_once CONTOLLER_PATH.$controller ;
if(file_exists(CLIENT_VIEWS_PATH.$action.'.php')){
    include_once CLIENT_VIEWS_PATH. $action.'.php';
}else{
    include_once VIEWS_PATH.'_404.php';
}
?>
</div>
</body>
<?include_once('_footer.php');