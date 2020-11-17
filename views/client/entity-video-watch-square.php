<a href="<?= _link('watch&id='.$episode['id']) ?>" class="entity-square" title="<?= $episode['title'] ?>">
    <div class="episode-container">
        <div class="contents">
        <img src="<?= $episode['thumbnail'];?>" alt="">
        <div class="video-info">
            <h4><?= $episode['episode'].'. '. $episode['title'] ?></h4>
            <span><?= $episode['description'] ?></span>
        </div>
        </div>
    </div>
</a>
