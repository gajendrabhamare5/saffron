$(document).ready(function() {
    $(document).on('click', '.side-menu-button', function() {
        $(this).addClass('change');
        $(".sidebar").show(300);
    });
    $(document).on('click', '.side-menu-button.change', function() {
        $(this).removeClass('change');
        $(".sidebar").hide(300);
    });
    $(".username").click(function() {
        $(".username ul").slideToggle();
    });
    $(".sidebar .fa-times").click(function() {
        $(".sidebar").hide(300);
        $(".side-menu-button").removeClass('change');
    });
    $(".master-balance .fa-arrow-alt-circle-down").click(function() {
        $(".master-balance-detail").slideDown();
        $(this).hide();
        $(".fa-arrow-alt-circle-up").show();
    });
    $(".master-balance .fa-arrow-alt-circle-up").click(function() {
        $(".master-balance-detail").slideUp();
        $(this).hide();
        $(".fa-arrow-alt-circle-down").show();
    });
});

var csrf = $('meta[name=csrf-token]').attr("content");
var path = $('meta[name=path]').attr("content");
var token = $('meta[name=token]').attr("content");

$('.maxlength10').keypress(function(e) {
    var amount = $(this).val();
    if (amount.length > 10) {
        e.preventDefault();
        e.stopPropagation();
        return false;
    }
});

function isJson(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}

function showLoading() {
    $("div#divLoading").addClass('show');
}

function hideLoading() {
    $("div#divLoading").removeClass('show');
}