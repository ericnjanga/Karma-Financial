/**
 * Toggle parent class each time the button is clicked
 * ------------------
 */
jQuery(document).ready(function($) {

    let $btn = $('#karma-btn-sidebar-toggle');
    let flagOpen = 'sidebar-is-open';
    let $container = $('.karma-global-container');

    $btn.on('click', function() {

        console.log('....');
        $container.toggleClass(flagOpen);
    });
});


