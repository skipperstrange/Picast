<?php

load_provider('PreviewProvider');
$PreviewProvider = new PreviewProvider;


$data['leadVideo'] = $PreviewProvider->getRandomEntity();

$cat['cateqoriesEntities'] = $PreviewProvider->getCategoryEntities();

render_client('video_preview', $data);

render_client('cat_entities', $cat);