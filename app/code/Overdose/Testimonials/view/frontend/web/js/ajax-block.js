define([
    'jquery'
], function ($) {
    return function (config, element) {
        $.ajax({
            url: config.ajaxUrl,
            cache: false,
            dataType: 'json'
        }).done(function (data) {
            $(element).html(data['html']);
        })
    }
});
