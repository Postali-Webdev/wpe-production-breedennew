<?php get_header(); 

$gbp_url = get_field('global_gbp_url', 'options');	

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
                <h1><?php the_field('reviews_title', 'options') ?></h1>
                <?php the_field('reviews_banner_copy', 'options'); ?>
                <div class="cta-wrapper">
                    <p><?php the_field('reviews_phone_cta_copy', 'options'); ?></p>
                    <a href="tel:<?php the_field('global_phone_number', 'options'); ?>" class="btn">
                        <?php the_field('global_phone_number', 'options'); ?>
                    </a>
                </div>
            </div>
        </div>
        <div class="column-50 block img-block">
            <?php $desktop_img = get_field('reviews_banner_image', 'options'); if( $desktop_img ) {
                echo wp_get_attachment_image( $desktop_img['ID'], 'full', false, array( 'class' => 'banner-img' ) );
            } ?>
        </div>
    </div>
</div>

<div class="container">
    <div class="columns">
        <div class="column-full block">
            <div class="reviews-toggle">
                <div id="video-button" data-review="video-reviews" class="active-review"><p>Video Testimonials</p></div>
                <div id="written-button" data-review="written-reviews"><p>Written Testimonials</p></div>
            </div>
            <?php if( have_posts() ) : 
                
                $video_args = [
                    'post_type' => 'reviews',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'order' => 'DESC',
                    'meta_query' => [
                        [
                            'key' => 'video_testimonial',
                            'value' => '1',
                            'compare' => '=='
                        ]
                    ]
                ];

                $written_args = [
                    'post_type' => 'reviews',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'order' => 'DESC',
                    'meta_query' => [
                        [
                            'key' => 'video_testimonial',
                            'value' => '0',
                            'compare' => '=='
                        ]
                    ]
                ];

                $video_query = new WP_Query( $video_args );
                $written_query = new WP_Query( $written_args );
                    
                ?>
                <div id="video-reviews" class="active-review">
                    <?php while( $video_query->have_posts() ) : $video_query->the_post(); 
                        $video_el = '';
                        $video_title = get_field('video_title');
                        $video_copy = get_field('video_copy');
                        $video_thumbnail = get_field('video_thumbnail');
                        $video_embed_url = get_field('video_embed_url');

                        if( $video_embed_url ) {
                            $video_el .= "<div class='video-block'>";
                            $video_el .= "<div class='video-wrapper'>";
                            if( $video_thumbnail ) {
                                //$video_el .= "<div class='video-block-thumbnail'>". wp_get_attachment_image( $video_thumbnail['ID'], 'full' ). "</div>";
                            }
                            if( $video_embed_url ) {
                                $video_el .= "<div class='responsive-iframe'><iframe class='video-embed' src='$video_embed_url' title='$video_title' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' referrerpolicy='strict-origin-when-cross-origin' allowfullscreen></iframe></div>";
                            }
                            $video_el .= "</div>";
                            if( $video_copy || $video_embed_url ) {
                                $video_el .= "<div class='video-block-content'><p><strong>$video_title</strong></p>";
                                if( $video_copy ) {
                                    $video_el .= "<div class='video-block-copy'>$video_copy</div>";
                                }
                                if( $video_embed_url ) {
                                    $video_el .= "<div class='video-block-link'><p>Watch Video</p></div>";
                                }
                                $video_el .= "</div>";        
                            }
                            $video_el .= "</div>";
                            echo $video_el;
                        }
                    ?>
                        
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
                <div id="written-reviews" class="testimonials-block ">
                    <?php while( $written_query->have_posts() ) : $written_query->the_post();
                        $review_source = get_field('review_source');
                        switch( $review_source ) {
                            case 'google':
                                $review_badge = "/wp-content/uploads/2025/04/google-review-logo.png";
                                break;
                            case 'avvo':
                                $review_badge = "/wp-content/uploads/2025/04/avvo-logo.png";
                                break;
                            default: 
                                $review_badge = "/wp-content/uploads/2025/04/google-review-logo.png";
                                break;
                        }
                    ?>
                    <div class="testimonial">
                        <div class="rating-row">
                            <p class="average"><?php the_field('reviews_average_rating', 'options'); ?></p>
                            <div class="stars"></div>
                        </div>
                        <div class="copy"><p><?php echo substr(get_the_content($post->ID), 0, 300); ?> 
                        <?php if( strlen(get_the_content($post->ID)) > 300) : ?>
                            [...]
                        <?php endif; ?>
                    
                    </p></div>
                        <div class="author-row">
                            <p class="author"><?php echo get_the_title($post->ID); ?></p>
                            <a href="<?php echo $gbp_url; ?>" target="_blank">
                                <img src="<?php echo esc_url($review_badge); ?>" alt="<?php echo $review_source; ?> review of Breeden Law Firm" />
                            </a>
                        </div>
                    </div>
                    <?php endwhile; wp_reset_postdata();?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_template_part('block', 'book-promo'); ?>

<?php get_footer(); ?>