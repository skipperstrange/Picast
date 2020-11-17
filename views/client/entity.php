<?php
if(!check_post_get('g', 'id')){
   Msg::messageHalt("No entity id.", 'error-banner');
}else{
render_client('video-preview', $data);   
render_client('seasons-preview', $data);
}
?>
<h3>Suggested</h3>

