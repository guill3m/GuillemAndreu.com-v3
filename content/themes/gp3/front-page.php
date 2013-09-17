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
							<?php $img_id = get_post_thumbnail_id();
							$img_xxxs = wp_get_attachment_image_src($img_id, 'project-frontpage-xxxs');
							$img_xxxs_2x = wp_get_attachment_image_src($img_id, 'project-frontpage-xxxs-2x');
							$img_xxs = wp_get_attachment_image_src($img_id, 'project-frontpage-xxs');
							$img_xxs_2x = wp_get_attachment_image_src($img_id, 'project-frontpage-xxs-2x');
							$img_xs = wp_get_attachment_image_src($img_id, 'project-frontpage-xs');
							$img_xs_2x = wp_get_attachment_image_src($img_id, 'project-frontpage-xs-2x');
							$img_s = wp_get_attachment_image_src($img_id, 'project-frontpage-s');
							$img_s_2x = wp_get_attachment_image_src($img_id, 'project-frontpage-s-2x');
							$img_m = wp_get_attachment_image_src($img_id, 'project-frontpage-m');
							$img_m_2x = wp_get_attachment_image_src($img_id, 'project-frontpage-m-2x');
							$img_l = wp_get_attachment_image_src($img_id, 'project-frontpage-l');
							$img_l_2x = wp_get_attachment_image_src($img_id, 'project-frontpage-l-2x');
							$img_xl = wp_get_attachment_image_src($img_id, 'project-frontpage-xl');
							$img_xl_2x = wp_get_attachment_image_src($img_id, 'project-frontpage-xl-2x');
							$img_xxl = wp_get_attachment_image_src($img_id, 'project-frontpage-xxl');
							$img_xxl_2x = wp_get_attachment_image_src($img_id, 'project-frontpage-xxl-2x');
							$img_xxxl = wp_get_attachment_image_src($img_id, 'project-frontpage-xxxl');
							$img_xxxl_2x = wp_get_attachment_image_src($img_id, 'project-frontpage-xxxl-2x');
							echo '<img src="data:image/gif;base64,R0lGODlhAwABAIAAAAAAAAAAACH/C1hNUCBEYXRhWE1QPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS4zLWMwMTEgNjYuMTQ1NjYxLCAyMDEyLzAyLzA2LTE0OjU2OjI3ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M2IChNYWNpbnRvc2gpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkQ3NjY0NDA3MTdFNTExRTM5RTk2RjE3OUE4Qjc0OUNEIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkQ3NjY0NDA4MTdFNTExRTM5RTk2RjE3OUE4Qjc0OUNEIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6RDc2NjQ0MDUxN0U1MTFFMzlFOTZGMTc5QThCNzQ5Q0QiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6RDc2NjQ0MDYxN0U1MTFFMzlFOTZGMTc5QThCNzQ5Q0QiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz4B//79/Pv6+fj39vX08/Lx8O/u7ezr6uno5+bl5OPi4eDf3t3c29rZ2NfW1dTT0tHQz87NzMvKycjHxsXEw8LBwL++vby7urm4t7a1tLOysbCvrq2sq6qpqKempaSjoqGgn56dnJuamZiXlpWUk5KRkI+OjYyLiomIh4aFhIOCgYB/fn18e3p5eHd2dXRzcnFwb25tbGtqaWhnZmVkY2JhYF9eXVxbWllYV1ZVVFNSUVBPTk1MS0pJSEdGRURDQkFAPz49PDs6OTg3NjU0MzIxMC8uLSwrKikoJyYlJCMiISAfHh0cGxoZGBcWFRQTEhEQDw4NDAsKCQgHBgUEAwIBAAAh+QQBAAAAACwAAAAAAwABAAACAoQLADs=" alt="' . get_the_title() . '" data-responsive data-responsive-xxxs="' . $img_xxxs[0] . '" data-responsive-xxxs-2x="' . $img_xxxs_2x[0] . '" data-responsive-xxs="' . $img_xxs[0] . '" data-responsive-xxs-2x="' . $img_xxs_2x[0] . '" data-responsive-xs="' . $img_xs[0] . '" data-responsive-xs-2x="' . $img_xs_2x[0] . '" data-responsive-s="' . $img_s[0] . '" data-responsive-s-2x="' . $img_s_2x[0] . '" data-responsive-m="' . $img_m[0] . '" data-responsive-m-2x="' . $img_m_2x[0] . '" data-responsive-l="' . $img_l[0] . '" data-responsive-l-2x="' . $img_l_2x[0] . '" data-responsive-xl="' . $img_xl[0] . '" data-responsive-xl-2x="' . $img_xl_2x[0] . '" data-responsive-xxl="' . $img_xxl[0] . '" data-responsive-xxl-2x="' . $img_xxl_2x[0] . '" data-responsive-xxxl="' . $img_xxxl[0] . '" data-responsive-xxxl-2x="' . $img_xxxl_2x[0] . '" />'; ?>
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