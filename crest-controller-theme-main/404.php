<?php
/**
 * 404 Page Not Found.
 *
 * @package Postali Parent
 * @author Postali LLC
 */

get_header(); ?>

<div class="body-container">
    <div class="columns">
        <div class="column-full block">
            <h1 class="post-title">404 | Page Not Found</h1>
            <p><?php esc_html_e( 'We apologize but the page you\'re looking for could not be found.' ); ?></p>
            <a class="link-404" href="/">Let's Get You Back on Track!</a>
        </div>
    </div>
</div>

<?php get_footer();
