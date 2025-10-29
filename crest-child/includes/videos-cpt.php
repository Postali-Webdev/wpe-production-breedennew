<?php
/**
 * Custom Videos 
 *
 * @package Postali Parent
 * @author Postali LLC
 */

function create_custom_post_type_videos() {

// set up labels
	$labels = array(
 		'name' => 'Videos',
    	'singular_name' => 'Video',
    	'add_new' => 'Add New Video',
    	'add_new_item' => 'Add New Video',
    	'edit_item' => 'Edit Video',
    	'new_item' => 'New Video',
    	'all_items' => 'All Videos',
    	'view_item' => 'View Videos',
    	'search_items' => 'Search Videos',
    	'not_found' =>  'No Videos Found',
    	'not_found_in_trash' => 'No Videos found in Trash', 
    	'parent_item_colon' => '',
    	'menu_name' => 'Videos',
    );
    //register post type
	register_post_type( 'Videos', array(
		'labels' => $labels,
        'menu_icon' => 'dashicons-format-video',
		'has_archive' => true,
 		'public' => true,
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail'),	
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'rewrite' => array( 'slug' => 'videos', 'with_front' => false ),
		)
	);

}

// Register Custom Taxonomy
function Video_topic() {

	$labels = array(
		'name'                       => _x( 'Video Topic', 'Video Topics' ),
		'singular_name'              => _x( 'Video Topic', 'Video Topic' ),
		'menu_name'                  => __( 'Video Topic' ),
		'all_items'                  => __( 'All Video Topics' ),
		'new_item_name'              => __( 'New Video Topic' ),
		'add_new_item'               => __( 'Add Video Topic' ),
		'edit_item'                  => __( 'Edit Video Topic' ),
		'update_item'                => __( 'Update Video Topic' ),
		'view_item'                  => __( 'View Video Topic' ),
		'separate_items_with_commas' => __( 'Separate Video Topics with commas' ),
		'add_or_remove_items'        => __( 'Add or remove Video Topics' ),
		'popular_items'              => __( 'Popular TestimoVideonial Topics' ),
		'search_items'               => __( 'Search Video Topics' ),
		'not_found'                  => __( 'Not Found' ),
		'no_terms'                   => __( 'No Video Topics' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'Video_topic', array( 'Videos' ), $args );

}
add_action( 'init', 'Video_topic', 0 );
add_action( 'init', 'create_custom_post_type_videos' );