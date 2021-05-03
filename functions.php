<?php

if ( ! function_exists( 'rawnet_setup' ) ) {

    function rawnet_setup() {
		load_theme_textdomain( 'rawnet', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_editor_style();
		add_theme_support( 'post-thumbnails' );
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'rawnet' ),
			'footer' => esc_html__( 'footer Menu', 'rawnet' ),
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// add_theme_support( 'custom-logo', array(
		//    'flex-width' => false,
		//    'height'     => 80,
	 //   	   'width'      => 250,
		// ) );

		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );

		// image size
		add_image_size( 'rawnet_thumbnail', 570, 642 );
		add_image_size( 'rawnet_team_thumbnail', 370, 450 );

		// Set up the WordPress core custom background feature.
		// add_theme_support( 'custom-background', apply_filters( 'rawnet_custom_background_args', array(
		// 	'default-color' => 'ffffff',
		// 	'default-image' => '',
		// ) ) );
    }
}

add_action( 'after_setup_theme', 'rawnet_setup' );


if ( ! function_exists( 'rawnet_widgets_init' ) ) {
    function rawnet_widgets_init() {
    	register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'rawnet' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Sidebar Widget', 'rawnet'),
			'before_widget' => '<div id="%1$s" class="card my-4 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="card-header">',
			'after_title'   => '</h2>',
		) );
    }
}

add_action( 'widgets_init', 'rawnet_widgets_init' );

if ( ! function_exists( 'rawnet_scripts' ) ) {
    function rawnet_scripts() {
    	global $wp_query;

    	wp_enqueue_style( 'rawnet_animate_css', get_template_directory_uri() . '/assets/css/animate.css');
    	wp_enqueue_style( 'rawnet_bootstrap_css', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    	wp_enqueue_style( 'rawnet_owl_css', get_template_directory_uri() . '/assets/css/owl.carousel.min.css');
    	wp_enqueue_style( 'rawnet_awesome_css', get_template_directory_uri() . '/assets/css/font-awesome.min.css');
    	wp_enqueue_style( 'rawnet_main_css', get_template_directory_uri() . '/assets/css/style.css');
    	wp_enqueue_style( 'rawnet_responsive_css', get_template_directory_uri() . '/assets/css/responsive.css');
    	wp_enqueue_style( 'rawnet_style_css', get_template_directory_uri() . '/style.css');

    	wp_enqueue_script( 'jquery' );
    	wp_enqueue_script( 'rawnet_bootstrap_js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', ['jquery'], false, true);
    	wp_register_style( 'polyfill', 'https://cdn.polyfill.io/v3/polyfill.min.js', false, false, true);
    	wp_enqueue_script( 'polyfill' );
    	wp_enqueue_script( 'rawnet_owl_js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', ['jquery'], false, true);
    	wp_enqueue_script( 'rawnet_js', get_template_directory_uri() . '/assets/js/rawnet.js', false, false, true);
    	wp_enqueue_script( 'rawnet_main_js', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], false, true);

    }
}

add_action( 'wp_enqueue_scripts', 'rawnet_scripts' );


function rawnet_nav_class( $classes, $item, $args ){
	if( 'footer' === $args->theme_location )  {
    	return  [ 'footer-list-item' ];
    }
    return $classes;
}

add_filter( 'nav_menu_css_class' , 'rawnet_nav_class' , 10 , 3 );

function rawnet_class_to_all_menu_anchors( $atts, $item, $args ) {
	if( 'footer' === $args->theme_location )  {
    	$atts['class'] = 'footer-list-link';
	}

	if( 'primary' === $args->theme_location )  {
    	$atts['class'] = 'menu-link';
	}

    return $atts;
}

add_filter( 'nav_menu_link_attributes', 'rawnet_class_to_all_menu_anchors', 10, 3 );


add_filter('post_class', 'set_row_post_class', 10,3);

function set_row_post_class( $classes, $class, $post_id ){
	if ( get_post_type( $post_id ) == 'post' ) {
		if( is_single() ) {
			$classes[] = 'col-lg-6 mb-lg-0 mb-5';
		} else {
			$classes[] = 'col-lg-6';
		}
	}

	return $classes;
}

add_filter( 'wpcf7_form_class_attr', 'add_class_to_form' );

function add_class_to_form( $class ) {
	$class = 'wpcf7-form _form _form_14 _inline-form  _dark';

	return $class;
}

add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
    $content = str_replace('<br />', '', $content);

    return $content;
});

require get_template_directory() . '/inc/post.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/Shortcode.php';
require get_template_directory() . '/inc/custom_post.php';
require get_template_directory() . '/inc/custom_functions.php';
require get_template_directory() . '/inc/post_meta.php';
require get_template_directory() . '/inc/user_meta.php';