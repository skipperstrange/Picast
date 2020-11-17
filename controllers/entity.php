<?php
$PreviewProvider = auto_load_provider('PreviewProvider');
$SeasonProvider = auto_load_provider('SeasonProvider');

if(check_post_get('g', 'id')){
     $id = post_get('g', 'id');
    $data['leadVideo'] = $PreviewProvider->getEntity($id);
    $data['seasons'] = $SeasonProvider->getVideosSeasonByEntity($id);
    $data ['thumbnail']=$data['leadVideo']['thumbnail'] ;
    $data['entityId']=$data['leadVideo']['id'];
    $data['suggested'] = $PreviewProvider->getCategoryEntities($data['leadVideo']);
    
}
