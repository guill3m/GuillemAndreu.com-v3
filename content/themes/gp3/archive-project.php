<?php
/**
 * @package WordPress
 * @subpackage GuillemAndreu.com
 * @since GuillemAndreu.com 3.0.0
 */
?>


<?php get_header(); ?>

<?php if(have_posts()) : ?>

	<div class="portfolio">

		<?php while(have_posts()) : the_post(); ?>

			<article id="project-<?php the_ID(); ?>" class="portfolio-item">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('project-thumbnail'); ?>
					<div class="portfolio-item-txt">
						<p class="portfolio-item-title"><?php the_title(); ?></p>
					</div>
				</a>
			</article>

		<?php endwhile; ?>

	</div>

<?php endif; ?>

<?php get_footer(); ?>