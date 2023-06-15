<?php
add_action( 'after_setup_theme', 'generic_setup' );
function generic_setup() {
load_theme_textdomain( 'generic', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'responsive-embeds' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'html5', array( 'search-form', 'navigation-widgets' ) );
add_theme_support( 'woocommerce' );
global $content_width;
if ( !isset( $content_width ) ) { $content_width = 1920; }
    register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'generic' ) ) );
}
add_action( 'wp_enqueue_scripts', 'generic_enqueue' );


// Register a new spot for the footer menu ...
function register_footer_menu() {
    register_nav_menu('footer-menu', 'Footer Menu');
}
add_action('after_setup_theme', 'register_footer_menu');


// Register menu walker ...
require_once get_template_directory() . '/_walker-bootstrap-nav-menu.php';

function register_custom_navwalker(){
    register_nav_menu('bootstrap-menu', __('Bootstrap Menu'));
}
add_action('after_setup_theme', 'register_custom_navwalker');





// Bootstrap Library ...
function enqueue_bootstrap() {
    /**
     * NOTE:
     * I've wrapped the bootstrap CDN code around a CSS layer to make sure bootstrap doesn't override my styles
     */
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/styles/framework/bootstrap@5.3.0.min.css' );
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap');

function enqueue_bootstrap_js() {
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array(), '5.3.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap_js');



function generic_enqueue() {
    wp_enqueue_style( 'generic-style', get_stylesheet_uri() );



    /* Font families */
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&family=Maitree:wght@400;600;700&family=Merriweather:wght@400;700&family=Oswald&display=swap', array(), null );
    
    /* CSS reset --- this cancel google fonts (Don't know why yet) */
    // wp_enqueue_style( 'css-reset', 'https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css', array(), null );

    wp_enqueue_style( 'variables', get_template_directory_uri() . '/styles/base/variables.css' );
    wp_enqueue_style( 'blockquote', get_template_directory_uri() . '/styles/base/blockquote.css' );
    wp_enqueue_style( 'headings', get_template_directory_uri() . '/styles/base/headings.css' );
    wp_enqueue_style( 'decorations', get_template_directory_uri() . '/styles/base/decorations.css' );
    wp_enqueue_style( 'grids', get_template_directory_uri() . '/styles/base/grids.css' );
    wp_enqueue_style( 'theme-switch', get_template_directory_uri() . '/styles/base/theme-switch.css' );

    wp_enqueue_style( 'header', get_template_directory_uri() . '/styles/components/header.css' );
    wp_enqueue_style( 'hero', get_template_directory_uri() . '/styles/components/hero.css' );
    wp_enqueue_style( 'button', get_template_directory_uri() . '/styles/components/button.css' );
    wp_enqueue_style( 'award', get_template_directory_uri() . '/styles/components/award.css' );
    wp_enqueue_style( 'boxes', get_template_directory_uri() . '/styles/components/boxes.css' );
    wp_enqueue_style( 'menu', get_template_directory_uri() . '/styles/components/menu.css' );
    wp_enqueue_style( 'sidebar', get_template_directory_uri() . '/styles/components/sidebar.css' );
    wp_enqueue_style( 'footer', get_template_directory_uri() . '/styles/components/footer.css' );

    wp_enqueue_style( 'page-home', get_template_directory_uri() . '/styles/pages/home.css' );
    wp_enqueue_style( 'page-about', get_template_directory_uri() . '/styles/pages/about.css' );
    wp_enqueue_style( 'page-about-awards', get_template_directory_uri() . '/styles/pages/about.awards.css' );



    // wp_enqueue_style( 'colors', get_stylesheet_uri() . './styles/colors.css' );
    wp_enqueue_style( 'generic-icons', get_template_directory_uri() . '/icons/icons.css' );
    wp_enqueue_script( 'jquery' );
    wp_register_script( 'generic-videos', get_template_directory_uri() . '/js/videos.js' );
    wp_enqueue_script( 'generic-videos' );
    wp_add_inline_script( 'generic-videos', 'jQuery(document).ready(function($){$("#wrapper").vids();});' );
}
add_action( 'wp_footer', 'generic_footer' );
function generic_footer() {
?>
<script>
jQuery(document).ready(function($) {
$(".before").on("focus", function() {
$(".last").focus();
});
$(".after").on("focus", function() {
$(".first").focus();
});
$(".menu-toggle").on("keypress click", function(e) {
if (e.which == 13 || e.type === "click") {
e.preventDefault();
$("#menu").toggleClass("toggled");
$(".looper").toggle();
}
});
$(document).keyup(function(e) {
if (e.keyCode == 27) {
if ($("#menu").hasClass("toggled")) {
$("#menu").toggleClass("toggled");
}
}
});
$("img.no-logo").each(function() {
var alt = $(this).attr("alt");
$(this).replaceWith(alt);
});
});
</script>
<?php
}
add_filter( 'document_title_separator', 'generic_document_title_separator' );
function generic_document_title_separator( $sep ) {
$sep = esc_html( '|' );
return $sep;
}
add_filter( 'the_title', 'generic_title' );
function generic_title( $title ) {
if ( $title == '' ) {
return esc_html( '...' );
} else {
return wp_kses_post( $title );
}
}
function generic_schema_type() {
$schema = 'https://schema.org/';
if ( is_single() ) {
$type = "Article";
} elseif ( is_author() ) {
$type = 'ProfilePage';
} elseif ( is_search() ) {
$type = 'SearchResultsPage';
} else {
$type = 'WebPage';
}
echo 'itemscope itemtype="' . esc_url( $schema ) . esc_attr( $type ) . '"';
}
add_filter( 'nav_menu_link_attributes', 'generic_schema_url', 10 );
function generic_schema_url( $atts ) {
$atts['itemprop'] = 'url';
return $atts;
}
if ( !function_exists( 'generic_wp_body_open' ) ) {
function generic_wp_body_open() {
do_action( 'wp_body_open' );
}
}
add_action( 'wp_body_open', 'generic_skip_link', 5 );
function generic_skip_link() {
echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__( 'Skip to the content', 'generic' ) . '</a>';
}
add_filter( 'the_content_more_link', 'generic_read_more_link' );
function generic_read_more_link() {
if ( !is_admin() ) {
return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">' . sprintf( __( '...%s', 'generic' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
}
}
add_filter( 'excerpt_more', 'generic_excerpt_read_more_link' );
function generic_excerpt_read_more_link( $more ) {
if ( !is_admin() ) {
global $post;
return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">' . sprintf( __( '...%s', 'generic' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
}
}
add_filter( 'big_image_size_threshold', '__return_false' );
add_filter( 'intermediate_image_sizes_advanced', 'generic_image_insert_override' );
function generic_image_insert_override( $sizes ) {
unset( $sizes['medium_large'] );
unset( $sizes['1536x1536'] );
unset( $sizes['2048x2048'] );
return $sizes;
}
add_action( 'widgets_init', 'generic_widgets_init' );

function generic_widgets_init() {

register_sidebar( array(
    'name' => esc_html__( 'Sidebar Widget Area', 'generic' ),
    'id' => 'primary-widget-area',
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
) );

register_sidebar( array(
    'name'          => 'Appointments links',
    'id'            => 'sidebar-appointments',
    'description'   => 'For booking appointments',
    // Add more sidebar options if needed
    'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
) );


register_sidebar( array(
    'name'          => 'CEO image',
    'id'            => 'sidebar-ceo-image',
    'description'   => 'For the CEO image',
    // Add more sidebar options if needed
    'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
) );

register_sidebar( array(
    'name'          => 'Archives',
    'id'            => 'sidebar-archives',
    'description'   => 'For blog archives',
    // Add more sidebar options if needed
    'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
) );

// Quick contact
register_sidebar( array(
    'name'          => 'Quick contact',
    'id'            => 'sidebar-quick-contact',
    'description'   => 'For phone, emails, address, ...',
    // Add more sidebar options if needed
    'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
) );

// Social Media
register_sidebar( array(
    'name'          => 'Social Media',
    'id'            => 'sidebar-social-media',
    'description'   => 'For social media link',
    // Add more sidebar options if needed
    'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
) );









}
add_action( 'wp_head', 'generic_pingback_header' );
function generic_pingback_header() {
if ( is_singular() && pings_open() ) {
printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
}
}
add_action( 'comment_form_before', 'generic_enqueue_comment_reply_script' );
function generic_enqueue_comment_reply_script() {
if ( get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}
function generic_custom_pings( $comment ) {
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo esc_url( comment_author_link() ); ?></li>
<?php
}
add_filter( 'get_comments_number', 'generic_comment_count', 0 );
function generic_comment_count( $count ) {
if ( !is_admin() ) {
global $id;
$get_comments = get_comments( 'status=approve&post_id=' . $id );
$comments_by_type = separate_comments( $get_comments );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}