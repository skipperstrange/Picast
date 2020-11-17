<div class="season">
    <?php 
    foreach($seasons as $season => $episodes){
        ?>
    <h3 class="row-title">Season <?=$season?></h3>
    <div class="videos">
        <?php
            foreach($episodes as $episode){
                $vid['episode'] = $episode;
                $vid['episode']['thumbnail'] = $thumbnail;
                render_client('entity-video-watch-square',$vid);
            }
            ?>
    </div>
            <?php
    } 
    ?>
</div>
