function toggleVolume(button) {
    var muted = $(".preview-video").prop("muted");
    $(".preview-video").prop("muted", !muted);

    $(button).find("i").toggleClass("fa-volume-mute");
    $(button).find("i").toggleClass("fa-volume-up");
}

function previewEnded() {
    $(".preview-video").toggle();
    $(".preview-img").toggle();
}