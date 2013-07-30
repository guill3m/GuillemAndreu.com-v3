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
		<div id="contact-content"><?php the_content(); ?></div>
		<form action="#">
			<p><label for="contact-name" data-icon="person"><?php _e('Name', 'gp3'); ?>:</label></p>
			<p><input type="text" name="name" id="contact-name" class="contact-input" placeholder="<?php _e('Your name goes here', 'gp3'); ?>" required /></p>
			<p><label for="contact-email" data-icon="email"><?php _e('Email', 'gp3'); ?>:</label></p>
			<p><input type="mail" name="email" id="contact-email" class="contact-input" placeholder="<?php _e('This way I can reply you, if necessary', 'gp3'); ?>" required /></p>
			<p><label for="contact-phone" data-icon="phone"><?php _e('Phone', 'gp3'); ?> <small>(<?php _e('optional', 'gp3'); ?>)</small>:</label></p>
			<p><input type="tel" name="phone" id="contact-phone" class="contact-input" placeholder="<?php _e('110% optional, just if you want to give me other way to contact you', 'gp3'); ?>" /></p>
			<p><label for="contact-subject"><?php _e('Subject', 'gp3'); ?>:</label></p>
			<p><input type="text" name="subject" id="contact-subject" class="contact-input" placeholder="<?php _e('What about or why are you contacting me?', 'gp3'); ?>" /></p>
			<p><label for="contact-message"><?php _e('Message', 'gp3'); ?>:</label></p>
			<p><textarea name="message" id="contact-message" class="contact-textarea" placeholder="<?php _e('Finally, here is where you write the actual message, thank you', 'gp3'); ?>"></textarea></p>
			<p><input type="submit" value="Submit" name="submit" id="submit-contact-form" /></p>
		</form>
	</section>

<?php endwhile; ?>

<?php if(get_field('social_links', 'option')) : ?>
<aside id="contact-social" class="contact-social">
	<h2><?php _e('Where to find me', 'gp3'); ?></h2>
	<ul>
		<?php while(has_sub_field('social_links', 'option')) : ?>
			<li data-icon="<?php the_sub_field('social_icon'); ?>"><a href="<?php the_sub_field('social_url'); ?>"><?php the_sub_field('social_name'); ?></a></li>
		<?php endwhile; ?>
	</ul>
</aside>
<?php endif; ?>

<?php get_footer(); ?>