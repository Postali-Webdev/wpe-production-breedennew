<?php
/**
 * Theme header.
 *
 * @package Postali Crest Controller Theme
 * @author Postali LLC
**/
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<link rel="preload" href="/wp-content/themes/crest-child/assets/fonts/redhatdisplay/RedHatDisplay-Regular.woff2" as="font" type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="/wp-content/themes/crest-child/assets/fonts/redhatdisplay/RedHatDisplay-Italic.woff2" as="font" type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="/wp-content/themes/crest-child/assets/fonts/redhatdisplay/RedHatDisplay-Light.woff2" as="font" type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="/wp-content/themes/crest-child/assets/fonts/redhatdisplay/RedHatDisplay-LightItalic.woff2" as="font" type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="/wp-content/themes/crest-child/assets/fonts/redhatdisplay/RedHatDisplay-Medium.woff2" as="font" type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="/wp-content/themes/crest-child/assets/fonts/redhatdisplay/RedHatDisplay-MediumItalic.woff2" as="font" type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="/wp-content/themes/crest-child/assets/fonts/redhatdisplay/RedHatDisplay-Bold.woff2" as="font" type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="/wp-content/themes/crest-child/assets/fonts/redhatdisplay/RedHatDisplay-BoldItalic.woff2" as="font" type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="/wp-content/themes/crest-child/assets/fonts/redhatdisplay/RedHatDisplay-Black.woff2" as="font" type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="/wp-content/themes/crest-child/assets/fonts/redhatdisplay/RedHatDisplay-BlackItalic.woff2" as="font" type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="/wp-content/themes/crest-child/assets/fonts/icomoon/icomoon.woff2" as="font" type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="/wp-content/themes/crest-child/assets/fonts/ptserif/PTSerif-Bold.woff2" as="font" type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="/wp-content/themes/crest-child/assets/fonts/ptserif/PTSerif-BoldItalic.woff2" as="font" type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="/wp-content/themes/crest-child/assets/fonts/ptserif/PTSerif-Italic.woff2" as="font" type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="/wp-content/themes/crest-child/assets/fonts/ptserif/PTSerif-Regular.woff2" as="font" type="font/woff2" crossorigin="anonymous">



<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5XS8ZP');</script>
<!-- End Google Tag Manager -->


<!-- Add JSON Schema here -->
<?php 
$locations = get_field('locations', 'options');
$default_schema = true;
$location_schema = "";
foreach ( $locations as $location ) {
	$location_page = $location['location_page'];
	$location_id = $location_page->ID;
	if( is_tree( $location_id ) ) {
		$location_schema = $location['location_schema'];
		$default_schema = false;
		break;
	} 	
}
if( $default_schema ) {
	$location_schema = get_field('global_schema', 'options');
}

// Global Schema
if ( !empty($location_schema) ) :
    echo '<script type="application/ld+json">' . strip_tags($location_schema) . '</script>';
endif;

// Global Schema fallback
if ( empty($location_schema) && !$default_schema ) :
    echo '<script type="application/ld+json">' . strip_tags(get_field('global_schema', 'options')) . '</script>';
endif;

// Single Page Schema
$single_schema = get_field('single_schema');
if ( !empty($single_schema) ) :
    echo '<script type="application/ld+json">' . strip_tags($single_schema) . '</script>';
endif; ?>

<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php wp_head(); ?>

<?php get_template_part('block','design'); ?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<?php get_template_part('block','font-select'); ?>

</head>

<a class="skip-link" href='#main-content'>Skip to Main Content</a>

<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5XS8ZP"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<header>
		<div id="header-top" class="container">
			<div id="header-top_left">
				<?php the_custom_logo(); ?>
			</div>
			
			<div id="header-top_right">
				<div id="header-top_right_menu">
                    <nav>
                    <?php 

                    $current_post_id = get_the_ID();
                    $current_post = get_post($current_post_id);

                    // Get the location menus repeater from options
                    $location_menus = get_field('location_menus', 'options');

                    $menu_to_display = 36; // Default fallback

                    // Helper function to check if a page is in a parent's tree
                    function is_page_in_parent_tree($page_id, $parent_id) {
                        // Check if current page IS the parent
                        if ($page_id == $parent_id) {
                            return true;
                        }
                        
                        // Check if current page is a child of the parent by walking up the hierarchy
                        $check_parent = wp_get_post_parent_id($page_id);
                        while ($check_parent != 0) {
                            if ($check_parent == $parent_id) {
                                return true;
                            }
                            $check_parent = wp_get_post_parent_id($check_parent);
                        }
                        
                        return false;
                    }

                    // If we have location menus, find the matching one
                    if ($location_menus) {
                        foreach ($location_menus as $location_menu_item) {
                            $parent_page = $location_menu_item['parent_page'];
                            
                            // Handle if parent_page is a post object
                            if (is_object($parent_page)) {
                                $parent_page = $parent_page->ID;
                            } elseif (is_array($parent_page)) {
                                $parent_page = $parent_page['ID'];
                            }
                            
                            // Check if current page is in this parent's tree
                            if (is_page_in_parent_tree($current_post_id, $parent_page)) {
                                $menu_to_display = $location_menu_item['location_menu'];
                                break;
                            }
                        }
                    }

                    $args = array(
                        'container' => false,
                        'menu' => $menu_to_display
                    );
                    wp_nav_menu( $args );

                    ?>

                    <?php echo $menu_to_display;?>

                    </nav>
					<div id="header-top_mobile" class="<?php echo $location_name_fixed; ?>">
						<div id="menu-icon" class="toggle-nav">
							<span class="line line-1"></span>
							<span class="line line-2"></span>
							<span class="line line-3"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header> 

    <span id="main-content"></span>