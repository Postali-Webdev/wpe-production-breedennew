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

<?php
if (get_field('staff_type') == 'attorney' ) { ?>


<section class="testimonials">
    <div class="container">
        <div class="columns">
            <div id="written-reviews" class="testimonials-block ">
            <?php
                // get the current attorney slug (from the single attorney post)
                $current_slug = get_post_field( 'post_name', get_the_ID() );

                $written_args = [
                    'post_type' => 'reviews',
                    'post_status' => 'publish',
                    'posts_per_page' => 3,
                    'order' => 'DESC',
                    'meta_query' => [
                        [
                            'key' => 'attorney',
                            'value' => get_the_ID(),
                            'compare' => '='
                        ]
                    ]
                ];

                $written_query = new WP_Query( $written_args );

                $reviews = $written_query->posts;

                if ( count($reviews) < 3 ) {
                    $remaining = 3 - count($reviews);
                    $empty_args = [
                        'post_type' => 'reviews',
                        'post_status' => 'publish',
                        'posts_per_page' => $remaining,
                        'order' => 'DESC',
                        'meta_query' => [
                            'relation' => 'OR',
                            [
                                'key' => 'attorney',
                                'compare' => 'NOT EXISTS'
                            ],
                            [
                                'key' => 'attorney',
                                'value' => '',
                                'compare' => '='
                            ]
                        ],
                        'post__not_in' => wp_list_pluck($reviews, 'ID')
                    ];
                    $empty_query = new WP_Query( $empty_args );
                    $reviews = array_merge($reviews, $empty_query->posts);
                }

                // Remove duplicate posts just in case
                $reviews = array_unique($reviews, SORT_REGULAR);

                // Setup loop for $reviews
                global $post;
                $original_post = $post;
                foreach ($reviews as $review_post) {
                    $post = $review_post;
                    setup_postdata($post);
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
            <?php }
                $post = $original_post;
                wp_reset_postdata();
            ?>
            
            </div>
        </div>
    </div>
</section>

<?php } ?>

<?php get_template_part('block', 'global-prefooter-cta'); ?>





<?php get_footer(); ?>