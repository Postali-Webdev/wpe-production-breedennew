<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */

    $banner_block_layout = get_field('banner_block_layout');
    $banner_page_title = get_field('banner_page_title');
    $banner_intro_copy = get_field('banner_intro_copy');
    $banner_cta_text = get_field('banner_cta_text');
    $banner_cta_button_text = get_field('banner_cta_button_text');
    $banner_cta_button_link_type = get_field('banner_cta_button_link_type');
    $banner_cta_link_phone = get_field('banner_cta_link_phone');
    $banner_cta_link_page = get_field('banner_cta_link_page');
    $banner_cta_form_contact = get_field('banner_cta_form_contact');
    $banner_background_image = get_field('banner_background_image');
    $banner_foreground_image = get_field('banner_foreground_image');
    $intro_block_headline = get_field('intro_block_headline');
    $intro_block_subheadline = get_field('intro_block_subheadline');
    $intro_block_copy = get_field('intro_block_copy');
    $intro_cta_button_text = get_field('intro_cta_button_text');
    $intro_cta_button_link_type = get_field('intro_cta_button_link_type');
    $intro_cta_link_phone = get_field('intro_cta_link_phone');
    $intro_cta_link_page = get_field('intro_cta_link_page');

?>

<?php if ($banner_block_layout == 'parent') { ?>

<section class="banner-block" id="banner-parent" style="background-image:url('<?php echo $banner_background_image; ?>');">
    <div class="container">
        <div class="columns">
            <div class="foreground-image">
            <?php 
            if( !empty( $banner_foreground_image ) ): ?>
                <img src="<?php echo esc_url($banner_foreground_image['url']); ?>" alt="<?php echo esc_attr($banner_foreground_image['alt']); ?>" />
            <?php endif; ?>
            </div>
            <div class="banner-content">
                <h1><?php echo $banner_page_title; ?></h1>

                <?php if ($banner_intro_copy) { ?>
                <p class="lrg"><?php echo $banner_intro_copy; ?></p>
                <?php } ?>

                <?php if ($banner_cta_text) { ?>
                <p class="cta"><?php echo $banner_cta_text; ?></p>
                <?php } ?>

                <div class="banner-cta">
                    <?php if ($banner_cta_button_text) { ?>
                    <?php if ($banner_cta_button_link_type == 'phone') {?>
                    <a href="tel:<?php echo $banner_cta_link_phone; ?>" class="btn"><?php echo $banner_cta_button_text; ?></a>
                    <?php } elseif ($banner_cta_button_link_type == "page") { ?>
                    <a href="tel:<?php echo $banner_cta_link_page; ?>" class="btn"><?php echo $banner_cta_button_text; ?></a>
                    <?php } ?>                
                    <?php } ?>
                    <?php if ( $banner_cta_form_contact ) { ?>
                    <p>Or use our <a href="<?php echo $banner_cta_form_contact; ?>">online form!</a></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php } ?>

<?php if ($banner_block_layout == 'child-slim') { ?>

<section class="banner-block" id="banner-child" style="background-image:url('<?php echo $banner_background_image; ?>');">
    <div class="container">
    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
    <div class="spacer-60"></div>
        <div class="columns">
            <div class="column-66 centered center">
                <h1><?php echo $banner_page_title; ?></h1>

                <?php if ($banner_intro_copy) { ?>
                <p class="lrg"><?php echo $banner_intro_copy; ?></p>
                <?php } ?>

                <?php if ($banner_cta_text) { ?>
                <p class="cta"><?php echo $banner_cta_text; ?></p>
                <?php } ?>

                <div class="banner-cta">
                    <?php if ($banner_cta_button_text) { ?>
                    <?php if ($banner_cta_button_link_type == 'phone') {?>
                    <a href="tel:<?php echo $banner_cta_link_phone; ?>" class="btn"><?php echo $banner_cta_button_text; ?></a>
                    <?php } elseif ($banner_cta_button_link_type == "page") { ?>
                    <a href="tel:<?php echo $banner_cta_link_page; ?>" class="btn"><?php echo $banner_cta_button_text; ?></a>
                    <?php } ?>                
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php } ?>

<?php if ($banner_block_layout == 'child-full') { ?>

<section class="banner-block" id="banner-child-full" style="background-image:url('<?php echo $banner_background_image; ?>');">
    <div class="container">
    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
    <div class="spacer-60"></div>
        <div class="columns">
            <div class="column-50 ">
                <h1><?php echo $banner_page_title; ?></h1>

                <?php if ($banner_intro_copy) { ?>
                <p class="lrg"><?php echo $banner_intro_copy; ?></p>
                <?php } ?>

                <div class="banner-cta">
                    <?php if ($banner_cta_button_text) { ?>
                    <?php if ($banner_cta_button_link_type == 'phone') {?>
                    <a href="tel:<?php echo $banner_cta_link_phone; ?>" class="btn"><?php echo $banner_cta_button_text; ?></a>
                    <?php } elseif ($banner_cta_button_link_type == "page") { ?>
                    <a href="tel:<?php echo $banner_cta_link_page; ?>" class="btn"><?php echo $banner_cta_button_text; ?></a>
                    <?php } ?>                
                    <?php } ?>
                </div>
            </div>

            <div class="column-50 banner-image">
                <div class="foreground-image">
                <?php 
                if( !empty( $banner_foreground_image ) ): ?>
                    <img src="<?php echo esc_url($banner_foreground_image['url']); ?>" alt="<?php echo esc_attr($banner_foreground_image['alt']); ?>" />
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="banner-block-intro">
    <div class="container">
        <div class="columns">
            <div class="column-75 centered center">
                <h2><?php echo $intro_block_headline; ?></h2>
                <p class="subhead"><?php echo $intro_block_subheadline; ?></p>
                <?php echo $intro_block_copy; ?>

                <?php if ($intro_cta_button_text) { ?>
                <div class="intro-cta">
                    <?php if ($intro_cta_button_link_type == 'phone') {?>
                    <a href="tel:<?php echo $intro_cta_link_phone; ?>" class="btn"><?php echo $intro_cta_button_text; ?></a>
                    <?php } elseif ($intro_cta_button_link_type == "page") { ?>
                    <a href="tel:<?php echo $intro_cta_link_page; ?>" class="btn"><?php echo $intro_cta_button_text; ?></a>
                    <?php } ?>                
                </div>
                <?php } ?>

            </div>
        </div>
    </div>
</section>

<?php } ?>