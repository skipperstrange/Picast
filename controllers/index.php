<?php

load_provider('PreviewProvider');
$PreviewProvider = new PreviewProvider;


$data['leadVideo'] = $PreviewProvider->getEntity();

$cat['cateqoriesEntities'] = $PreviewProvider->getCategoryEntities();