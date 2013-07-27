<?php
/**
 * @package WordPress
 * @subpackage GuillemAndreu.com
 * @since GuillemAndreu.com 3.0.0
 */
?>


<?php get_header(); ?>

<?php if(have_posts()) : ?>

	<?php while(have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" class="post">
			<h1 class="post-title"><?php the_title(); ?></h1>
			<div class="post-description"><?php the_content(); ?></div>
		</article>

	<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>