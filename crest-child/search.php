<?php
/**
 * Search Template
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
                <p>Search Results For:</p>
                <h1>“<?php echo get_search_query(); ?>”</h1>
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
                $args = array(
                    'post_type' => 'page',
                    's' => get_search_query(),
                    'post_status' => 'publish',
                    'posts_per_page' => -1
                );

                $the_query = new WP_Query( $args );

                if ( $the_query->have_posts() ) : ?> 
                    <h2>Page Results</h2>
                    <div class="spacer-60"></div>
                    <ul class="parent">
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <li>
                                <a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif;
                wp_reset_postdata(); ?>
            </div>
            <div class="column-50 block">
                    <?php 
                    $args = array(
                        'post_type' => 'post',
                        's' => get_search_query(),
                        'post_status' => 'publish',
                        'posts_per_page' => -1        
                    );                    

                    $the_query = new WP_Query( $args ); 

                    if ( $the_query->have_posts() ) : ?>
                    <h2>Blog Results</h2>
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
