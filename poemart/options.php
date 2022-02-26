<?php
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'options-framework-theme';
}


function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __( 'One', 'poemandart' ),
		'two' => __( 'Two', 'poemandart' ),
		'three' => __( 'Three', 'poemandart' ),
		'four' => __( 'Four', 'poemandart' ),
		'five' => __( 'Five', 'poemandart' )
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __( 'French Toast', 'poemandart' ),
		'two' => __( 'Pancake', 'poemandart' ),
		'three' => __( 'Omelette', 'poemandart' ),
		'four' => __( 'Crepe', 'poemandart' ),
		'five' => __( 'Waffle', 'poemandart' )
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();
	
	/* Basic Setting */

	$options[] = array(
		'name' => __( 'Basic Settings', 'poemandart' ),
		'type' => 'heading'
	);
	
	$options[] = array(
		'name' => __( 'Logo', 'poemandart' ),
		'desc' => __( 'This creates a full size uploader that previews the image.', 'poemandart' ),
		'id' => 'logo',
		'type' => 'upload'
	);
	$options[] = array(
		'name' => __( 'Topbar Text', 'poemandart' ),
		'desc' => __( '' ),
		'id' => 'topbar',
		'std' => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Topbar Enable', 'poemandart' ),
		'desc' => __( '' ),
		'id' => 'topbaren',
		'std' => '',
		'type' => 'checkbox'
	);
	$options[] = array(
		'name' => __( 'Hire Me Link', 'poemandart' ),
		'desc' => __( '' ),
		'id' => 'hire',
		'std' => '',
		'type' => 'text'
	);
	/* End Basic Setting */


	/* Contact Info Setting */
	
	$options[] = array(
		'name' => __( 'Contact Information', 'poemandart' ),
		'type' => 'heading'
	);
	$options[] = array(
		'name' => __( 'Address', 'poemandart' ),
		'desc' => __( '' ),
		'id' => 'address',
		'std' => '',
		'type' => 'textarea'
	);
	$options[] = array(
		'name' => __( 'Phone', 'poemandart' ),
		'desc' => __( '' ),
		'id' => 'phone',
		'std' => '',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Email', 'poemandart' ),
		'desc' => __( '' ),
		'id' => 'email',
		'std' => '',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Copyright', 'poemandart' ),
		'desc' => __( '' ),
		'id' => 'copyright',
		'std' => '',
		'type' => 'text'
	);
	
	/* End Contact Info Setting */


	/* Social Information */
	
	$options[] = array(
		'name' => __( 'Social Information', 'poemandart' ),
		'type' => 'heading'
	);
	$options[] = array(
		'name' => __( 'Facebook', 'poemandart' ),
		'desc' => __( '' ),
		'id' => 'facebook',
		'std' => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Twitter', 'poemandart' ),
		'desc' => __( '' ),
		'id' => 'twitter',
		'std' => '',
		'type' => 'text'
		);
	$options[] = array(
		'name' => __( 'Instagram', 'poemandart' ),
		'desc' => __( '' ),
		'id' => 'instagram',
		'std' => '',
		'type' => 'text'
		);
	
		
	/* End Social Information */
	
	

	return $options;
}

