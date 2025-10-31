<?php
/**
 * Template Name: Front Page
 * @package Postali Crest Controller Theme
 * @author Postali LLC
 */

$desktop_img = get_field('desktop_banner_image');
$mobile_img = get_field('mobile_banner_image');
// Preload desktop banner image
if ($desktop_img && isset($desktop_img['url'])) {
    echo '<link rel="preload" as="image" href="' . esc_url($desktop_img['url']) . '">';
}



get_header();

$block_content = do_blocks( '
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
<!-- wp:post-content /-->
</div>
<!-- /wp:group -->'
);


$reverse_image = get_field('reverse_banner_image');
?>


<section id="front-page">

    
    <div class="columns" id="banner">
        <div class="container">
            <div class="column-50 block">
                <h1><?php the_field('banner_title') ?></h1>
                <p class="subtitle"><?php the_field('banner_sub_title') ?></p>
                <?php the_field('banner_copy'); ?>
                <div class="cta-wrapper">
                    <p><?php the_field('banner_phone_number_cta'); ?></p>
                    <?php 
                    if( get_field('global_phone_number', 'options') ) :
                        $phone_number = get_field('global_phone_number', 'options');
                    ?>
                        <a class="btn" href="tel:<?php echo $phone_number; ?>" aria-label="Call the Breeden Firm Today"><?php echo $phone_number; ?></a>
                    <?php endif; ?>
                </div>
                <?php $review_block = get_field('banner_reviews_block'); ?>
                <div class="reviews-box-outer banner-desktop-review">
                    <div class="reviews-box">
                        <div class="img-wrap">
                            <?php $review_logo = $review_block['review_logo']; echo wp_get_attachment_image( $review_logo['ID'], 'full'); ?>
                        </div>
                        <div class="vertical-spacer"></div>
                        <div class="rating-wrap">
                            <p class="rating"><?php echo $review_block['review_rating']; ?></p>
                            <div class="stars"></div>
                        </div>
                    </div>
                    <?php $reviews_link = $review_block['review_link'];
                    if( $reviews_link ) : ?>
                        <a class="reviews-link" href="<?php echo $reviews_link['url']; ?>" aria-label="Read reviews of our firm"><?php echo $reviews_link['title']; ?> <span class="icon-crest-arrow-right"></span></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="desktop-banner-img<?php if( $reverse_image ) { echo ' reverse'; } ?>">
            <?php if( get_field('desktop_banner_image') ) {
                echo wp_get_attachment_image( $desktop_img['ID'], 'full', '', array( 'class' => 'ignore-lazy' ) );
            } ?>
        </div>
        
        <div class="container mobile-review-container">
            <div class="column-full">
                <div class="reviews-box-outer banner-mobile-review">
                    <div class="reviews-box">
                        <div class="img-wrap">
                            <?php $review_logo = $review_block['review_logo']; echo wp_get_attachment_image( $review_logo['ID'], 'full'); ?>
                        </div>
                        <div class="vertical-spacer"></div>
                        <div class="rating-wrap">
                            <p class="rating"><?php echo $review_block['review_rating']; ?></p>
                            <div class="stars"></div>
                        </div>
                    </div>
                    <?php $reviews_link = $review_block['review_link'];
                    if( $reviews_link ) : ?>
                        <a class="reviews-link" href="<?php echo $reviews_link['url']; ?>" aria-label="Read reviews of our firm"><?php echo $reviews_link['title']; ?> <span class="icon-crest-arrow-right"></span></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>


    <div class="columns">
        <div class="column-full block">
            <?php echo $block_content; ?>
        </div>
    </div>
    
</section>




<?php get_footer(); ?>