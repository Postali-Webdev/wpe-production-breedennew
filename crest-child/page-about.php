<?php
/**
 * Template Name: About Page
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

<div class="container container-wide">
    <div class="columns" id="banner">
        <div class="column-50 block">
            <?php 
                if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
                }
            ?>
            <h1><?php the_field('banner_title') ?></h1>
            <p class="subtitle banner-subtitle"><?php the_field('banner_sub_title') ?></p>
            <div class="banner-copy">
                <?php the_field('banner_copy'); ?>
            </div>
            <div class="cta-wrapper">
                <p><?php the_field('banner_phone_number_cta'); ?></p>
                <?php 
                if( get_field('global_phone_number', 'options') ) :
                    $phone_number = get_field('global_phone_number', 'options');
                ?>
                    <a class="btn" href="tel:<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a>
                    <div class="spacer-30"></div>
                <?php endif; ?>
            </div>
        </div>
        <div class="column-50">
            <div class="desktop-banner-img">
                <?php if( get_field('desktop_banner_image') ) {
                    $desktop_img = get_field('desktop_banner_image');
                    echo wp_get_attachment_image( $desktop_img['ID'], 'full');
                } ?>
            </div>
        </div>
    </div>
</div>


<div class="columns">
    <div class="column-full block">
        <?php echo $block_content; ?>
    </div>
</div>

<?php get_footer(); ?>