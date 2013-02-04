<?php

/* ==  Post Editor  ======================================================
*
*	   Custom post editor styles dropdown, buttons and quicktags.
*
* ============================================================================*/


/* ==  Styles Dropdown  ==============================*/

function uxde_tiny_mce_before_init($settings) {
	$style_formats = array(
		

		array( 'title' => 'Small Buttons' ),
		
		array( 'title' => __('Black Button', 'uxde'), 'inline' => 'a', 'classes' => 'button small black radius' ),
		array( 'title' => __('Red Button', 'uxde'), 'inline' => 'a', 'classes' => 'button small red radius' ),
		array( 'title' => __('Blue Button', 'uxde'), 'inline' => 'a', 'classes' => 'button small blue radius' ),
		array( 'title' => __('Green Button', 'uxde'), 'inline' => 'a', 'classes' => 'button small green radius' ),
		array( 'title' => __('Grey Button', 'uxde'), 'inline' => 'a', 'classes' => 'button small grey radius' ),
		array( 'title' => __('Light Blue Button', 'uxde'), 'inline' => 'a', 'classes' => 'button small light-blue radius' ),
		array( 'title' => __('Orange Button', 'uxde'), 'inline' => 'a', 'classes' => 'button small orange radius' ),
		array( 'title' => __('Purple Button', 'uxde'), 'inline' => 'a', 'classes' => 'button small purple radius' )		,
		
		array( 'title' => __('Medium Buttons', 'uxde') ),
		
		array( 'title' => __('Black Button', 'uxde'), 'inline' => 'a', 'classes' => 'button medium black radius' ),
		array( 'title' => __('Red Button', 'uxde'), 'inline' => 'a', 'classes' => 'button medium red radius' ),
		array( 'title' => __('Blue Button', 'uxde'), 'inline' => 'a', 'classes' => 'button medium blue radius' ),
		array( 'title' => __('Green Button', 'uxde'), 'inline' => 'a', 'classes' => 'button medium green radius' ),
		array( 'title' => __('Grey Button', 'uxde'), 'inline' => 'a', 'classes' => 'button medium grey radius' ),
		array( 'title' => __('Light Blue Button', 'uxde'), 'inline' => 'a', 'classes' => 'button medium light-blue radius' ),
		array( 'title' => __('Orange Button', 'uxde'), 'inline' => 'a', 'classes' => 'button medium orange radius' ),
		array( 'title' => __('Purple Button', 'uxde'), 'inline' => 'a', 'classes' => 'button medium purple radius' ),
		
		array( 'title' => __('Large Buttons', 'uxde') ),

		array( 'title' => __('Black Button', 'uxde'), 'inline' => 'a', 'classes' => 'button large black radius' ),
		array( 'title' => __('Red Button', 'uxde'), 'inline' => 'a', 'classes' => 'button large red radius' ),
		array( 'title' => __('Blue Button', 'uxde'), 'inline' => 'a', 'classes' => 'button large blue radius' ),
		array( 'title' => __('Green Button', 'uxde'), 'inline' => 'a', 'classes' => 'button large green radius' ),
		array( 'title' => __('Grey Button', 'uxde'), 'inline' => 'a', 'classes' => 'button large grey radius' ),
		array( 'title' => __('Light Blue Button', 'uxde'), 'inline' => 'a', 'classes' => 'button large light-blue radius' ),
		array( 'title' => __('Orange Button', 'uxde'), 'inline' => 'a', 'classes' => 'button large orange radius' ),
		array( 'title' => __('Purple Button', 'uxde'), 'inline' => 'a', 'classes' => 'button large purple radius' ),


	
		array( 'title' => 'Alerts' ),
		
		array( 'title' => 'Standard Alert', 'block' => 'div', 'classes' => 'alert-box' ),
		array( 'title' => 'Success Alert', 'block' => 'div', 'classes' => 'alert-box success' ),
		array( 'title' => 'Warning Alert', 'block' => 'div', 'classes' => 'alert-box warning' ),
		array( 'title' => 'Error Alert', 'block' => 'div', 'classes' => 'alert-box error' ),
		
		
		  
		array( 'title' => 'Columns' ),
		
		array( 'title' => __('One Columns', 'uxde'), 'block' => 'div', 'classes' => 'one columns' ),
		array( 'title' => __('One Columns Last', 'uxde'), 'block' => 'div', 'classes' => 'one columns last' ),
		
		array( 'title' => __('Two Columns', 'uxde'), 'block' => 'div', 'classes' => 'two columns' ),
		array( 'title' => __('Two Columns Last', 'uxde'), 'block' => 'div', 'classes' => 'two columns last' ),
		
		array( 'title' => __('Three Columns', 'uxde'), 'block' => 'div', 'classes' => 'three columns' ),
		array( 'title' => __('Three Columns Last', 'uxde'), 'block' => 'div', 'classes' => 'three columns last' ),
		
		array( 'title' => __('Four Columns', 'uxde'), 'block' => 'div', 'classes' => 'four columns' ),
		array( 'title' => __('Four Columns Last', 'uxde'), 'block' => 'div', 'classes' => 'four columns last' ),
		
		array( 'title' => __('Five Columns', 'uxde'), 'block' => 'div', 'classes' => 'five columns' ),
		array( 'title' => __('Five Columns Last', 'uxde'), 'block' => 'div', 'classes' => 'five columns last' ),
		
		array( 'title' => __('Six Columns', 'uxde'), 'block' => 'div', 'classes' => 'six columns' ),
		array( 'title' => __('Six Columns Last', 'uxde'), 'block' => 'div', 'classes' => 'six columns last' ),
		
		array( 'title' => __('Seven Columns', 'uxde'), 'block' => 'div', 'classes' => 'seven columns' ),
		array( 'title' => __('Seven Columns Last', 'uxde'), 'block' => 'div', 'classes' => 'seven columns last' ),
		
		array( 'title' => __('Eight Columns', 'uxde'), 'block' => 'div', 'classes' => 'eight columns' ),
		array( 'title' => __('Eight Columns Last', 'uxde'), 'block' => 'div', 'classes' => 'eight columns last' ),
		
		array( 'title' => __('Nine Columns', 'uxde'), 'block' => 'div', 'classes' => 'nine columns' ),
		array( 'title' => __('Nine Columns Last', 'uxde'), 'block' => 'div', 'classes' => 'nine columns last' ),
		
		array( 'title' => __('Ten Columns', 'uxde'), 'block' => 'div', 'classes' => 'ten columns' ),
		array( 'title' => __('Ten Columns Last', 'uxde'), 'block' => 'div', 'classes' => 'ten columns last' ),
		
		array( 'title' => __('Eleven Columns', 'uxde'), 'block' => 'div', 'classes' => 'eleven columns' ),
		array( 'title' => __('Eleven Columns Last', 'uxde'), 'block' => 'div', 'classes' => 'eleven columns last' ),
		
		array( 'title' => __('Twelve Columns', 'uxde'), 'block' => 'div', 'classes' => 'twelve columns last' )
		
		

	);
	$settings['style_formats'] = json_encode($style_formats);
	$settings['verify_html'] = false;
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'uxde_tiny_mce_before_init' );


