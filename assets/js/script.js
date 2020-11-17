function toggleVolume(button) {
    var muted = $(".preview-video").prop("muted");
    $(".preview-video").prop("muted", !muted);

    $(button).find("i").toggleClass("fa-volume-mute");
    $(button).find("i").toggleClass("fa-volume-up");
}

function previewMediaToggle() {
    $(".preview-video").fadeOut(2000, function(){
        $(".preview-img").fadeIn(1000);
    });
    
}

$(function(){
    $(".preview-img").fadeIn(4000);
    var prevVid = $(".preview-video");
    prevVid.hide(0);
    setTimeout(function(){
        $(".preview-img").fadeOut(2500, function(){
            
            prevVid.fadeIn(2500);
        });
     
    },10000)
});