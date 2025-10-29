<?php
/**
 * Theme functions.
 *
 * @package Postali Parent
 * @author Postali LLC
 */


// Adding Custom Post Types
//require_once dirname( __FILE__ ) . '/includes/case-results-cpt.php'; // Custom Post Type Case Results
require_once dirname( __FILE__ ) . '/includes/testimonials-cpt.php'; // Custom Post Type Testimonials

add_theme_support( 'post-thumbnails' );


// Enqueue scripts
function postali_parent_scripts() {
    // Adding parent styles
    wp_enqueue_style( 'parent-stylesheet', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'parent-styles', get_template_directory_uri() . '/assets/css/styles.css');

    // Adding Parent JS
    // wp_register_script('parent-scripts', get_template_directory_uri() . '/assets/js/scripts.min.js',array('jquery'), null, true); 
    // wp_enqueue_script('parent-scripts');

    // Adding icomonn
    wp_register_style( 'icomoon', 'https://d1azc1qln24ryf.cloudfront.net/152819/PostaliTier1/style-cf.css?l7x1b4', array() );
    wp_enqueue_style('icomoon');

    // Add slick library
    // wp_register_script('slick-scripts', get_template_directory_uri() . '/assets/js/slick.min.js',array('jquery'), null, true); 
    // wp_enqueue_script('slick-scripts');
    // wp_register_script('slick-custom', get_template_directory_uri() . '/assets/js/slick-custom.min.js',array('jquery'), null, true); 
    // wp_enqueue_script('slick-custom');
    wp_enqueue_style( 'slick-styles', get_template_directory_uri() . '/assets/css/slick.css'); // Enqueue Parent theme styles.css   
}
add_action('wp_enqueue_scripts', 'postali_parent_scripts');


// Register Site Navigations
function postali_parent_register_nav_menus() {
    register_nav_menus(
        array(
            'header-nav' => __( 'Header Navigation', 'postali' )
        )
    );
}
add_action( 'init', 'postali_parent_register_nav_menus' );


// Add required options pages
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Global Schema',
        'menu_title'    => 'Global Schema',
        'menu_slug'     => 'global-schema',
        'capability'    => 'edit_posts',
        'icon_url'      => 'dashicons-networking', // Add this line and replace the second inverted commas with class of the icon you like
        'redirect'      => false
    ));
    
    acf_add_options_page(array(
        'page_title'    => 'Github Settings',
        'menu_title'    => 'Github Settings',
        'menu_slug'     => 'github-settings',
        'capability'    => 'edit_posts',
        'icon_url'      => 'dashicons-rest-api',
        'redirect'      => false
    ));
}

// Add required ACF fields for options pages
function parent_crest_acf_options_fields() {
    acf_add_local_field_group(array(
        'key' => 'group_5a9b9b0b9e9b6',
        'title' => 'Global Schema',
        'fields' => array (
            array (
                'key' => 'field_5a9b9b0b9e9b7',
                'label' => 'Global Schema',
                'name' => 'global_schema',
                'type' => 'textarea',
                'instructions' => '<strong>Do not</strong> include script tags. They will be added automatically.'
            )
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'global-schema'
                ),
            ),
        ),
    ));

    acf_add_local_field_group(array(
        'key' => 'group_15a9b9b0b9e9b6',
        'title' => 'Github Settings',
        'fields' => array (
            array (
                'key' => 'field_15a9b9b0b9e9b7',
                'label' => 'Github Token',
                'name' => 'github_token',
                'type' => 'password',
            )
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'github-settings'
                ),
            ),
        ),
    ));
}
add_action('acf/init', 'parent_crest_acf_options_fields');

// Add ability to add SVG to Wordpress Media Library
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


// Add SVG to allowed file uploads
function add_file_types_to_uploads($file_types){

    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );

    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');


// Enable upload for webp image files
function webp_upload_mimes($existing_mimes) {
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}
add_filter('mime_types', 'webp_upload_mimes');


// Enable preview / thumbnail for webp image files.
function webp_is_displayable($result, $path) {
    if ($result === false) {
        $displayable_image_types = array( IMAGETYPE_WEBP );
        $info = @getimagesize( $path );
        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }
    return $result;
}
add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);


// Display Current Year as shortcode - [year]
function year_shortcode () {
    $year = date_i18n ('Y');
    return $year;
}
add_shortcode ('year', 'year_shortcode');


// WP Backend Menu area taller
add_action('admin_head', 'taller_menus');
function taller_menus() {
    echo '<style>
        .posttypediv div.tabs-panel {
            max-height:500px !important;
        }
    </style>';
}


