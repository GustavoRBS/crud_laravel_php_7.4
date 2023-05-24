$(function () {

    $("[data-plugin='select2']").select2({
        allowClear:!0
    });
    
    $("[data-plugin='select2-no-search']").select2({
        minimumResultsForSearch: -1
    });

    $(document).on("click", ".modal-call", function (e) {
        var id = $(this).data("id");
        var modal = new Modal();
        var params = { id: id };
        var url = $(this).data("url") ? $(this).data("url") : $(this).attr("href");
        var fullscreen = $(this).data("fullscreen") ? $(this).data("fullscreen") : false;
        if (!Default.isEmpty(jQuery(this).data("model"))) {
            params.model = jQuery(this).data("model");
        }
        if (!Default.isEmpty(jQuery(this).data("load"))) {
            params.load = jQuery(this).data("load");
        }
        if (fullscreen) {
            modal.setFullscreen(fullscreen);
        }
        modal.setParams(params);
        modal.setUrl(url);
        modal.execute();
        e.preventDefault();
    })
});