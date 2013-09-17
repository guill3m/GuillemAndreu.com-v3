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
			<a href="#" id="project-more" class="project-more" data-icon="more"><?php _e('More', 'gp3'); ?></a>
		</header>

		<section id="project-charact" class="project-charact">
			<ul class="project-charact-list">
				<li data-icon="calendar"><span class="project-charact-title"><?php _e('Date', 'gp3'); ?>:</span> <?php the_field('project_date'); ?></li>
				<li data-icon="client"><span class="project-charact-title"><?php _e('Client', 'gp3'); ?>:</span> <?php if(get_field('project_client_url')) : ?><a href="<?php the_field('project_client_url'); ?>" target="_blank"><?php endif; the_field('project_client'); if(get_field('project_client_url')) : ?></a><?php endif; ?></li>
				<li data-icon="type"><span class="project-charact-title"><?php _e('Project type', 'gp3'); ?>:</span> <?php echo get_the_term_list( $post->ID, 'project-type', '', ', ', '' ); ?></li>
				<?php if(get_field('project_extra')) : ?>
					<?php while(has_sub_field('project_extra')) : ?>
						<li data-icon="<?php the_sub_field('project_extra_icon'); ?>"><span class="project-charact-title"><?php the_sub_field('project_extra_title'); ?>:</span> <?php the_sub_field('project_extra_content'); ?></li>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php if(get_field('project_collab')) : ?><li class="project-with" <?php if(get_field('project_collab_plural')) : ?>data-icon="collaborators" <?php else : ?>data-icon="collaborator"<?php endif; ?>><?php the_field('project_collab'); ?></li><?php endif; ?>
			</ul>
			<div class="project-description"><?php the_content(); ?></div>
		</section>

		<?php if(get_field('project_content')) : ?>

			<section class="project-content">

				<?php while(has_sub_field('project_content')) : ?>

					<?php switch(get_row_layout()) :

						case 'img_full' :
							$img_id = get_sub_field('project_img');
							$img_xxxs = wp_get_attachment_image_src($img_id, 'project-content-xxxs');
							$img_xxxs_2x = wp_get_attachment_image_src($img_id, 'project-content-xxxs-2x');
							$img_xxs = wp_get_attachment_image_src($img_id, 'project-content-xxs');
							$img_xxs_2x = wp_get_attachment_image_src($img_id, 'project-content-xxs-2x');
							$img_xs = wp_get_attachment_image_src($img_id, 'project-content-xs');
							$img_xs_2x = wp_get_attachment_image_src($img_id, 'project-content-xs-2x');
							$img_s = wp_get_attachment_image_src($img_id, 'project-content-s');
							$img_s_2x = wp_get_attachment_image_src($img_id, 'project-content-s-2x');
							$img_m = wp_get_attachment_image_src($img_id, 'project-content-m');
							$img_m_2x = wp_get_attachment_image_src($img_id, 'project-content-m-2x');
							$img_l = wp_get_attachment_image_src($img_id, 'project-content-l');
							$img_l_2x = wp_get_attachment_image_src($img_id, 'project-content-l-2x');
							$img_xl = wp_get_attachment_image_src($img_id, 'project-content-xl');
							$img_xl_2x = wp_get_attachment_image_src($img_id, 'project-content-xl-2x');
							$img_xxl = wp_get_attachment_image_src($img_id, 'project-content-xxl');
							$img_xxl_2x = wp_get_attachment_image_src($img_id, 'project-content-xxl-2x');
							$img_xxxl = wp_get_attachment_image_src($img_id, 'project-content-xxxl');
							$img_xxxl_2x = wp_get_attachment_image_src($img_id, 'project-content-xxxl-2x');
							echo '<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="' . get_sub_field('project_img_alt') . '" class="project-img full project-content-item" data-responsive data-responsive-xxxs="' . $img_xxxs[0] . '" data-responsive-xxxs-2x="' . $img_xxxs_2x[0] . '" data-responsive-xxs="' . $img_xxs[0] . '" data-responsive-xxs-2x="' . $img_xxs_2x[0] . '" data-responsive-xs="' . $img_xs[0] . '" data-responsive-xs-2x="' . $img_xs_2x[0] . '" data-responsive-s="' . $img_s[0] . '" data-responsive-s-2x="' . $img_s_2x[0] . '" data-responsive-m="' . $img_m[0] . '" data-responsive-m-2x="' . $img_m_2x[0] . '" data-responsive-l="' . $img_l[0] . '" data-responsive-l-2x="' . $img_l_2x[0] . '" data-responsive-xl="' . $img_xl[0] . '" data-responsive-xl-2x="' . $img_xl_2x[0] . '" data-responsive-xxl="' . $img_xxl[0] . '" data-responsive-xxl-2x="' . $img_xxl_2x[0] . '" data-responsive-xxxl="' . $img_xxxl[0] . '" data-responsive-xxxl-2x="' . $img_xxxl_2x[0] . '" />';
							break;

						case 'img_half' :
							$img_id = get_sub_field('project_img');
							$img_xxxs = wp_get_attachment_image_src($img_id, 'project-content-xxxs');
							$img_xxxs_2x = wp_get_attachment_image_src($img_id, 'project-content-xxxs-2x');
							$img_xxs = wp_get_attachment_image_src($img_id, 'project-content-xxs');
							$img_xxs_2x = wp_get_attachment_image_src($img_id, 'project-content-xxs-2x');
							$img_xs = wp_get_attachment_image_src($img_id, 'project-content-xs');
							$img_xs_2x = wp_get_attachment_image_src($img_id, 'project-content-xs-2x');
							$img_s = wp_get_attachment_image_src($img_id, 'project-content-half-s');
							$img_s_2x = wp_get_attachment_image_src($img_id, 'project-content-half-s-2x');
							$img_m = wp_get_attachment_image_src($img_id, 'project-content-half-m');
							$img_m_2x = wp_get_attachment_image_src($img_id, 'project-content-half-m-2x');
							$img_l = wp_get_attachment_image_src($img_id, 'project-content-half-l');
							$img_l_2x = wp_get_attachment_image_src($img_id, 'project-content-half-l-2x');
							$img_xl = wp_get_attachment_image_src($img_id, 'project-content-half-xl');
							$img_xl_2x = wp_get_attachment_image_src($img_id, 'project-content-half-xl-2x');
							$img_xxl = wp_get_attachment_image_src($img_id, 'project-content-half-xxl');
							$img_xxl_2x = wp_get_attachment_image_src($img_id, 'project-content-half-xxl-2x');
							$img_xxxl = wp_get_attachment_image_src($img_id, 'project-content-half-xxxl');
							$img_xxxl_2x = wp_get_attachment_image_src($img_id, 'project-content-half-xxxl-2x');
							echo '<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="' . get_sub_field('project_img_alt') . '" class="project-img half project-content-item" data-responsive data-responsive-xxxs="' . $img_xxxs[0] . '" data-responsive-xxxs-2x="' . $img_xxxs_2x[0] . '" data-responsive-xxs="' . $img_xxs[0] . '" data-responsive-xxs-2x="' . $img_xxs_2x[0] . '" data-responsive-xs="' . $img_xs[0] . '" data-responsive-xs-2x="' . $img_xs_2x[0] . '" data-responsive-s="' . $img_s[0] . '" data-responsive-s-2x="' . $img_s_2x[0] . '" data-responsive-m="' . $img_m[0] . '" data-responsive-m-2x="' . $img_m_2x[0] . '" data-responsive-l="' . $img_l[0] . '" data-responsive-l-2x="' . $img_l_2x[0] . '" data-responsive-xl="' . $img_xl[0] . '" data-responsive-xl-2x="' . $img_xl_2x[0] . '" data-responsive-xxl="' . $img_xxl[0] . '" data-responsive-xxl-2x="' . $img_xxl_2x[0] . '" data-responsive-xxxl="' . $img_xxxl[0] . '" data-responsive-xxxl-2x="' . $img_xxxl_2x[0] . '" />';
							break;

						case 'video' :
							if(get_sub_field('project_video_aspectratio') == '5:4') :
								$video_height = '80%';
							else : // Aspect Ratio 16:9
								$video_height = '56.25%';
							endif; ?>
							<div class="project-video project-content-item" style="padding-bottom:<?php echo $video_height; ?>"><iframe src="http://player.vimeo.com/video/<?php the_sub_field('project_video_id'); ?>?portrait=0&color=a0220d" frameborder="0" seamless webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
							<?php break;

						case 'issuu' : ?>
							<div class="project-issuu project-content-item"><iframe src="//e.issuu.com/embed.html#<?php the_sub_field('project_issuu_id'); ?>" frameborder="0" seamless webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
							<?php break;

						case 'flash' :
							$flash_id = get_sub_field('project_flash');
							$aspect_ratio = get_sub_field('project_flash_aspectratio');
							$flash_height = round(1078/$aspect_ratio); ?>
							<object class="project-flash project-content-item" type="application/x-shockwave-flash" data="<?php wp_get_attachment_url($flash_id); ?>" width="1078" height="<?php echo $flash_height; ?>">
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