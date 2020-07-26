function PopupCenter(url, title, w, h) {
    const hasSpace = window.matchMedia(
        `(min-width: ${w + 20}px) and (min-height: ${h + 20}px)`
    ).matches;
    const isDef = (v) => typeof v !== "undefined";
    const screenX = isDef(window.screenX) ? window.screenX : window.screenLeft;
    const screenY = isDef(window.screenY) ? window.screenY : window.screenTop;
    const outerWidth = isDef(window.outerWidth)
        ? window.outerWidth
        : document.documentElement.clientWidth;
    const outerHeight = isDef(window.outerHeight)
        ? window.outerHeight
        : document.documentElement.clientHeight - 22;
    const targetWidth = hasSpace ? w : null;
    const targetHeight = hasSpace ? h : null;
    const V = screenX < 0 ? window.screen.width + screenX : screenX;
    const left = parseInt(V + (outerWidth - targetWidth) / 2, 10);
    const right = parseInt(screenY + (outerHeight - targetHeight) / 2.5, 10);
    const features = [];

    if (targetWidth !== null) {
        features.push(`width=${targetWidth}`);
    }

    if (targetHeight !== null) {
        features.push(`height=${targetHeight}`);
    }

    features.push(`left=${left}`);
    features.push(`top=${right}`);
    features.push("scrollbars=1");

    const newWindow = window.open(url, title, features.join(","));

    if (window.focus) {
        newWindow.focus();
    }

    return newWindow;
}

// Define function to open filemanager window
var lfm = function (options, cb) {
    PopupCenter("/admin/filemanager?type=product", "FileManager", 900, 600);
    window.SetUrl = cb;
};

// Define LFM summernote button
var LFMButton = function (context) {
    var ui = $.summernote.ui;
    var button = ui.button({
        contents: '<i class="note-icon-picture"></i> ',
        tooltip: "Insert image with filemanager",
        click: function () {
            lfm(
                {
                    type: "image",
                    prefix: "/admin/filemanager",
                },
                function (lfmItems, path) {
                    lfmItems.forEach(function (lfmItem) {
                        context.invoke("insertImage", lfmItem.url);
                    });
                }
            );
        },
    });
    return button.render();
};

(function ($) {
    $("#remove_img").click(function (e) {
        if ($("#image").val()) {
            $("#image").val("");
            $("#holder").html("");
        }
    });

    $.fn.filemanager = function (type, options) {
        type = type || "file";

        this.on("click", function (e) {
            var route_prefix =
                options && options.prefix
                    ? options.prefix
                    : "/admin/filemanager";
            var target_input = $("#" + $(this).data("input"));
            var target_preview = $("#" + $(this).data("preview"));
            var target_class = $(this).data("class");

            PopupCenter(
                route_prefix + "?type=" + type,
                "FileManager",
                900,
                600
            );

            window.SetUrl = function (items) {
                var file_path = items
                    .map(function (item) {
                        return item.thumb_url;
                    })
                    .join(",");

                // set the value of the desired input to image url
                target_input.val("").val(file_path).trigger("change");

                // clear previous preview
                target_preview.html("");

                // set or change the preview image src
                items.forEach(function (item) {
                    // console.log(item);

                    // console.log(target_class);

                    target_preview.append(
                        $("<img>")
                            .addClass(target_class)
                            .attr("src", item.thumb_url)
                    );
                });

                // trigger change event
                target_preview.trigger("change");
            };
            return false;
        });
    };
})(jQuery);
