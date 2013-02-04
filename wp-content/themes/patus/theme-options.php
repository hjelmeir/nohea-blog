<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {
	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
	
	// Test data
	$test_array = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
	
	// Multicheck Array
	$multicheck_array = array("one" => "French Toast", "two" => "Pancake", "three" => "Omelette", "four" => "Crepe", "five" => "Waffle");
	
	// Multicheck Defaults
	$multicheck_defaults = array("one" => "1","five" => "1");
	
	// Background Defaults
	
	$background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat','position' => 'top center','attachment'=>'scroll');
	
	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';
		
	$options = array();
		
	$options[] = array( "name" => "Basic Settings",
						"type" => "heading");
	
	$options[] = array( "name" => __('Logo', 'uxde'),
						"desc" => __('Upload your logo', 'uxde'),
						"id" => "uxde_logo",
						"type" => "upload");

	$options[] = array( "name" => __('Footer Logo', 'uxde'),
						"desc" => __('Upload your logo at footer', 'uxde'),
						"id" => "uxde_footer",
						"type" => "upload");

	$options[] = array( 'name' => __('Favicon', 'uxde'),
						'desc' => __('Upload a 16px x 16px Png/Gif image that will represent your favicon.', 'uxde'),
						'id' => 'uxde_favicon',
						'type' => 'upload');
						
	$options[] = array( "name" => __('Contact Form Email', 'uxde'),
						"desc" => __('Enter the email address you wish to use for the contact form.', 'uxde'),
						"id" => "uxde_contact_email",
						"std" => "",
						"type" => "text");

	$options[] = array( 'name' => __('Theme Stylesheet', 'uxde'),
						'desc' => __('Select your theme main color style.', 'uxde'),
						'id' => 'uxde_colorpicker',
						'std' => '#FABF0B',
						'type' => 'color' );

	$options[] = array( 'name' => __('Link Stylesheet', 'uxde'),
						'desc' => __('Select your theme link color style.', 'uxde'),
						'id' => 'uxde_colorlink',
						'std' => '#41B7D8',
						'type' => 'color' );

	
		
		

		
	$options[] = array( "name" => __('Social Networks', 'uxde'),
						"type" => "heading");

	$options[] = array(
						'name' => __('Share Buttons', 'uxde'),
						'desc' => __('Enable share buttons on the single post.', 'uxde'),
						'id' => 'uxde_share',
						'std' => '1',
						'type' => 'checkbox');

	$options[] = array( "name" => __('RSS Username', 'uxde'),
						"desc" => __('Enter your RSS username.', 'uxde'),
						"id" => "uxde_rss",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => __('Twitter Username', 'uxde'),
						"desc" => __('Enter your Twitter username.', 'uxde'),
						"id" => "uxde_twitter",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => __('Facebook Fan Page', 'uxde'),
						"desc" => __('Enter your Facebook fan page URL.', 'uxde'),
						"id" => "uxde_facebook",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => __('Google Plus', 'uxde'),
						"desc" => __('Enter your Google Plus URL.', 'uxde'),
						"id" => "uxde_google",
						"std" => "",
						"type" => "text");	
						


						
						
	$options[] = array( "name" => __('Advertisement', 'uxde'),
						"type" => "heading");

	$options[] = array( "name" => __('Top Ad', 'uxde'),
						"desc" => __('Enter HTML code of top ad.', 'uxde'),
						"id" => "uxde_top_ad",
						"std" => "",
						"type" => "textarea");
						
	$options[] = array( "name" => __('First Home Ad', 'uxde'),
						"desc" => __('Enter HTML code of first home ad.', 'uxde'),
						"id" => "uxde_first_home",
						"std" => "",
						"type" => "textarea");
						
	$options[] = array( "name" => __('Second Home Ad', 'uxde'),
						"desc" => __('Enter HTML code of second home ad.', 'uxde'),
						"id" => "uxde_second_home",
						"std" => "",
						"type" => "textarea",
						"options" => $options_pages);




	$options[] = array( 'name' => __('Tracking Code', 'uxde'),
						'type' => 'heading');

	$options[] = array( 'name' => __('Header Scripts', 'uxde'),
						'desc' => __('Paste your custom scripts here, they will be inserted just before the &lt;/head&gt; tag.', 'uxde'),
						'id' => 'uxde_header_scripts',
						'std' => '',
						'type' => 'textarea');

	$options[] = array( 'name' => __('Footer Scripts', 'uxde'),
						'desc' => __('Paste your custom scripts here, they will be inserted just before the &lt;/body&gt; tag.', 'uxde'),
						'id' => 'uxde_footer_scripts',
						'std' => '',
						'type' => 'textarea');





	$options[] = array( 'name' => __('Docs', 'uxde'),
						'type' => 'heading');

	$options[] = array( 'name' => __('Patus Documentation', 'uxde'),
						'desc' => __('Patus Documentation<br />
									  http://www.uxde.net/support/showthread.php?6-Patus-Theme-Documentation<br /><br />
									  If you require support such as with the installation or bugs of this theme please post your questions at:<br />
									  http://www.uxde.net/support/forumdisplay.php?12-Patus-Theme<br /><br />
									  If you have new ideas want to suggest for us please post at:<br />
									  http://www.uxde.net/support/forumdisplay.php?7-New-Ideas<br /><br />
									  Please do not post support questions in the comments area at http://www.uxde.net.
									  I will do my best to get back to you as soon as possible. Please be patient.', 'uxde'),
						'type' => 'info');
						
						
								
	return $options;
}

/* 
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function($) {

	$('#example_showhidden').click(function() {
  		$('#section-example_text_hidden').fadeToggle(400);
	});
	
	if ($('#example_showhidden:checked').val() !== undefined) {
		$('#section-example_text_hidden').show();
	}
	
});
</script>

<?php
}