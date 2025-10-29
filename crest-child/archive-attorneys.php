<?php get_header(); 


$args = [
    'post_type' => 'attorneys',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status' => 'publish'
];

$attorneys = new WP_Query($args);


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
                <h1><?php the_field('staff_title', 'options') ?></h1>
                <?php the_field('staff_banner_copy', 'options'); ?>
                <div class="cta-wrapper">
                    <p><?php the_field('staff_phone_cta_copy', 'options'); ?></p>
                    <a href="tel:<?php the_field('global_phone_number', 'options'); ?>" class="btn">
                        <?php the_field('global_phone_number', 'options'); ?>
                    </a>
                </div>
            </div>
        </div>
        <div class="column-50 block img-block">
            <?php $desktop_img = get_field('staff_banner_image', 'options'); if( $desktop_img ) {
                echo wp_get_attachment_image( $desktop_img['ID'], 'full', false, array( 'class' => 'banner-img' ) );
            } ?>
        </div>
    </div>
</div>

<div class="container">
    <div class="columns">
        <div class="column-full block">
            <?php if( $attorneys->have_posts() ) : ?>
                <section class="attorney-block" id="attorneys-nobio">
                    <div class="columns">
                        <div class="attorney-wrapper">
                        <?php while( $attorneys->have_posts() ): $attorneys->the_post(); ?>
                            <a class="attorney" href="<?php the_permalink(); ?>">
                                <div class="attorney-img">
                                    <div class="arrow"></div>
                                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                    <img src="<?php echo $image[0]; ?>" alt="" />
                                </div>
                                <div class="attorney-content">
                                    <h4><?php the_field('first_name', $post->ID);?> <?php the_field('last_name', $post->ID); ?></h4>
                                    <p><?php the_field('position', $post->ID); ?></p>
                                    <p class="see-bio"><span class="arrow-icon"></span><?php the_field('first_name', $post->ID); ?>'s Bio</p>
                                </div>
                            </a>
                        <?php endwhile; ?>
                        </div>
                    </div>
                </section>
            <?php endif; wp_reset_postdata(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>