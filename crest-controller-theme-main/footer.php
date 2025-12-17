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

<!--MNTN Tracking Pixel-->
<!-- INSTALL ON ALL PAGES OF SITE-->
<script type="text/javascript">
        (function(){"use strict";var e=null,n="46994",additional="",t,r,i;try{t=top.document.referer!==""?encodeURIComponent(top.document.referrer.substring(0,2048)):""}catch(o){t=document.referrer!==null?document.referrer.toString().substring(0,2048):""}
  try{i=parent.location.href!==""?encodeURIComponent(parent.location.href.toString().substring(0,2048)):""}catch(a){try{i!==null?encodeURIComponent(i.toString().substring(0,2048)):""}catch(f){i=""}}
  var l,c=document.createElement("script"),h=null,p=document.getElementsByTagName("script"),d=Number(p.length)-1,v=document.getElementsByTagName("script")[d];if(typeof l==="undefined"){l=Math.floor(Math.random()*1e17)}
  h="https://dx.mountain.com/spx?"+"shaid="+n+"&tdr="+t+"&plh="+i+"&cb="+l+additional;c.type="text/javascript";c.src=h;v.parentNode.insertBefore(c,v)})();
</script>

<?php wp_footer(); ?>

</body>
</html>