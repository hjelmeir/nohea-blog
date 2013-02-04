<?php

/* ==  UXDE Theme Setup ==============================*/


function uxde_setup() {

	// Add language supports.
	load_theme_textdomain('uxde');
	
	// Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('post-thumbnails');
	add_image_size( 'relatedpost-thumb', 180, 180, true );
	add_image_size( 'relatedpost-thumb', 163, 160, true );
	
	// Add post formarts supports. http://codex.wordpress.org/Post_Formats
	//add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
	
	// Add menu supports. http://codex.wordpress.org/Function_Reference/register_nav_menus
	add_theme_support('menus');
	register_nav_menus(array(
		'primary_navigation' => __('Primary Navigation', 'uxde'),
		'mobile_navigation' => __('Mobile Navigation', 'uxde')
	));	
	
	include_once('lib/theme-editor/admin-editor.php');
	include_once('lib/theme-editor/theme-shortcodes.php');
	include_once('theme-options.php');
	include_once('lib/theme-functions/theme-pagination.php');
	
	/* ==  Widgets  ==============================*/

	include_once('lib/theme-widgets/widget-twittertweets.php');
	include_once('lib/theme-widgets/widget-facebooklike.php');
	include_once('lib/theme-widgets/widget-flickrphotos.php');
	include_once('lib/theme-widgets/widget-popularposts.php');
	include_once('lib/theme-widgets/widget-recentposts.php');
	include_once('lib/theme-widgets/widget-optin.php');
	include_once('lib/theme-widgets/widget-ad125.php');
	
	if ( !function_exists( 'optionsframework_init' ) ) {
	
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/lib/theme-options/' );
		require_once dirname( __FILE__ ) . '/lib/theme-options/options-framework.php';
	
	}
	
	add_editor_style( 'extras.css' );
}

add_action('after_setup_theme', 'uxde_setup');



/*
 * This is an example of how to override a default filter
 * for 'textarea' sanitization and $allowedposttags + embed and script.
 */
add_action('admin_init','optionscheck_change_santiziation', 100);
function optionscheck_change_santiziation() {
    remove_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );
    add_filter( 'of_sanitize_textarea', 'custom_sanitize_textarea' );
}
function custom_sanitize_textarea($input) {
    global $allowedposttags;
      $custom_allowedtags["script"] = array( "src" => array(), "type" => array() );
      $custom_allowedtags = array_merge($custom_allowedtags, $allowedposttags);
      $output = wp_kses( $input, $custom_allowedtags);
    return $output;
}




/* ==  Content Width ==============================*/

$content_width = 660;

if ( is_page_template('page-full.php') ) $content_width = 1080;




/* ==  Specific Theme Enqueues  ==============================*/

function uxde_specific_theme_js() {

	if(!is_admin()) {

		wp_deregister_script('jquery');
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
		wp_enqueue_script('jquery');
		
		wp_register_script('modernizr-foundation', get_template_directory_uri() . '/js/modernizr.foundation.js', 'jquery');
		wp_enqueue_script('modernizr-foundation');

		wp_register_script('superfish', get_template_directory_uri() . '/js/superfish.js', 'jquery');
		wp_enqueue_script('superfish');
		
		wp_register_script('easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', 'jquery', '');
		wp_enqueue_script('easing');
		
		wp_register_script('foundation', get_template_directory_uri() . '/js/foundation.js', 'jquery', '', TRUE);
		wp_enqueue_script('foundation');
		
		wp_register_script('cycle', get_template_directory_uri() . '/js/jquery.cycle.all.js', 'jquery', '', TRUE);
		wp_enqueue_script('cycle');
		
		wp_register_script('uxde-custom', get_template_directory_uri() . '/js/custom.js', 'jquery', '', TRUE);
		wp_enqueue_script('uxde-custom');
		
		if ( is_singular() ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		// embed the javascript file that makes the AJAX request
		wp_enqueue_script( 'my-ajax-request', get_template_directory_uri() . '/js/contact.js', array( 'jquery' ) );
 
		// declare the URL to the file that handles the AJAX request (wp-admin/admin-ajax.php)
		wp_localize_script( 'my-ajax-request', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );


	}

}

add_action('wp_print_scripts', 'uxde_specific_theme_js');




/* ==  Widget Areas ==============================*/


$sidebars = array('Sidebar');

foreach ($sidebars as $sidebar) {

	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="sidebar-section twelve columns">',
		'after_widget' => '</div></article>',
		'before_title' => '<h6 class="widget-title">',
		'after_title' => '</h6>'
	));
	
}




/* ==  Get rid of the wierd dots in the excerpt ==============================*/

function trim_excerpt($text)
{
	return str_replace(' [...]', '...', $text);
}
add_filter('get_the_excerpt', 'trim_excerpt');





/* ==  Link jumps to more or top of page ==============================*/

function remove_more_jump_link($link) { 
$offset = strpos($link, '#more-');
if ($offset) {
$end = strpos($link, '"',$offset);
}
if ($end) {
$link = substr_replace($link, '', $offset, $end-$offset);
}
return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');



  
/* ==  Browser Classes  ==============================*/


add_filter('body_class','browser_body_class');
function browser_body_class($classes) {
    global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
    if($is_lynx) $classes[] = 'lynx';
    elseif($is_gecko) $classes[] = 'gecko';
    elseif($is_opera) $classes[] = 'opera';
    elseif($is_NS4) $classes[] = 'ns4';
    elseif($is_safari) $classes[] = 'safari';
    elseif($is_chrome) $classes[] = 'chrome';
    elseif($is_IE) $classes[] = 'ie';
    else $classes[] = 'unknown';
    if($is_iphone) $classes[] = 'iphone';
    return $classes;
}



/* ==  Select Menu  ==============================*/


function uxde_get_page_selector($menu) {

  $page_menu_items = wp_get_nav_menu_items($menu);
  
  $selector = array();
  
  if (is_array($page_menu_items) && count($page_menu_items)>0) {
  
    $selector[] = '<select id="page-selector" name="page-selector" onchange="location.href = document.getElementById(\'page-selector\').value;">';
    
    $selector[] = '<option value="">'.__('Select a Page', 'uxde').'</option>';
    
    foreach($page_menu_items as $page_menu_item) {
      $link = $page_menu_item->url;
      $selector[] = '<option value="'.$link.'">'.$page_menu_item->title.'</option>';
  	}
    $selector[] = '</select>';
  }
  return implode("\n",$selector);
}




/* ==  Add Ancestor Class to Menus  ==============================*/

add_filter('nav_menu_css_class', 'dt_add_ancestor_class', 2, 10);

function dt_add_ancestor_class($classlist, $item){
	global $wp_query, $wpdb;
	//get the ID of the object, to which menu item points
	$id = get_post_meta($item->ID, '_menu_item_object_id', true);
	//get first menu item that is a child of that object
	$children = $wpdb->get_var('SELECT post_id FROM '.$wpdb->postmeta.' WHERE meta_key like "_menu_item_menu_item_parent" AND meta_value='.$item->ID.' LIMIT 1');
	//if there is at least one item, then $children variable will contain it's ID (which is of course more than 0)
	if($children>0)
		//in that case - add the CSS class
		$classlist[]='menu-item-ancestor';
	//return class list
	return $classlist;
}




/* ==  Copyright at Footer  ==============================*/

function theme_link() {
	echo '';
	echo 'Theme by <a href="http://www.uxde.net/">UXDE dot Net</a>.';
	echo '';
}