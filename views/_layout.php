<?php include_once('_header.php'); ?>
<body>

<?php 

if(file_exists(CLIENT_VIEWS_PATH.$action.'.php')){
    include_once CLIENT_VIEWS_PATH. $action.'.php';
}else{
    include_once VIEWS_PATH.'_404.php';
}


?>

</body>
<?include_once('_footer.php');