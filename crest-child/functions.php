<?php

// debug logging function
if (!function_exists('write_log')) {
    function write_log($log) {
        if (true === WP_DEBUG) {
            if (is_array($log) || is_object($log)) {
                error_log(print_r($log, true));
            } else {
                error_log($log);
            }
        }
    }
}

require_once dirname( __FILE__ ) . '/includes/attorneys-cpt.php';
require_once dirname( __FILE__ ) . '/includes/media-mentions-cpt.php';
require_once dirname( __FILE__ ) . '/includes/videos-cpt.php';

// Allows custom logo in site customization tab
add_theme_support( 'custom-logo', array(
    'height'      => 100,
    'width'       => 400,
    'flex-width' => true,
    'flex-height' => true,
) );

function child_crest_acf_options_fields() {
    acf_add_options_page(array(
        'page_title'    => 'Site Customizations',
        'menu_title'    => 'Site Customizations',
        'menu_slug'     => 'site-customizations',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    acf_add_options_page(array(
        'page_title'    => 'Awards',
        'menu_title'    => 'Awards',
        'menu_slug'     => 'awards',
        'capability'    => 'edit_posts',
        'icon_url'      => 'dashicons-awards',
        'redirect'      => false
    ));
}
add_action('acf/init', 'child_crest_acf_options_fields');

function crest_child_register_nav_menus() {
    register_nav_menus(
        array(
            'footer-pa-nav' => __( 'Footer Practice Area Navigation', 'postali' ),
            'angier-pa-nav' => __( 'Angier Footer Practice Area Navigation', 'postali' ),
            'garner-pa-nav' => __( 'Garner Footer Practice Area Navigation', 'postali' ),
            'cary-pa-nav' => __( 'Cary Footer Practice Area Navigation', 'postali' ),
            'smithfield-pa-nav' => __( 'Smithfield Footer Practice Area Navigation', 'postali' ),
            'quick-links-nav' => __( 'Footer Quick Links Navigation', 'postali' ),
            'garner-nav' => __( 'Garner Navigation', 'postali' ),
            'angier-nav' => __( 'Angier Navigation', 'postali' ),
            'cary-nav' => __( 'Cary Navigation', 'postali' ),
            'smithfield-nav' => __( 'Smithfield Navigation', 'postali' ),
        )
    );
}
add_action( 'init', 'crest_child_register_nav_menus' );

add_action('wp_enqueue_scripts', 'postali_child_scripts');
function postali_child_scripts() {

    wp_enqueue_style( 'child-stylesheet', get_stylesheet_directory_uri() . '/style.css' ); // Enqueue Child theme style sheet (theme info)
    wp_enqueue_style( 'child-styles', get_stylesheet_directory_uri() . '/assets/css/styles.css'); // Enqueue Child theme styles.css
    wp_enqueue_style( 'block-styles', get_stylesheet_directory_uri() . '/blocks/assets/css/styles.css'); // Enqueue Child theme styles.css
    
    // Compiled .js using Grunt.js
    wp_register_script('child-custom-scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.min.js',array('jquery'), null, true); 
    wp_enqueue_script('child-custom-scripts');
    
    //slick
    wp_register_script('slick-scripts', get_stylesheet_directory_uri() . '/assets/js/slick.min.js',array('jquery'), null, true); 
    wp_enqueue_script('slick-scripts');
    wp_register_script('child-slick-custom', get_stylesheet_directory_uri() . '/assets/js/src/slick-custom.js',array('jquery'), null, true); 
    wp_enqueue_script('child-slick-custom');

    //Results archive scripts
    wp_register_script('results-scripts', get_stylesheet_directory_uri() . '/assets/js/src/results-scripts.js',array('jquery'), null, true);

    //Register block scripts
    wp_register_script('video-block-scripts', get_stylesheet_directory_uri() . '/blocks/assets/js/video-block.min.js',array('jquery'), null, true);
    wp_register_script('tab-block-scripts', get_stylesheet_directory_uri() . '/blocks/assets/js/tab-block.min.js',array('jquery'), null, true);
    wp_register_script('countup-custom', get_stylesheet_directory_uri() . '/blocks/assets/js/countup-custom.min.js',array('jquery'), null, true);
    wp_register_script('countup-scripts', get_stylesheet_directory_uri() . '/assets/js/jquery.countup.min.js',array('jquery'), null, true); 
    wp_register_script('waypoints-scripts', get_stylesheet_directory_uri() . '/assets/js/jquery.waypoints.min.js',array('jquery'), null, true); 

    if( is_post_type_archive( ['reviews', 'videos'] ) ) {
        wp_enqueue_script('video-block-scripts');
        wp_enqueue_script('results-scripts');
    }
    
}



// Enqueue custom scripts for specific blocks
function enqueue_custom_block_assets() {
    if ( has_block( 'acf/video-block' ) || has_block( 'acf/large-video-embed' ) ) {
          wp_enqueue_script('video-block-scripts');
    }
    if ( has_block( 'acf/tabs' ) ) {
          wp_enqueue_script('tab-block-scripts');
    }
    if ( has_block( 'acf/counter-group' ) ) {
          wp_enqueue_script('waypoints-scripts');
          wp_enqueue_script('countup-scripts');
          wp_enqueue_script('countup-custom');
    }
}
add_action( 'enqueue_block_assets', 'enqueue_custom_block_assets' );

add_filter( 'block_categories_all' , function( $categories ) {
    // Adding a new category.
	$categories[] = array(
		'slug'  => 'postali-blocks',
		'title' => 'Postali Crest Blocks'
	);
	return $categories;
} );


/* ACF Register Blocks */
function postali_crest_register_acf_blocks() {
    register_block_type( __DIR__ . '/blocks/accordions' );
    register_block_type( __DIR__ . '/blocks/attorneys-block' );
    register_block_type( __DIR__ . '/blocks/awards-block' );
    register_block_type( __DIR__ . '/blocks/banner-block' );
    register_block_type( __DIR__ . '/blocks/columns' );
    register_block_type( __DIR__ . '/blocks/contact-block' );
    register_block_type( __DIR__ . '/blocks/cta-block' );
    register_block_type( __DIR__ . '/blocks/link-block' );
    register_block_type( __DIR__ . '/blocks/map-block' );
    register_block_type( __DIR__ . '/blocks/related-resources' );
    register_block_type( __DIR__ . '/blocks/results-scroller' );
    register_block_type( __DIR__ . '/blocks/slider-process' );
    register_block_type( __DIR__ . '/blocks/tabs' );
    register_block_type( __DIR__ . '/blocks/testimonials-block' );
    register_block_type( __DIR__ . '/blocks/video-block' );
    register_block_type( __DIR__ . '/blocks/resource-cards' );
    register_block_type( __DIR__ . '/blocks/theme-button' );
    register_block_type( __DIR__ . '/blocks/single-testimonial' );
    register_block_type( __DIR__ . '/blocks/ordered-list-block' );
    register_block_type( __DIR__ . '/blocks/counter-block' );
    register_block_type( __DIR__ . '/blocks/large-video-block' );
    register_block_type( __DIR__ . '/blocks/randomized-single-testimonial' );
    register_block_type( __DIR__ . '/blocks/steps-columns' );
}
add_action( 'init', 'postali_crest_register_acf_blocks' );

// Widget Logic Conditionals (ancestor)
function is_tree( $pid ) {
    global $post;

        if ( is_page($pid) )

        return true;

    $anc = get_post_ancestors( $post->ID );

        foreach ( $anc as $ancestor ) {

        if( is_page() && $ancestor == $pid ) {
            return true;
        }
    }
    return false;
}


// Exclude pages on PPC templates from Yoast XML sitemap
function exclude_posts_from_xml_sitemaps() {
	$templates = array(
		'page-ppc-landing.php',
		'page-ppc-landing-options.php'
	);

	$ppc_ids = array();
	foreach ( $templates as $template ) {
		//get_page_id_by_template($template);
		$args = [
			'post_type'  => 'page',
			'fields'     => 'ids',
			'nopaging'   => true,
			'meta_key'   => '_wp_page_template',
			'meta_value' => $template
		];

		$ppc_pages = get_posts( $args );
		$ppc_ids = array_merge($ppc_ids, $ppc_pages);
	}
	return ($ppc_ids);
}

add_filter( 'wpseo_exclude_from_sitemap_by_post_ids', 'exclude_posts_from_xml_sitemaps' );


add_action('pre_get_posts', function($query) {
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('videos')) {
        $query->set('posts_per_page', 9);
    }
});


function retrieve_latest_gform_submissions() {
	$site_url = get_site_url();
	$search_criteria = [
		'status' => 'active'
	];
	$form_ids = 1; //search all forms
	$sorting = [
		'key' => 'date_created',
		'direction' => 'DESC'
	];
	$paging = [
		'offset' => 0,
		'page_size' => 5
	];
	
	$submissions = GFAPI::get_entries($form_ids, null, $sorting, $paging);
	$start_date = date('Y-m-d H:i:s', strtotime('-5 day'));
	$end_date = date('Y-m-d H:i:s');
	$entry_in_last_5_days = false;
	
	foreach ($submissions as $submission) {
		if( $submission['date_created'] > $start_date  && $submission['date_created'] <= $end_date ) {
			$entry_in_last_5_days = true;
		} 
	}

	if( !$entry_in_last_5_days ) {
		wp_mail('webdev@postali.com', 'Submission Status', "No submissions in last 5 days on $site_url");
	}

}
add_action('check_form_entries', 'retrieve_latest_gform_submissions');

/**
 * Disable Theme/Plugin File Editors in WP Admin
 * - Hides the submenu items
 * - Blocks direct access to editor screens
 */
function postali_disable_file_editors_menu() {
    // Remove Theme File Editor from Appearance menu
    remove_submenu_page( 'themes.php', 'theme-editor.php' );
    // Optional: also remove Plugin File Editor from Plugins menu
    remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
}
add_action( 'admin_menu', 'postali_disable_file_editors_menu', 999 );

// Block direct access to the editors even if someone knows the URL
function postali_block_file_editors_direct_access() {
    wp_die( __( 'File editing through the WordPress admin is disabled.' ), 403 );
}
add_action( 'load-theme-editor.php', 'postali_block_file_editors_direct_access' );
add_action( 'load-plugin-editor.php', 'postali_block_file_editors_direct_access' );

/**
 * Disable the Additional CSS panel in the Customizer.
 * Primary method: remove the custom_css component early in load.
 */
function postali_disable_customizer_additional_css_component( $components ) {
    $key = array_search( 'custom_css', $components, true );
    if ( false !== $key ) {
        unset( $components[ $key ] );
    }
    return $components;
}
add_filter( 'customize_loaded_components', 'postali_disable_customizer_additional_css_component' );

/**
 * Fallback: remove the Additional CSS section if it's present.
 */
function postali_remove_customizer_additional_css_section( $wp_customize ) {
    if ( method_exists( $wp_customize, 'remove_section' ) ) {
        $wp_customize->remove_section( 'custom_css' );
    }
}
add_action( 'customize_register', 'postali_remove_customizer_additional_css_section', 20 );