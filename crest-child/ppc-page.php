<?php
/**
 * Template Name: PPC Landing
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
                <h1><?php the_field('banner_title') ?></h1>
                <p class="large-subtitle"><?php the_field('ppc_subtitle') ?></p>
                <?php if( get_field('ppc_banner_copy') ) : ?>
                    <p class="desktop-copy">
                        <?php the_field('ppc_banner_copy'); ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
        <div class="column-50 block img-block <?php echo $enable_banner_form ? 'banner-form' : ''; ?>">
            
            <div class="copy-wrap">
                <p class="subtitle"><?php the_field('banner_subtitle'); ?></p>
                <div class="large-copy">
                    <?php the_field('banner_copy'); ?>
                </div>
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
            <?php
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

<div class="ppc-footer">
    <div class="row-1">
        <a href="/" class="custom-logo-link" rel="home">
            <img fetchpriority="high" src="/wp-content/uploads/2025/03/Breeden-logo.svg" class="custom-logo" alt="Breeden Law Office Logo" decoding="async">
        </a>
        <a href="tel:<?php echo get_field('global_phone_number', 'options') ;?>" class="btn"><?php echo get_field('global_phone_number', 'options') ;?></a>
    </div>
    <div class="row-2">
        <?php echo do_shortcode('[gravityform id="4" title="false"]'); ?>
    </div>
</div>

<?php get_footer(); ?>