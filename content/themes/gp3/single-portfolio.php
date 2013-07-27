<?php
/**
 * @package WordPress
 * @subpackage GuillemAndreu.com
 * @since GuillemAndreu.com 3.0.0
 */
?>


<?php get_header(); ?>

<?php while(have_posts()) : the_post(); ?>

	<article id="project-<?php the_ID(); ?>" class="project">

		<header class="project-header">
			<h1 class="project-title"><?php the_title(); ?></h1>
			<h2 class="project-subtitle"><?php the_field('project_subtitle'); ?></h2>
			<a href="#" class="project-more" data-icon="more"><?php _e('More'); ?></a>
		</header>

		<section class="project-charact">
			<ul class="project-charact-list">
				<li data-icon="date"><span class="project-charact-title"><?php _e('Date'); ?>:</span> <?php the_field('project_date'); ?></li>
				<li data-icon="client"><span class="project-charact-title"><?php _e('Client'); ?>:</span> <?php the_field('project_client'); ?></li>
				<li data-icon="type"><span class="project-charact-title"><?php _e('Project type'); ?>:</span> <?php echo get_the_term_list( $post->ID, 'project-type', '<b>Camps:</b> ', ', ', '.' ); ?></li>
				<?php if (get_field('project_extra')) : ?><li data-icon="<?php the_field('project_extra_icon'); ?>"><span class="project-charact-title"><?php the_field('project_extra_title'); ?>:</span> <?php the_field('project_extra'); ?></li><?php endif; ?>
				<?php if (get_field('project_extra_2')) : ?><li data-icon="<?php the_field('project_extra_2_icon'); ?>"><span class="project-charact-title"><?php the_field('project_extra_2_title'); ?>:</span> <?php the_field('project_extra_2'); ?></li><?php endif; ?>
				<?php if (get_field('project_collab')) : ?><li class="project-with" <?php if (get_field('project_collab_plural')) : ?>data-icon="collaborators" <?php else : ?>data-icon="collaborator"<?php endif; ?>><?php the_field('project_collab'); ?></li><?php endif; ?>
			</ul>
			<div class="project-description"><?php the_content(); ?></div>
		</section>

		<?php if(has_sub_field('project_content')) : ?>

			<section class="project-content">

				<?php while(has_sub_field('project_content')) : ?>

					<?php switch(get_row_layout()) :

						case 'img_full' :
							$img_id = get_field('project_img');
							wp_get_attachment_image($img_id, 'project-content', array('class' => 'project-img full', 'alt' => get_field('project_img_alt')));
							break;

						case 'img_half' :
							$img_id = get_field('project_img');
							wp_get_attachment_image($img_id, 'project-content-half', array('class' => 'project-img half', 'alt' => get_field('project_img_alt')));
							break;

						case 'video' :
							if(get_field('project_video_aspectratio') == '5:4') :
								$video_height = '862';
							else : // Aspect Ratio 16:9
								$video_height = '606';
							endif; ?>
							<iframe src="http://player.vimeo.com/video/<?php the_field('project_video_id'); ?>?portrait=0&color=a0220d" class="project-video" width="1078" height="<?php echo $video_height; ?>" frameborder="0" seamless webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
							<?php break;

						case 'issuu' : ?>
							<iframe width="1078" height="600" src="//e.issuu.com/embed.html#<?php the_field('project_issuu_id'); ?>" class="project-issuu" frameborder="0" seamless webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
							<?php break;

						case 'flash' :
							$flash_id = get_field('project_flash');
							$aspect_ratio = get_field('project_flash_aspectratio');
							$flash_height = round(1078/$aspect_ratio); ?>
							<object type="application/x-shockwave-flash" data="<?php wp_get_attachment_url($flash_id); ?>" width="1078" height="<?php echo $flash_height; ?>">
								<param name="movie" value="<?php wp_get_attachment_url($flash_id); ?>" />
								<param name="quality" value="high">
							</object>
							<?php break;

					endswitch; ?>

				<?php endwhile; ?>

			</section>

		<?php endif; ?>

	</article>

<?php endwhile; ?>

<?php get_footer(); ?>