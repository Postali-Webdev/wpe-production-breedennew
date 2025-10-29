<?php
$title = get_field('book_block_title', 'options');
$subtitle = get_field('book_block_subtitle', 'options');
$copy = get_field('book_block_copy', 'options');
$link = get_field('book_block_link', 'options');
?>
<section class="wp-block-group full-width align-edge desktop-padding-0 has-background" style="background:linear-gradient(90deg,rgba(255,255,255,0) 17%,rgb(41,41,41) 46%)">
    <div class="wp-block-group__inner-container is-layout-constrained wp-block-group-is-layout-constrained">
        <div class="wp-block-columns is-layout-flex wp-container-core-columns-is-layout-9d6595d7 wp-block-columns-is-layout-flex">
            <div class="wp-block-column overlay-behind is-layout-flow wp-block-column-is-layout-flow" style="flex-basis:66%">
                <figure class="wp-block-image size-full image-full extra-wide-img"><picture decoding="async" class="wp-image-2108">
                    <source type="image/webp" srcset="/wp-content/uploads/2025/06/Breeden-Download-Our-Free-Ebook-Banner-Image.jpg.webp 1700w, /wp-content/uploads/2025/06/Breeden-Download-Our-Free-Ebook-Banner-Image-300x200.jpg.webp 300w, /wp-content/uploads/2025/06/Breeden-Download-Our-Free-Ebook-Banner-Image-1024x683.jpg.webp 1024w, /wp-content/uploads/2025/06/Breeden-Download-Our-Free-Ebook-Banner-Image-768x512.jpg.webp 768w, /wp-content/uploads/2025/06/Breeden-Download-Our-Free-Ebook-Banner-Image-1536x1025.jpg.webp 1536w" sizes="(max-width: 1700px) 100vw, 1700px">
                        <img decoding="async" width="1700" height="1134" src="/wp-content/uploads/2025/06/Breeden-Download-Our-Free-Ebook-Banner-Image.jpg" alt="Jonathan Breeden's book sitting on desk next to awards and business cards" srcset="/wp-content/uploads/2025/06/Breeden-Download-Our-Free-Ebook-Banner-Image.jpg 1700w, /wp-content/uploads/2025/06/Breeden-Download-Our-Free-Ebook-Banner-Image-300x200.jpg 300w, /wp-content/uploads/2025/06/Breeden-Download-Our-Free-Ebook-Banner-Image-1024x683.jpg 1024w, /wp-content/uploads/2025/06/Breeden-Download-Our-Free-Ebook-Banner-Image-768x512.jpg 768w, /wp-content/uploads/2025/06/Breeden-Download-Our-Free-Ebook-Banner-Image-1536x1025.jpg 1536w" sizes="(max-width: 1700px) 100vw, 1700px">
                    </picture>
                </figure>
            </div>
            <div class="wp-block-column offset-right align-center-vertical is-layout-flow wp-block-column-is-layout-flow" style="flex-basis:33%">
                <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
                <h2 class="wp-block-heading has-white-color has-text-color has-link-color wp-elements-6aa3de5262581e9bb4735525c8b3a774"><?php echo $title; ?></h2>
                <p class="subtitle has-white-color has-text-color has-link-color wp-elements-d5124ec48bf1419d509bb37572f8c2be"><?php echo $subtitle; ?></p>
                <p class="has-white-color has-text-color has-link-color wp-elements-cc4ca65ec3d33b9e8ed958f318bc4618"><?php echo $copy; ?></p>
                <a target="" class="btn btn-left" href="<?php echo $link['url']; ?>" title="Get Your Free Book"><?php echo $link['title']; ?></a>
                <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
            </div>
        </div>
    </div>
</section>