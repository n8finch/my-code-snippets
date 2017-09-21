<?php
/**
 * Create Metaboxes
 *
 * @link http://www.billerickson.net/wordpress-metaboxes/
 * @param array
 * @return array
 *
 */
function be_create_metaboxes( $meta_boxes ) {
	$meta_boxes[] = array(
    	'id' => 'rotator-options',
	    'title' => 'Rotator Options',
	    'pages' => array('rotator'),
		'context' => 'normal',
		'priority' => 'low',
		'show_names' => true,
		'fields' => array(
			array(
				'name' => 'Instructions',
				'desc' => 'In the right column upload a featured image. Make sure this image is at least 900x360px wide. Then fill out the information below.',
				'type' => 'title',
			),
			array(
		        'name' => 'Display Info',
		        'desc' => 'Show Title and Excerpt from above',
	    	    'id' => 'show_info',
	        	'type' => 'checkbox'
			),
			array(
				'name' => 'Clickthrough URL',
	            'desc' => 'Where the Learn More button goes',
            	'id' => 'url',
            	'type' => 'text'
			),
		),
	);

	return $meta_boxes;
 }
add_filter( 'cmb_meta_boxes' , 'be_create_metaboxes' );

/**
 * Initialize Metabox Class
 * see /lib/metabox/example-functions.php for more information
 *
 */
function be_initialize_cmb_meta_boxes() {
    if ( !class_exists( 'cmb_Meta_Box' ) ) {
        require_once( CHILD_DIR . '/lib/metabox/init.php' );
    }
}
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );