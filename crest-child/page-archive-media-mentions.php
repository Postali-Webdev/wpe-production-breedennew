<?php 
/**
 * Template Name: Media Mentions Archive
 * @package Postali Crest Controller Theme
 * @author Postali LLC
 */
$archive_id = get_queried_object()->ID;
$args = [
    'post_type' => 'media_mentions',
    'posts_per_page' => 10,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status' => 'publish',
	'paged' => get_query_var('paged')
];

$media_mentions = new WP_Query($args);
get_header(); ?>

<div id="posts-banner">
		<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
	<div class="container">
		<div class="columns">
			<div class="column-50">
				<h1><?php the_field('blog_title', $archive_id); ?></h1>
				<p class="subtitle"><?php echo the_field('blog_subtitle', $archive_id);?></p>
				<?php the_field('blog_copy', $archive_id); ?>
				<div class="cta-wrapper">
					<p><?php the_field('cta_copy', $archive_id); ?></p>
					<?php $cta_button = get_field('cta_button', $archive_id);
					if( $cta_button) : ?>
					<a href="<?php echo $cta_button['url']; ?>" class="btn"><?php echo $cta_button['title']; ?></a>
					<?php endif; ?>
				</div>
			</div>
			<div class="column-50">
				<?php if (get_the_post_thumbnail($archive_id)) { echo get_the_post_thumbnail($archive_id);} ?>
			</div>

		</div>
	</div>
</div>

<div class="container blog-posts">


	<div class="content">
		<div class="main-content">
			<div class="blog-feed">
				<?php if( $media_mentions->have_posts() ) : while( $media_mentions->have_posts() ) : $media_mentions->the_post(); ?>
					<article>
						<a target="_blank" href="<?php the_field('article_link'); ?>" title="<?php the_title(); ?>"></a>
						<div class="img-wrapper">
							<?php if (get_the_post_thumbnail()) { echo get_the_post_thumbnail();} ?>
						</div>
						<div class="copy-wrapper">
							<p class="article-title"><?php the_title(); ?></p>
							<?php the_excerpt(); ?>
							<p class="read-more">See Full Mention <span class="arrow-icon"></span></p>
						</div>
					</article>
				<?php endwhile; endif; ?>
			</div>
		</div>
		<div class="main-sidebar">

		</div>

		<?php 
			$big = 999999999; // need an unlikely integer
			$translated = __( 'Page', 'textdomain' ); // Supply translatable text from the default
			$pagination = paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $media_mentions->max_num_pages,
				'prev_text' => '',
				'next_text' => ''
			) );

			if ( $pagination ) {
				echo '<div class="pagination"><div class="nav-links">' . $pagination . '</div></div>';
			} 
		?>
		
	</div>


</div><!-- #content -->




<?php get_footer(); ?>