/* ==  Editor Buttons  ==============================*/

function uxde_editor_buttons() {
	if ( current_user_can('edit_posts') && current_user_can('edit_pages') ) {
		add_filter('mce_external_plugins', 'add_uxde_editor_buttons');
	}
}
add_action('init', 'uxde_editor_buttons');

function add_uxde_editor_buttons($button_array) {
	$button_array['uxde'] = get_template_directory_uri().'/lib/theme-editor/js/editor-buttons.js';
	return $button_array;
}


/* ==  Quicktags  ==============================*/

function uxde_quicktags() {
	if ( current_user_can('edit_posts') && current_user_can('edit_pages') ) {
		wp_enqueue_script('uxde_quicktags', get_template_directory_uri() .'/lib/theme-editor/js/quicktags.js', array('quicktags'));
	}
}
add_action('admin_print_scripts', 'uxde_quicktags');


/* ==  Add Custom Styles Dropdown and Buttons to tinyMCE 3rd Row  ==============================*/

function uxde_mce_buttons_3($buttons) {
  array_push( $buttons, 'styleselect', 'uxde_contact_shortcode', 'uxde_hr_snippet', 'uxde_tabs_snippet', 'uxde_toggle_snippet', 'uxde_toggle_closed_snippet' );
  return $buttons;
}
add_filter('mce_buttons_3', 'uxde_mce_buttons_3');
