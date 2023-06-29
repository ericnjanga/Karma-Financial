/**
 * Toggle parent class each time the button is clicked
 * ------------------
 */
jQuery(document).ready(function ($) {
    let $btn = $('#karma-btn-sidebar-toggle');
    let flagOpen = 'sidebar-is-open';
    let $container = $('.karma-global-container');

    $btn.on('click', function () {
        console.log('....');
        $container.toggleClass(flagOpen);
        if ($container.hasClass(flagOpen)) {
            $btn.removeClass('is-off').addClass('is-on');
        } else {
            $btn.removeClass('is-on').addClass('is-off');
        }
    });
});

