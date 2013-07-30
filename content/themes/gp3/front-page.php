<?php
/**
 * @package WordPress
 * @subpackage GuillemAndreu.com
 * @since GuillemAndreu.com 3.0.0
 */
?>


<?php get_header(); ?>

	<?php if(get_field('home_slide', 'option')) : ?>

		<div id="home-slide" class="slide">
			<ul>

				<?php while(has_sub_field('home_slide', 'option')) : ?>
					<?php $post = get_sub_field('home_slide_item');
					setup_postdata($post); ?>
					<li class="slide-item">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('project-frontpage'); ?>
							<div class="slide-txt">
								<p class="slide-title"><?php the_title(); ?></p>
								<p class="slide-subtitle"><?php the_field('project_subtitle'); ?></p>
							</div>
						</a>
					</li>
					<?php wp_reset_postdata(); ?>
				<?php endwhile; ?>

			</ul>
		</div>

	<?php endif; ?>


	<?php if(get_field('home_quotes', 'option')) : ?>

			<ul class="home-quotes">

				<?php while(has_sub_field('home_quotes', 'option')) : ?><li class="quote">
						<p><?php the_sub_field('home_quote', 'option'); ?></p>
						<p class="quote-author"><?php the_sub_field('home_quote_author', 'option'); ?></p>
					</li><?php endwhile; ?>

			</ul>

	<?php endif; ?>

<?php get_footer(); ?>