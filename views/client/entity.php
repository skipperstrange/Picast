<?php
if(!check_post_get('g', 'id')){
   Msg::messageHalt("No entity id.", 'error-banner');
}else{
render_client('video-preview', $data);   
render_client('seasons-preview', $data);
}
?>
<div class="season">
<?
$data['suggested']['cateqoriesEntities'][0]['name']  = 'Suggested';
render_client('cat-entities',$data['suggested']);
?>
</div>

