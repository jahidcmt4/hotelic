(function ($) {
jQuery(document).ready( function( $ ) {
    $('body').on('click', '.hotelic-media-btn.upload-btn', function (e) {
        var $this = $(this);
        frame = wp.media({
            title: "Select Image",
            button: {
                text: "Insert Image"
            },
            multiple: false
        });
        frame.on('select', function () {
            var attachment = frame.state().get('selection').first().toJSON();
            $(".hotelic-media-url").val(attachment.url);
            $(".hotelic-media-url-preview").val(attachment.url);
        });
        frame.open();
        return false;
    });
    $('body').on('click', '.hotelic-media-btn.remove-btn', function (e) {
        e.preventDefault();
        var attachment_url = '';
        $(".hotelic-media-url").val(attachment_url);
        $(".hotelic-media-url-preview").val(attachment_url);
    });
});

// hotelic Toolkit Installation
jQuery(document).on('click', '.hotelic-toolkit-installation', function (e) {
    e.preventDefault();

    var current = $(this);
    var plugin_slug = current.attr("data-plugin-slug");

    current.addClass('installation-ongoing').text(hotelic_script_params.installing);
    var data = {
        action: 'travelfic-toolkit_ajax_install_plugin',
        _ajax_nonce: hotelic_script_params.hotelic_theme_nonce,
        slug: plugin_slug,
    };
    // Installing Function
    jQuery.post(hotelic_script_params.ajax_url, data, function (response) {
        if(response){
            current.text(hotelic_script_params.activating);
            hotelic_Activation(plugin_slug);
        }
    })

});

// Activation Functions
const hotelic_Activation = (plugin_slug) => {
    $.ajax({
        type: 'post',
        url: hotelic_script_params.ajax_url,
        data: {
            action: 'travelfic-toolkit_ajax_active_plugin',
            _ajax_nonce: hotelic_script_params.hotelic_theme_nonce,
            slug: plugin_slug,
        },
        success: function(response1) {
            window.location.replace(hotelic_script_params.redirect_url);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

})(jQuery);