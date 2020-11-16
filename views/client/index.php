<?php

load_provider('PreviewProvider');
$PreviewProvider = new PreviewProvider;


$data['leadVideo'] = $PreviewProvider->getEntity();

$cat['cateqoriesEntities'] = $PreviewProvider->getCategoryEntities();

render_client('video-preview', $data);

render_client('cat-entities', $cat);