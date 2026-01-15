<?php 
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! function_exists( 'skt_night_club_setup' ) ) : 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function skt_night_club_setup() {
	$GLOBALS['content_width'] = apply_filters( 'skt_night_club_content_width', 640 );
	load_theme_textdomain( 'skt-night-club', get_stylesheet_directory_uri() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_post_type_support( 'page', 'excerpt' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 125,
		'flex-height' => true,
	) );	
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'skt-night-club' )				
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
} 
endif; // skt_night_club_setup
add_action( 'after_setup_theme', 'skt_night_club_setup' );

function event_planners_remove_parent_tgmpa() {
    remove_action( 'tgmpa_register', 'event_planners_register_required_plugins' );
}
add_action( 'after_setup_theme', 'event_planners_remove_parent_tgmpa', 1 );

function skt_night_club_widgets_init() { 	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'skt-night-club' ),
		'description'   => esc_html__( 'Appears on sidebar', 'skt-night-club' ),
		'id'            => 'fc-pln-sidebar',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title titleborder"><span>',
		'after_title'   => '</span></h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Area', 'skt-night-club' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-night-club' ),
		'id'            => 'fc-1-rfl',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );
}
add_action( 'widgets_init', 'skt_night_club_widgets_init' );


add_action( 'wp_enqueue_scripts', 'skt_night_club_enqueue_styles' );
function skt_night_club_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
} 

add_action( 'wp_enqueue_scripts', 'skt_night_club_child_styles', 99);
function skt_night_club_child_styles() {
  wp_enqueue_style( 'skt-night-club-child-style', get_stylesheet_directory_uri()."/css/responsive.css" );
} 

function skt_night_club_admin_style() {
  wp_enqueue_script('skt-night-club-admin-script', get_stylesheet_directory_uri()."/js/skt-night-club-admin-script.js");
}
add_action('admin_enqueue_scripts', 'skt_night_club_admin_style');

function skt_night_club_admin_about_page_css_enqueue($hook) {
   if ( 'appearance_page_skt_night_club_guide' != $hook ) {
        return;
    }
    wp_enqueue_style( 'skt-night-club-about-page-style', get_stylesheet_directory_uri() . '/css/skt-night-club-about-page-style.css' );
}
add_action( 'admin_enqueue_scripts', 'skt_night_club_admin_about_page_css_enqueue' );

function skt_night_club_admin_css_style() {
  wp_enqueue_style('skt-night-club-admin-style', get_stylesheet_directory_uri()."/css/skt-night-club-admin-style.css");
}
add_action('admin_enqueue_scripts', 'skt_night_club_admin_css_style');

