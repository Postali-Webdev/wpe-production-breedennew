<?php
/**
 * Theme footer
 *
 * @package Postali Parent
 * @author Postali LLC
 */

$remove_footer = get_field('remove_footer');
?>

<?php if( !$remove_footer ) : ?>
<footer>

    <section class="footer-upper">
        <div class="container">
            <div class="columns footer-upper-wrapper">

                <div class="columns">
                    <div class="column-25">
                        <?php if( get_field('site_logo', 'options') ) {
                            $logo = get_field('site_logo', 'options');
                            echo wp_get_attachment_image( $logo['ID'], 'full' );
                        } ?>
                    </div>

                    <div class="column-75">
                        <div class="footer-copy">
                            <?php the_field('footer_copy', 'options'); ?>
                        </div>
                    </div>
                </div>

                <div class="columns">
                    <div class="column-25">
                        <?php if( get_field('global_phone_number', 'options') ) : ?>
                            <a class="btn" href="tel:<?php the_field('global_phone_number', 'options'); ?>"><?php the_field('global_phone_number', 'options'); ?></a>
                        <?php endif; ?>
                    </div>

                    <div class="column-75">
                        <?php
                            $current_url = $_SERVER['REQUEST_URI'];
                            if( strpos($current_url, 'contact') ) {
                                $locations = get_field('locations', 'options');
                                $show_default_menu = true; ?>
                                <div class="locations">
                                    <?php foreach ( $locations as $location ) {
                                        $location_page = $location['location_page'];
                                        $location_name = strtolower($location['name']);
                                        $location_id = $location_page->ID;
                                        
                                        if( is_tree( $location_id ) ) {

                                            $name = $location['name'];
                                            $address = $location['address'];
                                            $directions_url = $location['directions_url'];
                                            $county = $location['county'];
                                            $local_phone = $location['local_phone_number'];
                                            $page_object = $location['location_page'];
                                            $map_iframe_url = $location['map_embed_url'];
                                            if( $page_object ) {
                                                $page_id = $page_object->ID;
                                                $page_url = get_page_link($page_id);   
                                            } ?>
                                            
                                            <div class="location">
                                                <div class="location-name">
                                                    <?php if( $page_object) : ?>
                                                    <a href="<?php echo get_the_permalink($page_object); ?>">
                                                    <?php endif; ?>
                                                        <p><?php echo $name; ?> Office</p>
                                                    <?php if( $page_object) : ?>
                                                    </a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="location-address">
                                                    <?php if( $directions_url) : ?>
                                                    <a target="_blank" href="<?php echo $directions_url; ?>">
                                                    <?php endif; ?>

                                                        <?php echo $address; ?>

                                                    <?php if( $directions_url) : ?>
                                                    </a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="responsive-iframe">
                                                    <iframe src="<?php echo $map_iframe_url; ?>" title="Map embed of Breeden Law office in <?php echo $name; ?>" frameborder="0"></iframe>
                                                </div>
                                            </div>

                                            <?php
                                            $show_default_menu = false;
                                            break;
                                        } 	

                


                                    } ?>
                                </div>



                                <?php if( $show_default_menu ) { ?>
                                    <?php if( have_rows('locations', 'options') ) : ?>
                                    <div class="locations">
                                        <?php while( have_rows('locations', 'options') ) :
                                            the_row(); 
                                            $name = get_sub_field('name');
                                            $address = get_sub_field('address');
                                            $directions_url = get_sub_field('directions_url');
                                            $county = get_sub_field('county');
                                            $local_phone = get_sub_field('local_phone_number');
                                            $page_object = get_sub_field('location_page');
                                            $map_iframe_url = get_sub_field('map_embed_url');
                                            if( $page_object ) {
                                                $page_id = $page_object->ID;
                                                $page_url = get_page_link($page_id);   
                                            }
                                        ?>

                                            <div class="location">
                                                <div class="location-name">
                                                    <?php if( $page_object) : ?>
                                                    <a href="<?php echo get_the_permalink($page_object); ?>">
                                                    <?php endif; ?>
                                                        <p><?php echo $name; ?> Office</p>
                                                    <?php if( $page_object) : ?>
                                                    </a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="location-address">
                                                    <?php if( $directions_url) : ?>
                                                    <a target="_blank" href="<?php echo $directions_url; ?>">
                                                    <?php endif; ?>

                                                        <?php echo $address; ?>

                                                    <?php if( $directions_url) : ?>
                                                    </a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="responsive-iframe">
                                                    <iframe src="<?php echo $map_iframe_url; ?>" title="Map embed of Breeden Law office in <?php echo $name; ?>" frameborder="0"></iframe>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                                <?php } ?>



                                
                            <?php } else { ?>
                                
                                <?php if( have_rows('locations', 'options') ) : ?>
                                    <div class="locations">
                                        <?php while( have_rows('locations', 'options') ) :
                                            the_row(); 
                                            $name = get_sub_field('name');
                                            $address = get_sub_field('address');
                                            $directions_url = get_sub_field('directions_url');
                                            $county = get_sub_field('county');
                                            $local_phone = get_sub_field('local_phone_number');
                                            $page_object = get_sub_field('location_page');
                                            $map_iframe_url = get_sub_field('map_embed_url');
                                            if( $page_object ) {
                                                $page_id = $page_object->ID;
                                                $page_url = get_page_link($page_id);   
                                            }
                                        ?>

                                        <div class="location">
                                            <div class="location-name">
                                                <?php if( $page_object) : ?>
                                                <a href="<?php echo get_the_permalink($page_object); ?>">
                                                <?php endif; ?>
                                                    <p><?php echo $name; ?> Office</p>
                                                <?php if( $page_object) : ?>
                                                </a>
                                                <?php endif; ?>
                                            </div>
                                            <div class="location-address">
                                                <?php if( $directions_url) : ?>
                                                <a target="_blank" href="<?php echo $directions_url; ?>">
                                                <?php endif; ?>

                                                    <?php echo $address; ?>

                                                <?php if( $directions_url) : ?>
                                                </a>
                                                <?php endif; ?>
                                            </div>
                                            <div class="responsive-iframe">
                                                <iframe src="<?php echo $map_iframe_url; ?>" title="Map embed of Breeden Law office in <?php echo $name; ?>" frameborder="0"></iframe>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>

                            <?php }
                        
                        ?>





                    </div>
                </div>
            </div>
        </div>
    </section>

     <section class="footer-lower dark-bg">
        <div class="container wide-container">
            <div class="columns footer-links">
                <div class="column-50 block">
                    <p class="form-title"><?php the_field('contact_form_title', 'options'); ?></p>
                    <?php echo do_shortcode( get_field('gform_shortcode', 'options')); ?>
                    
                </div>
                <div class="column-33 block">
                    <div class="nav-wrapper">
                        <div class="nav">
                            <p class="nav-title"><?php the_field('practice_area_links_title', 'options'); ?></p>
                            <nav>
                            <?php
                                $locations = get_field('locations', 'options');
                                $show_default_footer_menu = true;
                                foreach ( $locations as $location ) {
                                    $location_page = $location['location_page'];
                                    $location_name = strtolower($location['name']);
                                    $location_name_fixed = str_replace(' ', '-', $location_name);
                                    $location_id = $location_page->ID;
                                    $location_schema = "";
                                    if( is_tree( $location_id ) ) {
                                        $location_schema = $location['location_schema'];
                                        $args = array(
                                            'container' => false,
                                            'theme_location' => "$location_name_fixed-pa-nav"
                                        );
                                        wp_nav_menu( $args );		
                                        $show_default_footer_menu = false;
                                        break;
                                    } 	
                                }

                                if( $show_default_footer_menu ) {
                                    $location_schema = get_field('global_schema', 'options');
                                    $args = array(
                                        'container' => false,
                                        'theme_location' => 'footer-pa-nav'
                                    );
                                    wp_nav_menu( $args );
                                }
                            ?>	
                            </nav>
                        </div>
                        <div class="nav">
                            <p class="nav-title"><?php the_field('quick_links_title', 'options') ?></p>
                            <nav>
                            <?php
                                $args = array(
                                    'container' => false,
                                    'theme_location' => 'quick-links-nav'
                                );
                                wp_nav_menu( $args );
                            ?>	
                            </nav>
                        </div>
                    </div>
                    
                </div>
                <?php 
                    $social_media = get_field('social_media', 'options');
                    $social_active = $social_media['activate'];
                    $social_urls = $social_media['social_urls'];
                ?>
                <div class="column-20">
                     <div class="social-list">
                        <?php 
                            foreach ($social_active as $social => $active) {
                                $active_url = $social_urls[$social . '_url'];
                                if( $active ) {
                                    echo "<a target='_blank' class='social-icon {$social}-icon' href='{$active_url}' class='social-link'></a>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div class="columns discalaimer-column">
                <div class="column-full block">
                    <div class="disclaimer">
                        <p><?php the_field('disclaimer', 'options'); ?></p>
                    </div>
                    <div class="copyright">
                        <div class="left-col">
                            <p class="copyright-text">© <?php echo date('Y'); ?> <?php the_field('copyright', 'options'); ?></p>
                        </div>
                        <div class="right-col">
                            <div class="postali-branding">
                                <a target="_blank" href="https://www.postali.com/?utm_source=breeden&utm_medium=footer&utm_campaign=client-sites">
                                <?php if( get_field('postali_branding_image', 'options') ) {
                                    $postali_branding_image = get_field('postali_branding_image', 'options');
                                    echo wp_get_attachment_image($postali_branding_image['ID'], 'full');
                                } ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

</footer>
<?php endif; ?>

<?php wp_footer(); ?>

<!-- Callrail -->
<script type="text/javascript" src="//cdn.callrail.com/companies/940938305/bb468ee859709bf54b70/12/swap.js"></script> 

<!-- Clarity -->
 <script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "5ksm4db84a");
</script>

<!--  ClickCease.com tracking-->
<script type='text/javascript'>var script = document.createElement('script');
script.async = true; script.type = 'text/javascript';
var target = 'https://www.clickcease.com/monitor/stat.js';
script.src = target;var elem = document.head;elem.appendChild(script);
</script>
<noscript>
<a href='https://www.clickcease.com' rel='nofollow'><img src='https://monitor.clickcease.com' alt='ClickCease'/></a>
</noscript>
<!--  ClickCease.com tracking-->

<!-- Intaker -->
<script>(function (w,d,s,v,odl){(w[v]=w[v]||{})['odl']=odl;;
var f=d.getElementsByTagName(s)[0],j=d.createElement(s);j.async=true;
j.src='https://intaker.azureedge.net/widget/chat.min.js';
f.parentNode.insertBefore(j,f);
})(window, document, 'script','Intaker', 'breedenlawoffice');
</script>

<!--MNTN Tracking Pixel-->
<!-- INSTALL ON ALL PAGES OF SITE-->
<script type="text/javascript">
        (function(){"use strict";var e=null,n="46994",additional="",t,r,i;try{t=top.document.referer!==""?encodeURIComponent(top.document.referrer.substring(0,2048)):""}catch(o){t=document.referrer!==null?document.referrer.toString().substring(0,2048):""}
  try{i=parent.location.href!==""?encodeURIComponent(parent.location.href.toString().substring(0,2048)):""}catch(a){try{i!==null?encodeURIComponent(i.toString().substring(0,2048)):""}catch(f){i=""}}
  var l,c=document.createElement("script"),h=null,p=document.getElementsByTagName("script"),d=Number(p.length)-1,v=document.getElementsByTagName("script")[d];if(typeof l==="undefined"){l=Math.floor(Math.random()*1e17)}
  h="https://dx.mountain.com/spx?"+"shaid="+n+"&tdr="+t+"&plh="+i+"&cb="+l+additional;c.type="text/javascript";c.src=h;v.parentNode.insertBefore(c,v)})();
</script>


</body>
</html>