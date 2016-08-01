<?php
/**
 * @package fac_approvals
 * @version 2.0
 */
/*
Plugin Name: FAC Approvals
Plugin URI: http://dev.brandefined.net/fac-approvals
Description: Adds custom post type and custom fields for automated FAC approvals. [DEPENDENCIES: ACF, Gravity Forms]
Author: Erik Schade
Version: 2.0
Author URI: http://brandefined.com/
*/

// Enqueue plugin styles and scripts
function fac_includes() {
	if ( is_singular( 'fac_approvals' ) ) {
    	wp_enqueue_style( 'fac_approvals_style', plugins_url( 'style/fac-approvals.css', __FILE__ ) );
    	wp_enqueue_script( 'fac_approvals_script', plugins_url( 'js/fac-approvals-scripts.js', __FILE__ ), array(), false, true );
  		wp_enqueue_style( 'tooltips_tipr', plugins_url( 'tooltips/tipr/tipr.css', __FILE__ ) );
  		wp_enqueue_script( 'tooltips_tipr_js', plugins_url( 'tooltips/tipr/tipr.min.js', __FILE__ ) );
  	}
}
add_action( 'wp_enqueue_scripts', 'fac_includes' );

// Enqueue admin scripts
function fac_admin() {
    wp_enqueue_script( 'fac_approvals_admin', plugins_url( 'js/fac-approvals-admin.js', __FILE__ ), array(), false, true );
}
add_action( 'admin_init', 'fac_admin');

// Create the custom post type
function fac_approvals_post_type() {
	register_post_type( 'fac_approvals', array(
	  'labels' => array(
	    'name' => 'FAC Approvals',
	    'singular_name' => 'FAC Approval',
	   ),
	  'description' => 'Client delivery of FAC products',
	  'public' => true,
	  'menu_position' => 20,
	  'supports' => array( 'title', 'editor', 'author' )
	));
}
add_action( 'init', 'fac_approvals_post_type' );

// Load the custom fields - requires ACF
if(function_exists('register_field_group')) {
	register_field_group(array (
		'id' => 'acf_fac-approval-automation',
		'title' => 'FAC Approval Automation',
		'fields' => array (
			array (
				'key' => 'field_5702f00a60ae6',
				'label' => 'FAC URL',
				'name' => 'fac_url',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_577ebf6994bdb',
				'label' => 'CAMPAIGN SETUP',
				'name' => 'campaign_info_tab',
				'type' => 'tab',
			),
			array (
				'key' => 'field_5702f06360ae7',
				'label' => 'Clicks or Likes',
				'name' => 'clicks_or_likes',
				'type' => 'radio',
				'choices' => array (
					'clicks' => 'Clicks',
					'likes' => 'Likes',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'clicks',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_5702a64a272be',
				'label' => 'Client Email',
				'name' => 'client_email',
				'type' => 'email',
				'instructions' => 'Enter the client\'s primary contact email address here.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array (
				'key' => 'field_5702f00a60af2',
				'label' => 'Business Name',
				'name' => 'business',
				'type' => 'text',
				'instructions' => 'Enter the name as it will be displayed in the ads.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5702f00a60af5',
				'label' => 'Business Category',
				'name' => 'bus_category',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5702f00a60af6',
				'label' => 'Business URL',
				'name' => 'bus_url',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_56f5fffaabff7',
				'label' => 'Profile Image',
				'name' => 'profile_img',
				'type' => 'image',
				'instructions' => 'Upload the business profile image thumbnail.',
				'required' => 0,
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'uploadedTo',
			),
			array (
				'key' => 'field_577ebf6994bd3',
				'label' => 'AD #1',
				'name' => 'ad_1_tab',
				'type' => 'tab',
			),
			array (
				'key' => 'field_56f5fffaabfd4',
				'label' => 'Image 1',
				'name' => 'fac_1',
				'type' => 'image',
				'instructions' => 'Upload the first ad image.',
				'required' => 0,
				'save_format' => 'object',
				'preview_size' => 'full',
				'library' => 'uploadedTo',
			),
			array (
				'key' => 'field_5702f00a60af0',
				'label' => 'Title 1',
				'name' => 'title_1',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5702f00a60ag3',
				'label' => 'Subtitle 1',
				'name' => 'subtitle_1',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'If blank, the business name will display',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5702f00a60af1',
				'label' => 'Description 1',
				'name' => 'desc_1',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_577ebf6994bd5',
				'label' => 'AD #2',
				'name' => 'ad_2_tab',
				'type' => 'tab',
			),
			array (
				'key' => 'field_56f6003fabfd5',
				'label' => 'Image 2',
				'name' => 'fac_2',
				'type' => 'image',
				'instructions' => 'Upload the second ad image.',
				'required' => 0,
				'save_format' => 'object',
				'preview_size' => 'full',
				'library' => 'uploadedTo',
			),
			array (
				'key' => 'field_5702f00a60af3',
				'label' => 'Title 2',
				'name' => 'title_2',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5702f00a60ag1',
				'label' => 'Subtitle 2',
				'name' => 'subtitle_2',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'If blank, the business name will display',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5702f00a60af4',
				'label' => 'Description 2',
				'name' => 'desc_2',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_577ebf6994be8',
				'label' => 'MESSAGE',
				'name' => 'message_tab',
				'type' => 'tab',
			),
			array (
				'key' => 'field_577ec4f654a52',
				'label' => 'Message',
				'name' => 'message',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'no',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'fac_approvals',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
				1 => 'permalink',
			),
		),
		'menu_order' => 0,
	));
}

// Add user meta field for phone number
function add_phone_contactmethod( $contactmethods ) {
  // Add Phone Number
  $contactmethods['phone'] = 'Phone';
  return $contactmethods;
}
add_filter('user_contactmethods','add_phone_contactmethod',10,1);


// Handles the custom post type template 
function fac_approvals_template($single) {
    global $wp_query, $post;

	/* Checks for single template by post type */
	if ($post->post_type == "fac_approvals") {
		if (file_exists(dirname( __FILE__ ) . '/templates/fac-approvals-view.php')) {
			$single = dirname( __FILE__ ) . '/templates/fac-approvals-view.php';
			return $single;
		}
	}
}
add_filter('single_template', 'fac_approvals_template');


// Populate Hidden Fields
add_filter('gform_field_value_strat_email', 'populate_strat_email');
function populate_strat_email(){
    global $fac;
    return $fac->strat_email;
}

add_filter('gform_field_value_client_email', 'populate_client_email');
function populate_client_email(){
    global $fac;
    return $fac->client_email;
}

add_filter('gform_field_value_page_title', 'populate_page_title');
function populate_page_title(){
    global $fac;
    return $fac->page_title . '?email=brandefined-user-12345';
}

add_filter('gform_field_value_strat_message', 'populate_strat_message');
function populate_strat_message(){
    return get_the_content();
}
add_filter('gform_field_value_fac_number', 'populate_fac_number');
function populate_fac_number(){
    return get_the_title();
}
function criticalPath() {
	echo '<style>.fac-form { opacity:0; transition:opacity .8s; }</style>';
}
add_action( 'wp_enqueue_scripts', 'criticalPath' );

?>