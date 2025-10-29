<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */

    $cta_layout = get_field('cta_layout');
    $cta_pre_headline = get_field('cta_pre_headline');
    $cta_headline = get_field('cta_headline');
    $cta_sub_headline = get_field('cta_sub_headline');
    $cta_body_copy = get_field('cta_body_copy');
    $cta_button_text = get_field('cta_button_text');
    $cta_button_link_type = get_field('cta_button_link_type');
    $cta_page_link = get_field('cta_page_link');
    $cta_phone_link = get_field('cta_phone_link');
?>

<?php if ($cta_layout == 'slim') { ?>

<section class="cta-block" id="slim">
    <div class="container">
        <div class="columns">
            <div class="column-75 block">
                <?php if(get_field('cta_pre_headline')) { ?>
                <p class="pre-headline"><?php echo $cta_pre_headline; ?></p>
                <?php } ?>
                <h2><?php echo $cta_headline; ?></h2>
            </div>
            <div class="column-25">
            <?php if ($cta_button_link_type == 'page') { ?>
                <a href="<?php echo $cta_page_link; ?>" class="btn"><?php echo $cta_button_text; ?></a>
            <?php } elseif ($cta_button_link_type == 'tel') { ?>
                <a href="tel:<?php echo $cta_phone_link; ?>" class="btn"><?php echo $cta_button_text; ?></a>
            <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php } ?>

<?php if ($cta_layout == 'full') { ?>

<section class="cta-block" id="full">
    <div class="container">
        <div class="columns">
            <div class="column-75 block centered center">
                <?php if(get_field('cta_pre_headline')) { ?>
                <p class="pre-headline"><?php echo $cta_pre_headline; ?></p>
                <?php } ?>
                <h2><?php echo $cta_headline; ?></h2>
                <?php if(get_field('cta_sub_headline')) { ?>
                <p class="sub-headline"><?php echo $cta_sub_headline; ?></p>
                <?php } ?>
                <?php if(get_field('cta_body_copy')) { ?>
                <?php echo $cta_body_copy; ?>
                <?php } ?>
                <?php if ($cta_button_link_type == 'page') { ?>
                <a href="<?php echo $cta_page_link; ?>" class="btn"><?php echo $cta_button_text; ?></a>
                <?php } elseif ($cta_button_link_type == 'tel') { ?>
                <a href="tel:<?php echo $cta_phone_link; ?>" class="btn"><?php echo $cta_button_text; ?></a>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php } ?>

<?php if ($cta_layout == 'split') { ?>

<section class="cta-block" id="split">
    <div class="container">
        <div class="columns">
            <div class="column-66">
                <?php if(get_field('cta_pre_headline')) { ?>
                <p class="pre-headline"><?php echo $cta_pre_headline; ?></p>
                <?php } ?>
                <h2><?php echo $cta_headline; ?></h2>
            </div>
            <div class="column-33">
                <?php if(get_field('cta_body_copy')) { ?>
                <?php echo $cta_body_copy; ?>
                <?php } ?>
                <?php if ($cta_button_link_type == 'page') { ?>
                <a href="<?php echo $cta_page_link; ?>" class="btn"><?php echo $cta_button_text; ?></a>
                <?php } elseif ($cta_button_link_type == 'tel') { ?>
                <a href="tel:<?php echo $cta_phone_link; ?>" class="btn"><?php echo $cta_button_text; ?></a>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php } ?>