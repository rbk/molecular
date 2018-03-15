<?php

/** 
 * Content width
 */
if ( ! isset( $content_width ) ) $content_width = 806;


/**
 * Define our assets directory to use everywhere. 
 */
define('RBK_THEME_DIR', get_template_directory_uri() . '/assets');


/**
 * Primary WordPress theme setup action.
 * @return none
 */
function molecular_theme_setup() {

	load_theme_textdomain( 'molecular', get_template_directory() . '/languages' );
	
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'molecular' ),
		'small_menu' => __( 'Small Header Menu', 'molecular' )
	));

	add_theme_support( 'custom-background', array()); 
	add_theme_support( 'post-thumbnails' ); // Featured Images
	add_theme_support( 'title-tag' ); // Allow plugins to manage the title tag - https://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
	add_theme_support( 'custom-header' ); // Custom Header Image - https://codex.wordpress.org/Function_Reference/add_theme_support#Custom_Header
	add_theme_support( 'automatic-feed-links' ); // https://codex.wordpress.org/Function_Reference/add_theme_support#Feed_Links
	add_editor_style( RBK_THEME_DIR . '/css/editor_style.css' );

}
add_action( 'after_setup_theme', 'molecular_theme_setup' );

/**
 * Register widget areas
 * @return WordPress widget functionality
 */
function molecular_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'molecular' ),
		'id'            => 'sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Mobile Menu Content Area', 'molecular' ),
		'id'            => 'mobile_menu_content',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widgets Area', 'molecular' ),
		'id'            => 'footer_widgets',
		'before_widget' => '<aside id="%1$s" class="col-md-3 col-sm-3 widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'molecular_widgets_init' );

/**
 * Enqueue scripts and stylesheets here to be compatible with WordPress plugins.
 * @return script and link tags
 */
function molecular_enqueue_scripts() {
	
	// DEV ONLY - Live Reload and Grunt Tasks
	$host = $_SERVER['HTTP_HOST'];
	if( $host == 'localhost' ){
		wp_enqueue_script( 'livereload', 'http://localhost:123456/livereload.js', array(), '20130115', false );
	}
	wp_enqueue_style( 'molecular-stylesheet', RBK_THEME_DIR . '/css/app.css', '', 1, 'all');
	wp_enqueue_style( 'molecular-font-awesome', RBK_THEME_DIR . '/font-awesome-4.4.0/css/font-awesome.min.css', '', 4, 'all' );
	wp_enqueue_script( 'molecular-production-js', RBK_THEME_DIR . '/js/build/production.min.js', array('jquery'), '20120206', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'molecular_enqueue_scripts' );


function get_featured_image_url( $post_id, $size = 'full'){
	$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), $size );
	if( isset($image_url[0]) ){
		return $image_url[0];
	} else {
		return false;
	}
}

function new_excerpt_length($length) {
	return 40;
}
add_filter('excerpt_length', 'new_excerpt_length');
/**
 * Add link to content at the end of the excerpt, WordPress style.
 * @param  string $more WordPress default [...] ([&hellip;])
 * @return string       What we want to replace the default more string with.
 */
function new_excerpt_more( $more ) {
	return '&hellip; <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Read More', 'molecular' ) . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

/**
 * Custom Password Protected Form
 */
function molecular_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">';
    $o .=  __( "To view this protected post, enter the password below:", "molecular" );
    $o .= '<label for="' . $label . '">' . __( "Password:", "molecular" ) . ' </label>';
    $o .= '<input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" />&nbsp;';
    $o .= '<input type="submit" name="Submit" value="' . __( "Submit", "molecular") . '" />';
    $o .= '</form>';
  
    return $o;
}
add_filter( 'the_password_form', 'molecular_password_form' );

/**
 * Imports
 */
include('includes/cool-php-functions.php');
include('theme_mods/main.php');
include('includes/template-tags.php');
include('includes/comments-template.php');

function my_tweaked_admin_bar() {
	global $wp_admin_bar;
	//Do stuff
	$arr = print_r( $wp_admin_bar->get_nodes(), true );
	$fh = fopen(__DIR__ . '/log.txt', 'w+');
	fwrite($fh, $arr);
	fclose($fh);

}
add_action( 'wp_before_admin_bar_render', 'my_tweaked_admin_bar' );


?>