<?php
/**
 * Template Name: Blog
 * 
 * @package Postali Parent
 * @author Postali LLC
 */


$archive_id = get_queried_object()->ID;
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
				<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
					<article>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"></a>
						<div class="img-wrapper">
							<?php if (get_the_post_thumbnail()) { echo get_the_post_thumbnail();} ?>
						</div>
						<div class="copy-wrapper">
							<p class="article-title"><?php the_title(); ?></p>
							<?php the_excerpt(); ?>
							<p class="read-more">Read More <span class="arrow-icon"></span></p>
						</div>
					</article>
				<?php endwhile; endif; ?>
			</div>
		</div>
		<div class="main-sidebar">

		</div>

		<?php the_posts_pagination([
				'prev_text' => '',
  				'next_text' => ''
		]); ?>
		
	</div>


</div><!-- #content -->

<?php get_footer(); ?>
