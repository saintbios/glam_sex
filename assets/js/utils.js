$(function() {
    $('#searchForm').on('submit', function(e) {
        e.preventDefault();
        var sanitized = sanitizeString($("#searchValueInput").val());
        $("#searchvaluesanitized").val(sanitized);
        $('#searchForm')[0].submit();
    });
});

$(document).keypress(function(e) {
    if(e.which == 13) {
        e.preventDefault();
        var sanitized = sanitizeString($("#searchValueInput").val());
        $("#searchvaluesanitized").val(sanitized);
        $('#searchForm')[0].submit();
    }
});

function sanitizeString(str) {
    str = str.replace(/[àâáä]/gim, "a");
    str = str.replace(/[éèêêë]/gim, "e");
    str = str.replace(/[îíï]/gim, "i");
    str = str.replace(/[ôóö]/gim, "o");
    str = str.replace(/[úüû]/gim, "u");
    str = str.replace(/[\.,_"'-]/, " ");
    str = str.replace(/[^a-z0-9 ]/gim,"");
    str = str.replace(/[ ]/gim,"+");
    return str.trim();
}

function changeEmbedSrc() {
    $('#divEmbed').html('<iframe allowfullscreen class="embed-responsive-item" src="https://static.metart.com/media/<?php echo($film->metart_id);?>/tease_<?php echo($film->metart_id);?>.mp4"></iframe>');
    $('.btn-lecture-container').html('');
}

function updateActiveSlider(pId) {
    $('.carousel-inner>div, .active').removeClass("active");
    $('#slider_img_'+pId).addClass("active");
}