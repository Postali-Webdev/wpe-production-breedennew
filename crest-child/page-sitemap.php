<?php
/**
 * Template Name: Sitemap
 *
 * @package Postali Parent
 * @author Postali LLC
 */

get_header(); ?>

<section class="no-banner">
    <div class="container">
        <div class="columns">
            <div class="column-50 block">
                <?php 
                    if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
                    }
                ?>
                <h1>Sitemap</h1>
                <div class="spacer-30"></div>
            </div>
            <div class="column-50 block">
               <p class="cta-copy">NEED IMMEDIATE ASSISTANCE? CALL THE BREEDEN LAW OFFICE TODAY.</p>
                <a href="tel:<?php the_field('global_phone_number', 'options'); ?>" class="btn">
                    <?php the_field('global_phone_number', 'options'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<section id="search-results">
    <div class="container">
        <div class="columns">
            <div class="column-50 block">
                <?php 

                $templates = array(
                    'page-ppc-landing.php',
                    'page-ppc-landing-options.php',
                    'page-sitemap.php'
                );

                $args = array(
                    'post_type' => 'page',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'post_parent' => 0,
                    'meta_query' => array(
                        array(
                            'key' => '_wp_page_template',
                            'value' => $templates,
                            'compare' => 'NOT IN'
                        )
                    )
                );

                $the_query = new WP_Query( $args );

                if ( $the_query->have_posts() ) : ?> 
                    <h2>Pages</h2>
                    <div class="spacer-60"></div>
                    <ul class="parent">
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <?php 
                            $has_children = get_pages(array('child_of' => get_the_ID()));
                            if ($has_children) {
                                display_pages(get_the_ID());
                            } else {
                                ?>
                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                            <?php } ?>
                        <?php endwhile; ?>
                    </ul>
                <?php endif;
                wp_reset_postdata(); ?>

                <?php
                function display_pages($parent_id) {
                    ?>
                    <li>
                        <a href="<?php echo get_permalink($parent_id); ?>"><?php echo get_the_title($parent_id); ?></a>
                        <ul class="child-posts">
                            <?php 
                            $args = array(
                                'post_type' => 'page',
                                'post_status' => 'publish',
                                'posts_per_page' => -1,
                                'post_parent' => $parent_id
                            );

                            $children = new WP_Query( $args );

                            if ( $children->have_posts() ) : ?>
                                <?php while ( $children->have_posts() ) : $children->the_post(); ?>
                                    <?php 
                                    $has_children = get_pages(array('child_of' => get_the_ID()));
                                    if ($has_children) {
                                        display_pages(get_the_ID());
                                    } else {
                                        ?>
                                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                    <?php } ?>
                                <?php endwhile; ?>
                            <?php endif;
                            wp_reset_postdata(); ?>
                        </ul>
                    </li>
                <?php }
                ?>
            </div>
            <div class="column-50 block">
                    <?php 
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => -1        
                    );                    

                    $the_query = new WP_Query( $args ); 

                    if ( $the_query->have_posts() ) : ?>
                    <h2>Blogs</h2>
                    <div class="spacer-60"></div>
                    <ul class="links">
                    <?php
                        while ( $the_query->have_posts() ) : $the_query->the_post();                        
                         ?> 
                            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                         
                         <?php
                        endwhile; ?> 
                    </ul>
                    <?php endif;
                    wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>


<?php get_footer();
