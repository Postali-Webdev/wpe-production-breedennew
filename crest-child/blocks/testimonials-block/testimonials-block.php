<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */

    $testimonials_block_layout = get_field('testimonials_block_layout');
    $testimonial = get_field('single_testimonial');
    $testimonials = get_field('testimonials');
    $google_rating_logo = get_field('google_rating_logo');
    $google_rating_average = get_field('google_rating_average');
    $google_rating_total_reviews = get_field('google_rating_total_reviews');

    $cta_block_headline = get_field('cta_block_headline');
    $cta_block_copy = get_field('cta_block_copy');
    $cta_block_button_cta = get_field('cta_block_button_cta');
    $cta_block_button_link_type = get_field('cta_block_button_link_type');
    $cta_block_button_link_phone = get_field('cta_block_button_link_phone');
    $cta_block_button_link_page = get_field('cta_block_button_link_page');
    $more_testimonials_link = get_field('more_testimonials_button');

    $locations = get_field('locations', 'options');
    $show_default_gbp = true;
    foreach ( $locations as $location ) {
        $location_page = $location['location_page'];
        $location_name = strtolower($location['name']);
        $location_id = $location_page->ID;
        
        if( is_tree( $location_id ) ) {
            $gbp_url = $location['directions_url'];	
            $show_default_gbp = false;
            break;
        } 	
    }

    if( $show_default_gbp ) {
        $gbp_url = get_field('global_gbp_url', 'options');	
    }
?>

<?php if ($testimonials_block_layout == 'three') { ?>

<section class="testimonials-block" id="testimonials-three">
    <div class="columns">
        <div class="column-full">
        <?php if( have_rows('testimonials') ): ?>
            <div class="testimonial-slide-wrapper">
            <?php while( have_rows('testimonials') ): the_row(); ?>
                <?php $post_object = get_sub_field('testimonial'); ?>
                <?php if( $post_object ): ?>
                    <?php // override $post
                    $post = $post_object;
                    setup_postdata( $post );
                    ?>
                    <div class="testimonial column-33">
                        <div class="rating-row">
                            <p class="average"><?php echo $google_rating_average; ?></p>
                            <div class="stars"></div>
                        </div>
                        <div class="copy"><?php the_content($post->ID); ?></div>
                        <div class="author-row">
                            <p class="author"><?php echo get_the_title($post->ID); ?></p>
                            <?php 
                            if( !empty( $google_rating_logo ) ): ?>
                                
                                    <a href="<?php echo $gbp_url; ?>" target="_blank">
                                
                                    <img src="<?php echo esc_url($google_rating_logo['url']); ?>" alt="<?php echo esc_attr($google_rating_logo['alt']); ?>" />
                                
                                    </a>
                                
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                <?php endif; ?>
            <?php endwhile; ?>
            </div>
        <?php endif; ?>
        </div>
        <div class="spacer-30"></div>
        <div class="column-full centered">
            <a href="<?php echo $more_testimonials_link['url']; ?>" class="btn"><?php echo $more_testimonials_link['title']; ?> </a><span class="icon-crest-arrow-right"></span>
        </div>
    </div>
</section>

<?php } ?>

<?php if ($testimonials_block_layout == 'one') { ?>

<section class="testimonials-block" id="testimonials-one">
    <div class="columns">
        <div class="column-66">
            <?php
            $featured_post = get_field('single_testimonial');
            if( $featured_post ): ?>
            <div class="rating-details-block">
                <div class="logo-block">
                <?php 
                if( !empty( $google_rating_logo ) ): ?>
                    <?php if( $gbp_url ) : ?>
                        <a href="<?php echo $gbp_url; ?>" target="_blank">
                    <?php endif; ?>
                    <img src="<?php echo esc_url($google_rating_logo['url']); ?>" alt="<?php echo esc_attr($google_rating_logo['alt']); ?>" />
                    <?php if( $gbp_url ) : ?>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
                <div class="rating-row">
                    <p class="average"><?php echo $google_rating_average; ?></p>
                    <div class="stars"></div>
                </div>
                
                </div>
                <div class="name-date">
                    <?php
                    $date = $featured_post->post_date;
                    $date = date("F Y",strtotime($date));
                    ?>
                    <p><?php echo esc_html( $featured_post->post_title ); ?> | <?php echo esc_html( $date ); ?></p>
                </div>
            </div>
            <p><?php echo esc_html( $featured_post->post_content ); ?></p>
            <a href="<?php echo $more_testimonials_link['url']; ?>" class="btn"><?php echo $more_testimonials_link['title']; ?> </a><span class="icon-crest-arrow-right"></span>
            <?php endif; ?>
        </div>

        <div class="column-33 cta-block">
            <p class="lrg"><?php echo $cta_block_headline; ?></p>
            <p><?php echo $cta_block_copy; ?></p>
            <?php if ($cta_block_button_link_type == 'phone') { ?>
            <a href="tel:<?php echo $cta_block_button_link_phone; ?>" class="btn"><?php echo $cta_block_button_cta; ?></a>
            <?php } elseif ($cta_block_button_link_type == 'page') { ?>
            <a href="<?php echo $cta_block_button_link_page; ?>" class="btn"><?php echo $cta_block_button_cta; ?></a>
            <?php } ?>
        </div>
    </div>
</section>

<?php } ?>