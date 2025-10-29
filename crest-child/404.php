<?php
/**
 * 404 Page Not Found.
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
                <h1>404 - Page Not  Found!</h1>
                <p>The page you are looking for does not exist.</p>
                <div class="spacer-30"></div>
                <p class="cta-copy">NEED IMMEDIATE ASSISTANCE? CALL THE BREEDEN LAW OFFICE TODAY.</p>
                <a href="tel:<?php the_field('global_phone_number', 'options'); ?>" class="btn">
                    <?php the_field('global_phone_number', 'options'); ?>
                </a>
            </div>
            <div class="column-50 block">
                <p class="subtitle">HELPFUL LINKS:</p>
                <ul class="links">
                    <li><a href="/">Back to the Website</a></li>
                    <li><a href="/about-breeden-law-office/">About Breeden Law Office</a></li>
                    <li><a href="/reviews/">Hear From Our Clients</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>


<?php get_footer();
