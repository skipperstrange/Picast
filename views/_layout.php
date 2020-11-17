<?php include_once('_header.php'); ?>
<body>
<div class="main">
<?php 
include_once CONTOLLER_PATH.$controller ;
    render_client($action, $data);
?>
</div>
</body>
<?include_once('_footer.php');