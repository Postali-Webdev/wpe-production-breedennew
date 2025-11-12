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
						$homepage_id = trim(get_option('page_on_front'));
						$locations = get_field('locations', 'options');
						$show_default_menu = true;
						foreach ( $locations as $location ) {
							$location_page = $location['location_page'];
							$location_name = strtolower($location['name']);
							$location_id = $location_page->ID;
							
							if( is_tree( $location_id ) ) {
								
								$args = array(
									'container' => false,
									'theme_location' => "$location_name-nav"
								);
								wp_nav_menu( $args );		
								$show_default_menu = false;
								break;
							} 	
						}

						if( $show_default_menu ) {
							$args = array(
								'container' => false,
								'theme_location' => "header-nav"
							);
							wp_nav_menu( $args );
						}
                    ?>	
                    </nav>
					<div id="header-top_mobile">
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