<?php
/**
 * Template Name: Contact Block
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

$margin_bottom_0 = get_field('banner_remove_bottom_margin');
$enable_banner_form = get_field('enable_banner_form');
$banner_form = get_field('banner_form');
$featured_img = get_the_post_thumbnail();
?>

<div id="banner-50" class="<?php echo $featured_img ? 'has-banner-img ' : ''; echo $enable_banner_form ? 'banner-50-form' : '';  echo $margin_bottom_0 ? ' margin-bottom-0' : ''; ?>">
    <div class="columns">
        <?php if( $featured_img ) {
        echo "<div class='banner-img-wrap'>{$featured_img}</div>";
    } ?>
        <div class="column-50 block content-block">
            <div class="container">
                <?php 
                    if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
                    }
                ?>
                <h1><?php the_field('banner_title') ?></h1>
                <p class="subtitle"><?php the_field('banner_subtitle'); ?></p>
                <?php the_field('banner_copy'); ?>
                <div class="cta-wrapper">
                    <p><?php the_field('banner_cta_text'); ?></p>
                    <?php 
                    if( get_field('cta_button') ) :
                        $cta_button = get_field('cta_button');
                    ?>
                        <a class="btn" href="<?php echo $cta_button['url']; ?>"><?php echo $cta_button['title']; ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="column-50 block img-block <?php echo $enable_banner_form ? 'banner-form' : ''; ?>">
            <?php $desktop_img = get_the_post_thumbnail(); 
            if( $desktop_img ) {
                echo $desktop_img;
            } 
            
            if( $enable_banner_form ) {
                echo do_shortcode( $banner_form );
            }
            ?>
        </div>
    </div>
</div>


<div class="columns">
    <div class="column-full block">
        <?php echo $block_content; ?>
    </div>
</div>

<?php get_footer(); ?>