function skt_night_club_dequeue_event_planners_custom_js() {
	wp_dequeue_script( 'event-planners-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '01062020', true );
	wp_dequeue_script( 'event-planners-customscripts', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts', 'skt_night_club_dequeue_event_planners_custom_js', 20 );

add_action( 'wp_enqueue_scripts', 'skt_night_club_child_navigation', 99);
function skt_night_club_child_navigation() {
  wp_enqueue_script('skt-night-club-custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), null, true );
  wp_enqueue_script( 'skt-night-club-child-navigation', get_stylesheet_directory_uri(). '/js/navigation.js');
}

/**
 * Show notice on theme activation
 */
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	add_action( 'admin_notices', 'skt_night_club_activation_notice' );
}
function skt_night_club_activation_notice(){
    ?>
    <div class="notice notice-info is-dismissible"> 
        <div class="skt-night-club-notice-container">
        	<div class="skt-night-club-notice-img"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/icon-skt-templates.png' ); ?>" alt="<?php echo esc_attr('SKT Templates');?>" ></div>
            <div class="skt-night-club-notice-content">
            <div class="skt-night-club-notice-heading"><?php echo esc_html__('Thank you for installing SKT Night Club!', 'skt-night-club'); ?></div>
            <p class="largefont"><?php echo esc_html__('SKT Night Club comes with 150+ ready to use Elementor templates. Install the SKT Templates plugin to get started.', 'skt-night-club'); ?></p>
            </div>
            <div class="skt-night-club-clear"></div>
        </div>
    </div>
    <?php
}

if ( ! function_exists( 'skt_night_club_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function skt_night_club_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

function skt_night_club_load_dashicons(){
   wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'skt_night_club_load_dashicons', 999);

/**
 * Retrieve webfont URL to load fonts locally.
 */
/**
* Enqueue theme fonts.
*/
function skt_night_club_fonts() {
$fonts_url = skt_night_club_get_fonts_url();

// Load Fonts if necessary.
if ( $fonts_url ) {
	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
	wp_enqueue_style( 'skt-night-club-fonts', wptt_get_webfont_url( $fonts_url ), array(), '20201110' );
}
}
add_action( 'wp_enqueue_scripts', 'skt_night_club_fonts', 1 );
add_action( 'enqueue_block_editor_assets', 'skt_night_club_fonts', 1 );
 
function skt_night_club_get_fonts_url() {
	$font_families = array(
		'Poppins:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic',
		'Assistant:200,300,400,500,600,700,800',
		'Anton:200,300,400,500,600,700,800',
		'Oswald:200,300,400,500,600,700,800',
	);

	$query_args = array(
		'family'  => urlencode( implode( '|', $font_families ) ),
		'subset'  => urlencode( 'latin,latin-ext' ),
		'display' => urlencode( 'swap' ),
	);

	return apply_filters( 'skt_night_club_get_fonts_url', add_query_arg( $query_args, 'https://fonts.googleapis.com/css' ) );
}

define('SKT_NIGHT_CLUB_SKTTHEMES_URL','https://www.sktthemes.org');
define('SKT_NIGHT_CLUB_SKTTHEMES_PRO_THEME_URL','https://www.sktthemes.org/shop/nightclub-wordpress-theme/');
define('SKT_NIGHT_CLUB_SKTTHEMES_FREE_THEME_URL','https://www.sktthemes.org/shop/skt-night-club/');
define('SKT_NIGHT_CLUB_SKTTHEMES_THEME_DOC','https://sktthemesdemo.net/documentation/skt-nightclub-doc/');
define('SKT_NIGHT_CLUB_SKTTHEMES_LIVE_DEMO','https://sktperfectdemo.com/themepack/nightclub/');
define('SKT_NIGHT_CLUB_SKTTHEMES_THEMES','https://www.sktthemes.org/themes');
define('SKT_NIGHT_CLUB_SKTTHEMES_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );

function skt_night_club_remove_parent_function(){	 
	remove_action( 'admin_notices', 'event_planners_activation_notice');
	remove_action( 'admin_menu', 'event_planners_abouttheme');
	remove_action( 'customize_register', 'event_planners_customize_register');
	remove_action( 'wp_enqueue_scripts', 'event_planners_custom_css');
}
add_action( 'init', 'skt_night_club_remove_parent_function' );

function skt_night_club_remove_parent_theme_stuff() {
    remove_action( 'after_setup_theme', 'event_planners_setup' );
}
add_action( 'after_setup_theme', 'skt_night_club_remove_parent_theme_stuff', 0 );

function skt_night_club_unregister_widgets_area(){
	unregister_sidebar( 'sidebar-1' );
	unregister_sidebar( 'fc-1' );
	unregister_sidebar( 'fc-2' );
	unregister_sidebar( 'fc-3' );
	unregister_sidebar( 'fc-4' );
}
add_action( 'widgets_init', 'skt_night_club_unregister_widgets_area', 11 );

require_once get_stylesheet_directory() . '/inc/about-themes.php';  
require_once get_stylesheet_directory() . '/inc/customizer.php';

function skt_night_club_enqueue_comment_reply_script() {
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'skt_night_club_enqueue_comment_reply_script' );

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php'; // Make sure this file exists in your child theme

add_action( 'tgmpa_register', 'skt_night_club_register_required_plugins' );

function skt_night_club_register_required_plugins() {
	$plugins = array(
		array(
			'name'      => 'SKT Templates',
			'slug'      => 'skt-templates',
			'required'  => false,
		)		 				
	);

	$config = array(
		'id'           => 'tgmpa',
		'default_path' => '',
		'menu'         => 'skt-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );
}

function skt_night_club_add_inner_body_class( $classes ) {
    if ( !is_home() && !is_front_page() ) {
        $classes[] = 'inner';
    }
    return $classes;
}
add_filter( 'body_class', 'skt_night_club_add_inner_body_class' );