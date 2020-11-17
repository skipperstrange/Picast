<div class="category-previews">
<?php
foreach($cateqoriesEntities as $Category){
?>
<div class="category">
    <h3 class="category-name"><?= anchor_link($Category['name'], 'category&id='.$Category['id']) ?></h3>
    <div class="entities">
    <?php 
        foreach($Category['entities'] as $entity):
                render_client('entity-previeiw-square', $entity);
        endforeach;
    
    ?>
    </div>
</div>
<?
}
?>
</div>
