<?php
/**
 * ReVert Theme Functions
 *
 * @package ReVert
 * @version 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Theme Setup
 */
function revert_theme_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails
    add_theme_support( 'post-thumbnails' );

    // Set post thumbnail size
    set_post_thumbnail_size( 1200, 675, true );

    // Add custom image sizes
    add_image_size( 'revert-product-thumb', 400, 300, true );
    add_image_size( 'revert-hero', 1920, 1080, true );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'revert' ),
        'retail' => __( 'Retail Menu', 'revert' ),
        'commercial' => __( 'Commercial Menu', 'revert' ),
        'footer' => __( 'Footer Menu', 'revert' ),
    ) );

    // Switch default core markup to output valid HTML5
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Add theme support for custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Add support for editor styles
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/editor-style.css' );

    // Add support for responsive embeds
    add_theme_support( 'responsive-embeds' );

    // Add support for WooCommerce if needed
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'revert_theme_setup' );

/**
 * Set content width
 */
function revert_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'revert_content_width', 1200 );
}
add_action( 'after_setup_theme', 'revert_content_width', 0 );

/**
 * Enqueue scripts and styles
 */
function revert_scripts() {
    // Main stylesheet
    wp_enqueue_style( 'revert-style', get_stylesheet_uri(), array(), '1.0.0' );

    // Custom CSS
    wp_enqueue_style( 'revert-custom', get_template_directory_uri() . '/assets/css/custom.css', array(), '1.0.0' );

    // Main JavaScript
    wp_enqueue_script( 'revert-scripts', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '1.0.0', true );

    // Add AJAX support
    wp_localize_script( 'revert-scripts', 'revertAjax', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'nonce' => wp_create_nonce( 'revert-nonce' )
    ) );

    // Load comment reply script if needed
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'revert_scripts' );

/**
 * Register widget areas
 */
function revert_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer Widget Area 1', 'revert' ),
        'id'            => 'footer-1',
        'description'   => __( 'First footer widget area', 'revert' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Widget Area 2', 'revert' ),
        'id'            => 'footer-2',
        'description'   => __( 'Second footer widget area', 'revert' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Widget Area 3', 'revert' ),
        'id'            => 'footer-3',
        'description'   => __( 'Third footer widget area', 'revert' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Widget Area 4', 'revert' ),
        'id'            => 'footer-4',
        'description'   => __( 'Fourth footer widget area', 'revert' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'revert_widgets_init' );

/**
 * Include custom post types
 */
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Include custom taxonomies
 */
require get_template_directory() . '/inc/custom-taxonomies.php';

/**
 * Include template functions
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Include AJAX handlers
 */
require get_template_directory() . '/inc/ajax-handlers.php';

/**
 * Custom excerpt length
 */
function revert_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'revert_excerpt_length', 999 );

/**
 * Custom excerpt more
 */
function revert_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'revert_excerpt_more' );

/**
 * Add custom body classes
 */
function revert_body_classes( $classes ) {
    // Add class if sidebar is active
    if ( ! is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'no-sidebar';
    }

    // Add class for post types
    if ( is_singular() ) {
        $classes[] = 'singular-' . get_post_type();
    }

    return $classes;
}
add_filter( 'body_class', 'revert_body_classes' );

/**
 * Pagination
 */
function revert_pagination() {
    global $wp_query;

    if ( $wp_query->max_num_pages <= 1 ) {
        return;
    }

    $big = 999999999;

    $args = array(
        'base'         => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format'       => '?paged=%#%',
        'current'      => max( 1, get_query_var( 'paged' ) ),
        'total'        => $wp_query->max_num_pages,
        'prev_text'    => __( '&larr; Previous', 'revert' ),
        'next_text'    => __( 'Next &rarr;', 'revert' ),
        'type'         => 'list',
        'end_size'     => 3,
        'mid_size'     => 3
    );

    echo '<nav class="pagination">';
    echo paginate_links( $args );
    echo '</nav>';
}

/**
 * Allow SVG uploads
 */
function revert_mime_types( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'revert_mime_types' );

/**
 * Customize login page
 */
function revert_login_logo() {
    if ( has_custom_logo() ) {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        ?>
        <style type="text/css">
            #login h1 a, .login h1 a {
                background-image: url(<?php echo esc_url( $logo[0] ); ?>);
                height: 80px;
                width: 320px;
                background-size: contain;
                background-repeat: no-repeat;
                padding-bottom: 30px;
            }
        </style>
        <?php
    }
}
add_action( 'login_enqueue_scripts', 'revert_login_logo' );

/**
 * Change login logo URL
 */
function revert_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'revert_login_logo_url' );

/**
 * Security: Remove WordPress version
 */
function revert_remove_version() {
    return '';
}
add_filter( 'the_generator', 'revert_remove_version' );

/**
 * Disable XML-RPC for security
 */
add_filter( 'xmlrpc_enabled', '__return_false' );

/**
 * Remove unnecessary header tags
 */
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
