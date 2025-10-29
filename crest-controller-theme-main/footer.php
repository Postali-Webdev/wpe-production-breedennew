<?php
/**
 * Theme footer
 *
 * @package Postali Parent
 * @author Postali LLC
 */
?>
<footer>

    <section class="footer">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <?php the_custom_logo(); ?>
                </div>
                <div class="spacer-60"></div>
                <div class="column-25 block">
                    <p><strong>Contact Us</strong><br>
                    
                    </p>
                </div>
                <div class="column-50 address-map">
                    <div class="footer-address">
                        <p><strong>Office</strong><br>
                        
                        </p>
                    </div>
                    <div class="footer-map">
                        <iframe src="" title="location map" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="column-20 block menu">
                    <p><strong>Site Navigation</strong></p>
                    <nav role="navigation">
                    <?php
                        $args = array(
                            'container' => false,
                            'theme_location' => 'footer-nav'
                        );
                        wp_nav_menu( $args );
                    ?>	
                    </nav>
                </div>
            </div>
        </div>
    </section>

</footer>

<!-- Add JSON Schema here -->
    <?php 
    // Global Schema
    $global_schema = get_field('global_schema', 'options');
    if ( !empty($global_schema) ) :
        echo '<script type="application/ld+json">' . $global_schema . '</script>';
    endif;

    // Single Page Schema
    $single_schema = get_field('single_schema');
    if ( !empty($single_schema) ) :
        echo '<script type="application/ld+json">' . $single_schema . '</script>';
    endif; ?>


<?php wp_footer(); ?>

</body>
</html>