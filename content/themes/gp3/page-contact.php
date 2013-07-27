<?php
/**
 * @package WordPress
 * @subpackage GuillemAndreu.com
 * @since GuillemAndreu.com 3.0.0
 Template Name: Contact
 */
?>


<?php get_header(); ?>

<?php while(have_posts()) : the_post(); ?>

	<section id="contact-form" class="contact-form">
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
		<form action="#">
			<p><label for="contact-name" data-icon="person"><?php _e('Name'); ?>:</label></p>
			<p><input type="text" name="name" id="contact-name" class="contact-input" placeholder="<?php _e('Your name goes here'); ?>" required /></p>
			<p><label for="contact-email" data-icon="email"><?php _e('Email'); ?>:</label></p>
			<p><input type="mail" name="email" id="contact-email" class="contact-input" placeholder="<?php _e('This way I can reply you, if necessary'); ?>" required /></p>
			<p><label for="contact-phone" data-icon="phone"><?php _e('Phone'); ?> <small>(<?php _e('optional'); ?>)</small>:</label></p>
			<p><input type="tel" name="phone" id="contact-phone" class="contact-input" placeholder="<?php _e('110% optional, just if you want to give me other way to contact you'); ?>" /></p>
			<p><label for="contact-subject"><?php _e('Subject'); ?>:</label></p>
			<p><input type="text" name="subject" id="contact-subject" class="contact-input" placeholder="<?php _e('What about or why are you contacting me?'); ?>" /></p>
			<p><label for="contact-message"><?php _e('Message'); ?>:</label></p>
			<p><textarea name="message" id="contact-message" class="contact-textarea" placeholder="<?php _e('Finally, here is where you write the actual message, thank you'); ?>"></textarea></p>
		</form>
	</section>

<?php endwhile; ?>


<aside id="contact-social" class="contact-social">
	<h2><?php _e('Where to find me'); ?></h2>
	<ul>
		<?php if (get_field('social_adcv_show', 'option')) : ?>
			<li data-icon="ADCV"><a href="<?php the_field('social_adcv_url', 'option'); ?>"><?php gthe_field('social_adcv_name', 'option'); ?></a></li>
		<?php endif; ?>
		<?php if (get_field('social_behance_show', 'option')) : ?>
			<li data-icon="Behance"><a href="<?php the_field('social_behance_url', 'option'); ?>"><?php the_field('social_behance_name', 'option'); ?></a></li>
		<?php endif; ?>
		<?php if (get_field('social_dribble_show', 'option')) : ?>
			<li data-icon="Dribble"><a href="<?php the_field('social_dribble_url', 'option'); ?>"><?php gthe_field('social_dribble_name', 'option'); ?></a></li>
		<?php endif; ?>
		<?php if (get_field('social_facebook_show', 'option')) : ?>
			<li data-icon="Facebook"><a href="<?php the_field('social_facebook_url', 'option'); ?>"><?php gthe_field('social_facebook_name', 'option'); ?></a></li>
		<?php endif; ?>
		<?php if (get_field('social_flickr_show', 'option')) : ?>
			<li data-icon="Flickr"><a href="<?php the_field('social_flickr_url', 'option'); ?>"><?php gthe_field('social_flickr_name', 'option'); ?></a></li>
		<?php endif; ?>
		<?php if (get_field('social_github_show', 'option')) : ?>
			<li data-icon="GitHub"><a href="<?php the_field('social_github_url', 'option'); ?>"><?php gthe_field('social_github_name', 'option'); ?></a></li>
		<?php endif; ?>
		<?php if (get_field('social_googleplus_show', 'option')) : ?>
			<li data-icon="Google+"><a href="<?php the_field('social_googleplus_url', 'option'); ?>"><?php gthe_field('social_googleplus_name', 'option'); ?></a></li>
		<?php endif; ?>
		<?php if (get_field('social_instagram_show', 'option')) : ?>
			<li data-icon="Instagram"><a href="<?php the_field('social_instagram_url', 'option'); ?>"><?php gthe_field('social_instagram_name', 'option'); ?></a></li>
		<?php endif; ?>
		<?php if (get_field('social_lastfm_show', 'option')) : ?>
			<li data-icon="Last.fm"><a href="<?php the_field('social_lastfm_url', 'option'); ?>"><?php gthe_field('social_lastfm_name', 'option'); ?></a></li>
		<?php endif; ?>
		<?php if (get_field('social_linkedin_show', 'option')) : ?>
			<li data-icon="LinkedIn"><a href="<?php the_field('social_linkedin_url', 'option'); ?>"><?php gthe_field('social_linkedin_name', 'option'); ?></a></li>
		<?php endif; ?>
		<?php if (get_field('social_skype_show', 'option')) : ?>
			<li data-icon="Skype"><a href="<?php the_field('social_skype_url', 'option'); ?>"><?php gthe_field('social_skype_name', 'option'); ?></a></li>
		<?php endif; ?>
		<?php if (get_field('social_twitter_show', 'option')) : ?>
			<li data-icon="Twitter"><a href="<?php the_field('social_twitter_url', 'option'); ?>"><?php gthe_field('social_twitter_name', 'option'); ?></a></li>
		<?php endif; ?>
		<?php if (get_field('social_vimeo_show', 'option')) : ?>
			<li data-icon="Vimeo"><a href="<?php the_field('social_vimeo_url', 'option'); ?>"><?php gthe_field('social_vimeo_name', 'option'); ?></a></li>
		<?php endif; ?>
	</ul>
</aside>

<?php get_footer(); ?>