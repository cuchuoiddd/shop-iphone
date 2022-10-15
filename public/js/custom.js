function customPagination(){
    $(".custom-pagination .page-item:first-child").find('.page-link').html(`<span class="ion-ios-arrow-thin-left"></span>`);
    $(".custom-pagination .page-item:last-child").find('.page-link').html(`<span class="ion-ios-arrow-thin-right"></span>`);
}

customPagination();

$.fn.modal.Constructor.prototype._enforceFocus = function () {}; // select2 working modal

// phân trang
$(document).on('click', '.page-link', function (e) {
    e.preventDefault();
    showLoading();
    let href = $(this).attr('href');
    $.ajax({
        url: href,
        data: $('#gridForm').serialize(),
        success: function (data) {
            if (data) {
                $('.response').html(data);
                loadJsAfterCallAjax();
            }
        }
    })
})

//form
$("#gridForm").submit(function (e, page) {
    e.preventDefault();
    showLoading();
    $.get($(this).attr('action'), $(this).serialize(), function (data) {
        if (data) {
            $('.response').html(data);
            loadJsAfterCallAjax();
        }
    })
})

$(document).ready(function () {
    $("select.select2").select2({
        placeholder: "Select a State",
        allowClear: true,
    })
})

function loadJsAfterCallAjax() {
    $("select.select2").select2({
        placeholder: "Select a State",
        allowClear: true,
    });
    hideLoading();
    customPagination();
    $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
}

//loading
function showLoading() {
    $('.loading-custom').show();
}

function hideLoading() {
    $('.loading-custom').hide();
}

//validate
! function(window, document, $) {
    "use strict";
    $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
}(window, document, jQuery);

//alertify
alertify.defaults = {
    // dialogs defaults
    autoReset: true,
    basic: false,
    closable: true,
    closableByDimmer: true,
    invokeOnCloseOff: false,
    frameless: false,
    defaultFocusOff: false,
    maintainFocus: true, // <== global default not per instance, applies to all dialogs
    maximizable: true,
    modal: true,
    movable: true,
    moveBounded: false,
    overflow: true,
    padding: true,
    pinnable: true,
    pinned: true,
    preventBodyShift: false, // <== global default not per instance, applies to all dialogs
    resizable: true,
    startMaximized: false,
    transition: 'fade',
    transitionOff: false,
    tabbable: 'button:not(:disabled):not(.ajs-reset),[href]:not(:disabled):not(.ajs-reset),input:not(:disabled):not(.ajs-reset),select:not(:disabled):not(.ajs-reset),textarea:not(:disabled):not(.ajs-reset),[tabindex]:not([tabindex^="-"]):not(:disabled):not(.ajs-reset)',  // <== global default not per instance, applies to all dialogs

    // notifier defaults
    notifier: {
        // auto-dismiss wait time (in seconds)
        delay: 3,
        // default position
        position: 'bottom-right',
        // adds a close button to notifier messages
        closeButton: false,
        // provides the ability to rename notifier classes
        classes: {
            base: 'alertify-notifier',
            prefix: 'ajs-',
            message: 'ajs-message',
            top: 'ajs-top',
            right: 'ajs-right',
            bottom: 'ajs-bottom',
            left: 'ajs-left',
            center: 'ajs-center',
            visible: 'ajs-visible',
            hidden: 'ajs-hidden',
            close: 'ajs-close'
        }
    },

    // language resources
    glossary: {
        // dialogs default title
        title: 'AlertifyJS',
        // ok button text
        ok: 'OK',
        // cancel button text
        cancel: 'Cancel'
    },

    // theme settings
    theme: {
        // class name attached to prompt dialog input textbox.
        input: 'ajs-input',
        // class name attached to ok button
        ok: 'ajs-ok',
        // class name attached to cancel button
        cancel: 'ajs-cancel'
    },
    // global hooks
    hooks: {
        // invoked before initializing any dialog
        preinit: function (instance) {
        },
        // invoked after initializing any dialog
        postinit: function (instance) {
        },
    },
};
alertify.set('notifier', 'position', 'top-right');



$(document).on("click", ".delete", function () {
    let elt = $(this).parents('tr');
    let data_id = $(this).data('id');
    swal({
        title: 'Bạn có chắc chắn xóa mục này?',
        type: 'error',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        showCloseButton: true,
    },function () {
        $.ajax({
            data: {id: data_id},
            url: window.location.origin + window.location.pathname + '/' + data_id,
            method: 'delete',
            success: function (data) {
                if (data && data.success === false) {
                    swal({
                        title: data.message ? data.message : '',
                        type: 'warning'
                    })
                } else {
                    swal({
                        title: 'Đã xóa thành công!',
                        type: 'success'
                    })
                    elt.remove();
                    setTimeout(function () {
                        // location.reload();
                    }, 1000);
                }
            }
        });
    })
});

function showTextStatusOkr(status) {
    switch(status) {
        case 0:
            return 'Đã nháp';
            break;
        case 1:
            return 'Chờ check-in';
            break;
        case 2:
            return 'Chờ phản hồi';
            break;
        case 3:
            return 'Đã Check-in';
            break;
        case 4:
            return 'Chờ tổng kết';
            break;
        case 5:
            return 'Chờ phản hồi';
            break;
        case 6:
            return 'Đã tổng kết';
            break;
        default:
            return '';
    }
}
function showColorOkr(status) {
    switch(status) {
        case 0:
            return '#688b67';
            break;
        case 1:
            return '#1e88e5';
            break;
        case 2:
            return '#ff9b04';
            break;
        case 3:
            return '#26c6da';
            break;
        case 4:
            return '#8d6658';
            break;
        case 5:
            return '#465161';
            break;
        case 6:
            return '#7c277d';
            break;
        default:
            return '';
    }
}

function showClassStatusOkr(status) {
    switch(status) {
        case 0:
            return 'openFormCheckin';
            break;
        case 1:
            return 'openFormCheckin';
            break;
        case 2:
            return 'openFormFeedback1';
            break;
        case 3:
            return 'openFormCheckin';
            break;
        case 4:
            return 'openFormSummary';
            break;
        case 5:
            return 'openFormFeedback2';
            break;
        default:
            return '';
    }
}

function formatNumber(n) {
    // format number 1000000 to 1,234,567
    return n.toString().replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}
function replaceNumber(n) {
    return n.toString().replace(/,/g, "");
}

$(document).on('keyup','.formatNumber', function () {
    let val = $(this).val();
    val = replaceNumber(val);
    $(this).val(formatNumber(val));
})