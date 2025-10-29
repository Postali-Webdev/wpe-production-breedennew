<?php
/**
 * Single template
 *
 * @package Postali Parent
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

$categories = get_the_category();
$cat_length = count($categories);
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
                <h1><?php the_title(); ?></h1>
                <p class="author">Written By: Jonathan Breeden</p>
                <p class="date">Published: <?php echo get_the_date(); ?></p>
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
        <div class="column-50 block img-block">
            <?php $desktop_img = get_the_post_thumbnail(); if( $desktop_img ) {
                echo $desktop_img;
            } ?>
        </div>
    </div>
</div>
<div class="category-section">
    <div class="category-list">
        <p>TAGS: 
        <?php 
        $count = 0;
        foreach( $categories as $category ) {
            if ( ! empty( $category ) ) {
                echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
                if ( $count < $cat_length - 1 ) {
                    echo ', ';
                }
                $count++;
            }   
        }
        ?>
        </p>
    </div>
    <div class="about">
        <a href="/about-breeden-law-office/" class="about-link">About Breeden Law Office <span class="arrow-icon"></span></a>
    </div>
    
</div>

<div class="body-container">
    <?php echo $block_content; 
    
    $related_posts_args = [
        'post_type' => 'post',
        'category__in' => wp_get_post_categories($post->ID),
        'post__not_in' => array($post->ID),
        'posts_per_page' => 5,
        'post_status' => 'publish'
    ];

    $related_posts = new WP_Query($related_posts_args);

    if( $related_posts->have_posts() ) : ?>
        <div class="related-posts">
            <div class="container">
                <p class="subtitle">Related Posts</p>
                <div class="related-posts-wrapper">
                    <?php while( $related_posts->have_posts() ) : $related_posts->the_post(); ?> 
                        <div class="related-post">
                            <a class="related-post-link" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"></a>
                            <p class="title"><?php the_title(); ?></p>
                            <?php $excerpt = get_the_excerpt();
                            $excerpt = substr($excerpt, 0, 75); ?>
                            <p class="excerpt"><?php echo $excerpt; ?> [...]</p>
                            <span class="arrow-icon"></span>
                        </div>
                    <?php endwhile; ?>
                </div>
                <a href="/legal-blog/" class="btn">View All Blogs</a>
            </div>
        </div>
    <?php endif; ?>

    <?php get_template_part('block', 'global-prefooter-cta'); ?>
</div>

<?php get_footer(); ?>