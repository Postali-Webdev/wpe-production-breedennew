<?php get_header(); ?>


<div id="banner-50">
    <div class="columns">
        <div class="column-50 block content-block">
            <div class="container">
                <?php 
                    if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
                    }
                ?>
                <h1><?php the_field('video_title', 'options') ?></h1>
                <?php the_field('video_banner_copy', 'options'); ?>
                <div class="cta-wrapper">
                    <p><?php the_field('video_phone_cta_copy', 'options'); ?></p>
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
            <?php 
                $video_args = [
                    'post_type' => 'videos',
                    'post_status' => 'publish',
                    'posts_per_page' => 9,
                    'order' => 'DESC',
                    'paged' => get_query_var('paged')
                ];
                $video_query = new WP_Query( $video_args );    
                if( $video_query->have_posts() ) :  ?>
                <div id="video-reviews" class="active-review">
                    <?php while( $video_query->have_posts() ) : $video_query->the_post(); 
                        $video_el = '';
                        $video_title = get_field('video_title');
                        $video_embed_type = get_field('video_embed_type');
                        $video_embed_url = get_field('video_embed');
                        $video_url_builder = $video_embed_type === "vimeo" ? "https://player.vimeo.com/video/" : "https://www.youtube.com/embed/";
                        $video_url_builder .= $video_embed_url;
                        $video_url_builder .= get_field('video_embed_type') === "vimeo" ? "?&title=0&byline=0&portrait=0" : "?si=6htVusoRg-zvATCV";
                        $video_copy = get_field('video_description');
                        $video_thumbnail = get_post_thumbnail_id() ? get_post_thumbnail_id() : '399';
                        

                        if( $video_embed_url ) {
                            $video_el .= "<div class='video-block'>";
                            $video_el .= "<div class='video-wrapper'>";
                            if( $video_thumbnail ) {
                                //$video_el .= "<div class='video-block-thumbnail'>". wp_get_attachment_image( $video_thumbnail, 'full' ). "</div>";
                            }
                            if( $video_embed_url ) {
                                $video_el .= "<div class='responsive-iframe'>
                                <iframe class='video-embed' src='$video_url_builder' frameborder='0' allow='autoplay; fullscreen; picture-in-picture' allowfullscreen></iframe>
                                </div>";
                            }
                            $video_el .= "</div>";
                            if( $video_copy || $video_embed_url ) {
                                $video_el .= "<div class='video-block-content'><p><strong>$video_title</strong></p>";
                                if( $video_copy ) {
                                    $video_el .= "<div class='video-block-copy'><p>$video_copy</p></div>";
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
                        
                    <?php endwhile;?>
                </div>

                <?php 
                    $big = 999999999; // need an unlikely integer
                    $translated = __( 'Page', 'textdomain' ); // Supply translatable text from the default
                    $pagination = paginate_links( array(
                        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format' => '?paged=%#%',
                        'current' => max( 1, get_query_var('paged') ),
                        'total' => $video_query->max_num_pages,
                        'prev_text' => '',
                        'next_text' => ''
                    ) );

                    if ( $pagination ) {
                        echo '<div class="pagination"><div class="nav-links">' . $pagination . '</div></div>';
                    } 
                ?>

            <?php endif; wp_reset_postdata(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>