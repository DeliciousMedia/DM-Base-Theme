<?php
/**
 * _s functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function _s_setup() {
	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		[
			'menu-1' => esc_html__( 'Primary', '_s' ),
		]
	);
}
add_action( 'after_setup_theme', '_s_setup' );

/**
 * Enqueue scripts and styles.
 */
function _s_scripts() {

	$theme = wp_get_theme();
	$suffix = ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ? '' : '.min';

	wp_enqueue_style( '_s-style', get_stylesheet_directory_uri() . '/assets/css/site.css', [], $theme->get( 'Version' ) );
	wp_style_add_data( '_s-style', 'rtl', 'replace' );

	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( '_s-main', get_template_directory_uri() . '/assets/js/site.js', [], $theme->get( 'Version' ), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', '_s_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
