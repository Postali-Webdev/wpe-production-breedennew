<?php $global_cta = get_field('global_pre-footer_cta', 'options'); ?>

<section class="global-prefooter-cta wp-block-group full-width align-edge desktop-padding-0 margin-bottom-0 has-background" style="background:linear-gradient(90deg,rgba(255,255,255,0) 17%,rgb(41,41,41) 46%)">
    <div class="wp-block-group__inner-container is-layout-constrained wp-block-group-is-layout-constrained">
        <div class="wp-block-columns is-layout-flex wp-container-core-columns-is-layout-3 wp-block-columns-is-layout-flex">
            <div class="wp-block-column overlay-behind is-layout-flow wp-block-column-is-layout-flow" style="flex-basis:66%">
                <?php if( $global_cta['left_column_image'] ) {
                    echo wp_get_attachment_image( $global_cta['left_column_image']['ID'], 'full', false, array( 'class' => 'wp-block-image size-full image-full extra-wide-img' ) );
                }?>
            </div>
            <div class="wp-block-column offset-right align-center-vertical is-layout-flow wp-block-column-is-layout-flow">
                <h2><?php echo $global_cta['title']; ?></h2>
                <?php echo $global_cta['copy']; ?>
                <div class="spacer-30"></div>
                <div class="columns columnn-align-center">
                    <div class="column-50">
                        <p><strong><?php echo $global_cta['phone_number_cta_text']; ?></strong></p>
                    </div>
                    <div class="column-50">
                        <a href="tel:<?php the_field('global_phone_number', 'options'); ?>" class="btn">
                            <?php the_field('global_phone_number', 'options'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>