var $backdrop = null;
var subModal = false;

function addLoading(modalId) {
    $('.m-back').remove();
    subModal = false;
    $backdrop = $('<div class="m-back"><div class="loader-backdrop"></div><div class="modal-loader"><i data-feather="loader"></i> Loading </div></div>').appendTo(document.body);
}

function clearLoading() {
    $($backdrop).fadeOut(300, function() {
        $('.m-back').remove();
    });
}

function hideModal() {
    $($backdrop).fadeOut(300, function() {
        $('.m-back').remove();
    });
}

$(document).on('submit', 'form.AjaxForm', function(e) {
    e.preventDefault();
    addLoading();
    var dataForm = $(this).serializeArray();
    var actionForm = $(this).attr('action');
    var targetForm = $(this).attr('data-target');
    var scroll = $(this).attr('data-scroll');
    type: $(this).attr('method');
    $(this).find(":input").attr("disabled", true);
    $(this).find(":button").text('Proses.. tunggu sebentar..')
    $(targetForm).load(actionForm, dataForm);
    if (scroll != "off") {
        $('html, body').animate({
            scrollTop: $({
                scrollTop: 0
            })
        });
    }
    clearLoading();
    $(this).find(":input").attr("disabled", false);
    return false;
});

$(document).on('submit', 'form.AjaxFormUpload', function(e) {
    e.preventDefault();
    addLoading();
    var link = $(this);
    var targetForm = link.data('target');
    var formData = new FormData(link[0]);
    link.find(":input").attr("disabled", true);
    $.ajax({
        url: link.attr('action'),
        type: link.attr('method'),
        data: formData,
        async: false,
        success: function(data) {
            $(targetForm).html(data);
            clearLoading();
        },
        cache: true,
        contentType: false,
        processData: false,
    });
    $('html, body').animate({
        scrollTop: $({
            scrollTop: 0
        })
    });
    return false;
});

function data(elm) {
    var url = $(elm).attr("data-url");
    var target = $(elm).attr("data-target");
    var scroll = $(elm).attr("data-scroll");
    var active = $(elm).attr("data-active");
    var loading = $(elm).attr("data-loading");
    if (active == "on") {
        $(elm).parent().parent().children().removeClass("active").addClass("");
        $(elm).parent().removeClass("").addClass("active");
    }
    if (scroll != "off") {
        $('html, body').animate({
            scrollTop: $({
                scrollTop: 0
            })
        });
    }
    if (loading == "off") {
        $(target).load(url);
    } else {
        $(target).html(addLoading()).load(url, clearLoading);
    }
    return false;
}