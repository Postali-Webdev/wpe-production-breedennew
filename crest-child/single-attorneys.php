<?php
/**
 * Single Attorney Template
 * @package Postali Crest Controller Theme
 * @author Postali LLC
 */
get_header();

?>

<div id="breadcrumb-banner">
    <div class="columns">
        <div class="column-50 block content-block">
            <div class="container">
                <?php 
                    if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>

<section>
    <div class="container">
        <div class="columns">
            <div class="column-50 block">
                <h1>About <?php the_field('first_name'); ?> <?php the_field('last_name'); ?></h1>
                <hr class="wp-block-separator">
                <?php $awards = get_field('awards') ? get_field('awards') : get_field('awards', 'options'); ?>
                <?php if( $awards ) : ?>
                <div class="awards-block">
                    <div class="columns">
                        <div id="awards" class="slide">
                            <?php $n=1 ?>
                            
                            <?php foreach( $awards as $award ) : ?>  
                                <div class="award" id="award_<?php echo $n; ?>">
                                <?php 
                                $image = $award['award_image'];
                                if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                                </div>
                                <?php $n++; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="column-50">
                <p class="subtitle"><?php the_field('description_intro'); ?></p>
                <?php the_field('upper_description'); ?>
                <?php echo get_the_post_thumbnail(); ?>
                <div class="spacer-30"></div>
                <?php the_field('lower_description'); ?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'global-prefooter-cta'); ?>





<?php get_footer(); ?>