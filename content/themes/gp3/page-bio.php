<?php
/**
 * @package WordPress
 * @subpackage GuillemAndreu.com
 * @since GuillemAndreu.com 3.0.0
 Template Name: Bio
 */
?>


<?php get_header(); ?>

<?php while(have_posts()) : the_post(); ?>

	<article id="bio" class="bio">

		<header id="bio-header" class="bio-header">
			<h1 class="bio-name"><?php the_field('bio_name'); ?> <span class="bio-lastname"><?php the_field('bio_lastname'); ?></span></h1>
			<div class="bio-picture">
				<img src="<?php the_field('bio_picture'); ?>" alt="<?php _e('Picture', 'gp3') . echo ': ' . the_field('bio_name') . echo ' ' . the_field('bio_lastname'); ?>" />
			</div>
			<ul class="bio-details"><!--
				--><li class="bio-birthday" data-icon="calendar"><?php the_field('bio_birthday'); ?></li><!--
				--><li class="bio-location" data-icon="location"><?php the_field('bio_location'); ?>, <span class="bio-country"><?php the_field('bio_Country'); ?></span></li>
			</ul>
		</header>

		<div class="bio-left">
			<section id="bio-description" class="bio-description">
				<?php the_content(); ?>
			</section>

			<?php if(has_sub_field('bio_experience')) : ?>
				<div class="bio-left-left">
					<section id="bio-experience">
						<h2 class="bio-title"><?php _e('Experience', 'gp3'); ?></h2>
						<ul>
							<?php while(has_sub_field('bio_experience')) : ?>
								<li class="bio-job">
									<p class="bio-job-title"><span class="bio-company"><?php if(get_field('bio_job_company_url')) : ?><a href="<?php the_field('bio_job_company_url'); ?>" target="_blank"><?php endif; the_field('bio_job_company'); if(get_field('bio_job_company_url')) : ?></a><?php endif; ?></span> | <?php the_field('bio_job_title'); ?></p>
									<p class="bio-job-description"><?php the_field('bio_job_description'); ?></p>
									<p class="bio-job-lenght"><?php _e('From', 'gp3') . echo ' ' . the_field('bio_job_lenght_from'); if(get_field('bio_job_lenght_ended')) { _e('to', 'gp3') . echo ' ' . the_field('bio_job_lenght_ended'); } ?></p>
								</li>
							<?php endwhile; ?>
						</ul>
					</section>
				</div>
			<?php endif; ?>

			<?php if(has_sub_field('bio_studies') || has_sub_field('bio_courses') || has_sub_field('bio_others')) : ?>
				<div class="bio-left-right">

					<?php if(has_sub_field('bio_studies')) : ?>
						<section id="bio-studies">
							<h2 class="bio-title"><?php _e('Studies', 'gp3'); ?></h2>
							<ul>
								<?php while(has_sub_field('bio_studies')) : ?>
									<li class="bio-career">
										<p class="bio-career-name"><?php the_field('bio_career_name'); ?></p>
										<p class="bio-career-center"><?php if(get_field('bio_career_center_url')) : ?><a href="<?php the_field('bio_career_center_url'); ?>" target="_blank"><?php endif; the_field('bio_career_center'); if(get_field('bio_career_center_url')) : ?></a><?php endif; ?>, <span class="bio-career-ended"><?php the_field('bio_career_ended'); ?></span></p>
									</li>
								<?php endwhile; ?>
							</ul>
						</section>
					<?php endif; ?>

					<?php if(has_sub_field('bio_courses')) : ?>
						<section id="bio-courses">
							<h2 class="bio-title"><?php _e('Courses', 'gp3'); ?></h2>
							<ul>
								<?php while(has_sub_field('bio_courses')) : ?>
									<li class="bio-course">
										<p class="bio-course-name"><?php the_field('bio_course_name'); ?></p>
										<p class="bio-course-center"><?php if(get_field('bio_course_center_url')) : ?><a href="<?php the_field('bio_course_center_url'); ?>" target="_blank"><?php endif; the_field('bio_course_center'); if(get_field('bio_course_center_url')) : ?></a><?php endif; ?>, <span class="course-lenght"><?php the_field('bio_course_lenght'); ?></span>. <span class="bio-course-date"><?php the_field('bio_course_date'); ?></span></p>
									</li>
								<?php endwhile; ?>
							</ul>
						</section>
					<?php endif; ?>

					<?php if(has_sub_field('bio_others')) : ?>
						<section id="bio-others">
							<h2 class="bio-title"><?php _e('Others', 'gp3'); ?></h2>
							<ul>
								<?php while(has_sub_field('bio_courses')) : ?>
									<li class="bio-other">
										<p class="bio-other-name"><?php the_field('bio_other_name'); ?></p>
										<p class="bio-other-description"><?php the_field('bio_other_description'); ?></p>
									</li>
								<?php endwhile; ?>
							</ul>
						</section>
					<?php endif; ?>

				</div>
			<?php endif; ?>

		</div>

		<?php if(has_sub_field('bio_languages') || has_sub_field('bio_skills') : ?>
			<div class="bio-right">

				<?php if(has_sub_field('bio_languages') : ?>
					<section id="bio-languages">
						<h2 class="bio-title"><?php _e('Languages', 'gp3'); ?></h2>
						<ul>
							<?php while(has_sub_field('bio_languages') : ?>
								<li>
									<p class="bio-skill level<?php the_field('bio_language_level'); ?>"><?php the_field('bio_language'); ?></p>
									<p class="bio-language-level"><?php the_field('bio_language_level_txt'); ?></p>
								</li>
							<?php endwhile; ?>
						</ul>
					</section>
				<?php endif; ?>

				<?php if(has_sub_field('bio_skills') : ?>
					<section id="bio-skills">
						<h2 class="bio-title"><?php _e('Skills', 'gp3'); ?></h2>
						<?php while(has_sub_field('bio_skillset') : ?>
							<h3 class="bio-subtitle"><?php the_field('bio_skillset_title'); ?></h3>
							<?php if(has_sub_field('bio_skillset_skills') : ?>
								<ul>
									<?php while(has_sub_field('bio_skillset_skills') : ?>
										<li class="bio-skill level<?php the_field('bio_skill_level'); ?>"><?php the_field('bio_skill'); ?></li>
									<?php endwhile; ?>
								</ul>
							<?php endif; ?>
						<?php endwhile; ?>
					</section>
				<?php endif; ?>

			</div>
		<?php endif; ?>

	</article>

<?php endwhile; ?>

<?php get_footer(); ?>