// Add Search Bar to Top Nav
function mainmenu_navsearch($items, $args) {
    if ($args->theme_location == 'header-nav' || $args->theme_location == 'garner-nav' || $args->theme_location == 'angier-nav' || $args->theme_location == 'cary-nav' || $args->theme_location == 'smithfield-nav') {
        ob_start();
        ?>
        <li class="menu-item menu-item-search search-holder">
            <form class="navbar-form-search" role="search" method="get" action="/">
                <div class="search-form-container hdn" id="search-input-container">
                    <div class="search-input-group">
                        <div class="form-group">
                            <input type="text" name="s" placeholder="Search for..." id="search-input-5cab7fd94d469" value="" class="form-control">
                            <label for="s">search for... </label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-search" id="search-button"><span class="icon-search-icon" aria-hidden="true"></span></button>
            </form>	
        </li>

        <?php
        $new_items = ob_get_clean();

        $items .= $new_items;
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'mainmenu_navsearch', 10, 2);


// Add template column to page list in wp-admin
function page_column_views( $defaults ) {
    $defaults['page-layout'] = __('Template');
    return $defaults;
}
add_filter( 'manage_pages_columns', 'page_column_views' );

function page_custom_column_views( $column_name, $id ) {
    if ( $column_name === 'page-layout' ) {
        $set_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
        if ( $set_template == 'default' ) {
            echo 'Default';
        }
        $templates = get_page_templates();
        ksort( $templates );
        foreach ( array_keys( $templates ) as $template ) :
            if ( $set_template == $templates[$template] ) echo $template;
        endforeach;
    }
}
add_action( 'manage_pages_custom_column', 'page_custom_column_views', 5, 2 );


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


// Automatic theme updates from the GitHub repository
function automatic_GitHub_updates($data) {
    // Theme information
    //$theme   = basename(get_template_directory()); // Folder name of the current theme
    $theme = 'crest-controller-theme-main';
    $current = wp_get_theme()->get('Version'); // Get the version of the current theme
    // GitHub information	    
    $user = 'Postali-Webdev'; // The GitHub username hosting the repository
    $repo = 'Crest-Controller-Theme'; // Repository name as it appears in the URL
    $token = get_field('github_token', 'option'); //https://github.com/settings/personal-access-tokens/new
    $file = @json_decode(@file_get_contents('https://api.github.com/repos/'.$user.'/'.$repo.'/releases/latest', false,
            stream_context_create(['http' => ['header' => "User-Agent: ".$user."\r\nAuthorization: token $token\r\n"]])
        ));

    if($file) {
        $zip_source = $file->zipball_url;
        $update = filter_var($file->tag_name, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        // Only return a response if the new version number is higher than the current version
        if($update > $current) {
            $data->response[$theme] = array(
                'theme'       =>  'crest-controller-theme-main',
                // Strip the version number of any non-alpha characters (excluding the period)
                // This way you can still use tags like v1.1 or ver1.1 if desired
                'new_version' => $update,
                'url'         => 'https://github.com/'.$user.'/'.$repo,
                'package'     => $zip_source
            );
        }
    }
    return $data;

    echo $data;    
}
add_filter('pre_set_site_transient_update_themes', 'automatic_GitHub_updates', 100, 1);



function rename_updated_theme($true, $hook_extra, $result) {
    // Check if the updated theme is the one we want to rename
    if ($hook_extra['theme'] === 'crest-controller-theme-main') {
        // Get the path to the updated theme
        $theme_dir = $result['destination'];
        // Rename the theme directory
        $new_theme_dir = WP_CONTENT_DIR . '/themes/crest-controller-theme-main';
        if (rename($theme_dir, $new_theme_dir)) {
            // Rename successful
        } else {
            // Rename failed, log an error
            error_log("Failed to rename theme directory to $new_theme_dir");
        }   
    }
}
add_action('upgrader_post_install', 'rename_updated_theme', 10, 3);



add_filter('http_request_args', function($parsed_args, $url) {
    $token = get_field('github_token', 'option'); //https://github.com/settings/personal-access-tokens/new
    $user = 'Postali-Webdev'; // The GitHub username hosting the repository
    $repo = 'Crest-Controller-Theme'; // Repository name as it appears in the URL

    if (str_contains($url, "$user/$repo")) {
        $parsed_args['headers'] = ['Authorization'=> 'token '.$token];
    }
    return $parsed_args;
}, 10, 2);