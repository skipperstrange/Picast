<?php
if(check_key_exists($leadVideo, 'id')){
?>
<div class="preview-container">
    <img src="<?= $leadVideo['thumbnail'] ?>" alt="" class="preview-img" hidden>
    <video class="preview-video" autoplay muted onended="previewMediaToggle()">
        <source src="<?= $leadVideo['preview'] ?>" type="video/mp4">
    </video>

    <div class="preview-overlay">
        <div class="main-details">
            <h3><?= $leadVideo['name'] ?></h3>

            <div class="buttons">
                <button title="Play"><i class="fa fa-play"></i> Play</button>
                <button title="Unmute" onclick="toggleVolume(this)"> <i class="fa fa-volume-mute"></i></button>
            </div>
        </div>
    </div>
</div>
<?php
}else{
?>

<?
}
?>
