<?php
/**
 * Gridlock functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * @package WordPress_Themes
 * @subpackage Gridlock
 */

/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
  $content_width = 1200;

/**
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Twelve supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 */
function twentytwelve_setup() {
  // This theme styles the visual editor with editor-style.css to match the theme style.
  add_editor_style("css/editor-style.css");

  // Adds RSS feed links to <head> for posts and comments.
  add_theme_support( 'automatic-feed-links' );

  // This theme supports a variety of post formats.
  add_theme_support( 'post-formats', array( 'gallery', 'video', 'image', 'link') );

  /*
   * This theme supports custom background color and image, and here
   * we also set up the default background color.
   */
  add_theme_support( 'custom-background', array(
    'default-color' => 'e6e6e6',
  ) );

  // This theme uses a custom image size for featured images, displayed on "standard" posts.
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 400, 9999 ); // Unlimited height, soft crop
}
add_action( 'after_setup_theme', 'gridlock_setup' );

function gridlock_stylesheet_directory_uri( $args ) {
	return $args."/css";
}
add_filter( 'stylesheet_directory_uri', 'gridlock_stylesheet_directory_uri', 10, 2 );