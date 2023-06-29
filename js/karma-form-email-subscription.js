/**
 * Email subscription email
 * ------------------
 */
jQuery(document).ready(function ($) {
    let $form = $('.form-email-subscription');

    // Turn submit button into primary button 
    $form.find('button').addClass('btn btn-primary').removeClass('wp-block-button__link')
                        // (correct auto-generated padding)
                        .css({'padding-top': '13px'}, {'padding-bottom': '13px'});

    // Make sure submit button is full width
    $form.find('.wp-block-jetpack-button').addClass('d-grid gap-2');

    // Style input email
    $form.find('input[type="email"]').addClass('form-control');

    // Reduce gap between form elements
    $form.css({'gap': '15px'});
});


