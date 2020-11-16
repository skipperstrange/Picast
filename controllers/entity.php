<?php

load_provider('PreviewProvider');
$PreviewProvider = new PreviewProvider;

if(!check_post_get('g', 'id')){
   return;

$data['leadVideo'] = $PreviewProvider->getEntity();
render_client('video-preview', $data);