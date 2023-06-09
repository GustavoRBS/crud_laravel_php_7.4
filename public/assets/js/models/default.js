var Default = new Class({
    isEmpty: function (text) {
        if (
            typeof text == "undefined" ||
            text === null ||
            text === "" ||
            text === "0" ||
            text === "NaN"
        )
            return true;
        if (typeof text == "number" && isNaN(text)) return true;
        if (text instanceof Date && isNaN(Number(text))) return true;
        return false;
    },
    isCheck: function (input) {
        if (input.is(":checked")) return true;
        return false;
    },
    reticaAcento: function (palavra) {
        var comacento = "áàãâäéèêëíìîïóòõôöúùûüçÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÖÔÚÙÛÜÇ";
        var semacento = "aaaaaeeeeiiiiooooouuuucAAAAAEEEEIIIIOOOOOUUUUC";
        var nova = "";
        for (i = 0; i < palavra.length; i++) {
            if (comacento.search(palavra.substr(i, 1)) >= 0) {
                nova += semacento.substr(
                    comacento.search(palavra.substr(i, 1)),
                    1
                );
            } else {
                nova += palavra.substr(i, 1);
            }
        }
        return nova;
    },
    isFunction: function (handler) {
        if (typeof handler == "function" && handler instanceof Function) {
            return true;
        } else {
            return false;
        }
    },
    alert: function (
        title,
        type,
        message,
        redir = [],
        refresh = false,
        timer = false,
        button = true
    ) {
        var config = {
            buttons: {
                cancel: false,
                confirm: {
                    text: "Ok",
                    visible: button,
                    value: null,
                    className: "",
                    closeModal: true,
                },
            },
            title: title,
            icon: type,
            content: message,
            closeOnClickOutside: false,
            timer: timer,
        };
        var content = document.createElement("div");
        content.insertAdjacentHTML("afterbegin", config.content);
        config.content = content;
        swal(config).then(
            function () {
                if (typeof redir !== "undefined" && redir.length > 0) {
                    //window.location = this.dominio+redir[0];
                    // $(location).attr("href", dominio + redir[0]);
                }
                if (refresh) {
                    // window.location.reload();
                }
            },
            function () {
                return false;
            }
        );
    },
    message: function (text, time, type) {
        if (type == "remove") {
            toastr.remove();
        }
        if (!this.isEmpty(text)) {
            toastr.remove();
            if (!time) time = false;
            if (!type) type = "alert";
            toastr.options.timeOut = time;
            toastr.options.closeButton = true;
            toastr[type](text);
        }
        return false;
    },
    redirect: function (text, time) {
        if (!this.isEmpty(text)) {
            setTimeout(function () {
                window.location = text;
            }, time);
        }
        return false;
    },
    center: function (ele) {
        var w = $(window);
        jQuery(ele).css({
            position: "absolute",
            top: Math.abs(
                (w.height() - jQuery(ele).outerHeight()) / 2 + w.scrollTop()
            ),
            left: Math.abs(
                (w.width() - jQuery(ele).outerWidth()) / 2 + w.scrollLeft()
            ),
        });
    },
    getCallbackActions: function (form) {
        var callback_actions = form.data("callback-action");
        if (!this.isEmpty(callback_actions)) {
            return callback_actions.split(",");
        } else {
            return [];
        }
    },
});

var Default = new Default();
jQuery(document).ready(function () {
    AJAXPATH = jQuery("meta[name='ajax-path']").attr("content");
    AJAXFULLPATH = jQuery("meta[name='ajax-full-path']").attr("content");
});
