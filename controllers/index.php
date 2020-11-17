<?php

load_provider('PreviewProvider');
$PreviewProvider = new PreviewProvider;


$data['leadVideo'] = $PreviewProvider->getEntity();

$data['cat']['cateqoriesEntities'] = $PreviewProvider->getCategoryEntities();
