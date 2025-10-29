<?php
/**
 * Template Name: Practice Area Parent/Child Page
 * @package Postali Crest Controller Theme
 * @author Postali LLC
 */

get_header();

$block_content = do_blocks( '
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
<!-- wp:post-content /-->
</div>
<!-- /wp:group -->'
);
?>

<div id="banner-50">
    <div class="columns">
        <div class="column-50 block content-block">
            <div class="container">
                <?php 
                    if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
                    }
                ?>
                <h1><?php the_field('banner_title') ?></h1>
                <?php the_field('banner_copy'); ?>
                <div class="cta-wrapper">
                    <p><?php the_field('phone_number_cta'); ?></p>
                    <?php
                    $locations = get_field('locations', 'options');
                    $show_default_phone_number = true;
                    foreach ( $locations as $location ) {
                        $location_page = $location['location_page'];
                        $location_id = $location_page->ID;
                        if( is_tree( $location_id ) ) {
                            $phone_number = $location['local_phone_number'];
                            $show_default_phone_number = false;
                            break;
                        } 	
                    }
                    if( $show_default_phone_number ) {
                        $phone_number = get_field('global_phone_number', 'options');
                    }
                    ?>	
                    <a class="btn" href="tel:<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a>
                </div>
            </div>
        </div>
        <div class="column-50 block img-block">
            <?php $desktop_img = wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, [ 'class' => 'banner-img ignore-lazy']); if( $desktop_img ) {
                echo $desktop_img;
            } ?>
        </div>
    </div>
</div>


<div class="columns">
    <div class="column-full block">
        <?php echo $block_content; ?>
    </div>
</div>





<?php get_footer(); ?>