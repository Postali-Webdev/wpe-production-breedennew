<?php
/**
 * Custom Testimonials 
 *
 * @package Postali Parent
 * @author Postali LLC
 */

function create_custom_post_type_reviews() {

// set up labels
	$labels = array(
 		'name' => 'Reviews',
    	'singular_name' => 'Review',
    	'add_new' => 'Add New Review',
    	'add_new_item' => 'Add New Review',
    	'edit_item' => 'Edit Review',
    	'new_item' => 'New Review',
    	'all_items' => 'All Reviews',
    	'view_item' => 'View Reviews',
    	'search_items' => 'Search Reviews',
    	'not_found' =>  'No Reviews Found',
    	'not_found_in_trash' => 'No Reviews found in Trash', 
    	'parent_item_colon' => '',
    	'menu_name' => 'Reviews',
    );
    //register post type
	register_post_type( 'Reviews', array(
		'labels' => $labels,
        'menu_icon' => 'dashicons-format-quote',
		'has_archive' => true,
 		'public' => true,
		'supports' => array( 'title', 'editor', 'excerpt'),	
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'rewrite' => array( 'slug' => 'reviews', 'with_front' => false ),
		)
	);

}

// Register Custom Taxonomy
function review_topic() {

	$labels = array(
		'name'                       => _x( 'Review Topic', 'Review Topics' ),
		'singular_name'              => _x( 'Review Topic', 'Review Topic' ),
		'menu_name'                  => __( 'Review Topic' ),
		'all_items'                  => __( 'All Review Topics' ),
		'new_item_name'              => __( 'New Review Topic' ),
		'add_new_item'               => __( 'Add Review Topic' ),
		'edit_item'                  => __( 'Edit Review Topic' ),
		'update_item'                => __( 'Update Review Topic' ),
		'view_item'                  => __( 'View Review Topic' ),
		'separate_items_with_commas' => __( 'Separate Review Topics with commas' ),
		'add_or_remove_items'        => __( 'Add or remove Review Topics' ),
		'popular_items'              => __( 'Popular TestimoReviewnial Topics' ),
		'search_items'               => __( 'Search Review Topics' ),
		'not_found'                  => __( 'Not Found' ),
		'no_terms'                   => __( 'No Review Topics' ),
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
	register_taxonomy( 'review_topic', array( 'reviews' ), $args );

}
add_action( 'init', 'review_topic', 0 );
add_action( 'init', 'create_custom_post_type_reviews' );