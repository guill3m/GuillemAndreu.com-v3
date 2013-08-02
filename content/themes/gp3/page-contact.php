<?php
/**
 * @package WordPress
 * @subpackage GuillemAndreu.com
 * @since GuillemAndreu.com 3.0.0
 Template Name: Contact
 */


$success_response = '<h3>' . __('Everything is working fine', 'gp3') . '</h3><p><strong>' . __('Your message has been sent.', 'gp3') . '</strong></p><p>' . __('I\'ll contact you back, if applicable, as soon as I can.', 'gp3') . '</p><p>' . __('Thank you', 'gp3') . '.</p>';

$error_response = '<h3>' . __('A wild error appeared!', 'gp3') . '</h3><p>' . __('Oh, no. It seems that <strong>something went wrong and your message wasn\'t delivered.</strong>', 'gp3') . '</p><p>' . __('Please try again, or contact me directly at <a href=\'mailto:hi@guillemandreu.com\'>hi@guillemandreu.com</a>.', 'gp3') . '</p><p>' . __('Thank you', 'gp3') . '.</p>';

get_header(); ?>

<?php while(have_posts()) : the_post(); ?>

	<section id="contact-form" class="contact-form">
		<h1><?php the_title(); ?></h1>
		<div id="contact-content"><?php the_content(); ?></div>
		<form id="the-contact-form" data-success="<?php echo $success_response; ?>" data-error="<?php echo $error_response; ?>">
			<p><label for="contact-name" data-icon="person"><?php _e('Name', 'gp3'); ?>:</label></p>
			<p><input type="text" name="name" id="contact-name" class="contact-input" placeholder="<?php _e('Your name goes here', 'gp3'); ?>" required /></p>
			<p><label for="contact-email" data-icon="email"><?php _e('Email', 'gp3'); ?>:</label></p>
			<p><input type="email" name="email" id="contact-email" class="contact-input" placeholder="<?php _e('This way I can reply you, if necessary', 'gp3'); ?>" required /></p>
			<p><label for="contact-phone" data-icon="phone"><?php _e('Phone', 'gp3'); ?> <small>(<?php _e('optional', 'gp3'); ?>)</small>:</label></p>
			<p><input type="tel" name="phone" id="contact-phone" class="contact-input" placeholder="<?php _e('110% optional, just if you want to give me other way to contact you', 'gp3'); ?>" /></p>
			<p><label for="contact-subject"><?php _e('Subject', 'gp3'); ?>:</label></p>
			<p><input type="text" name="subject" id="contact-subject" class="contact-input" placeholder="<?php _e('What about or why are you contacting me?', 'gp3'); ?>" required /></p>
			<p><label for="contact-message"><?php _e('Message', 'gp3'); ?>:</label></p>
			<p><textarea name="message" id="contact-message" class="contact-textarea" placeholder="<?php _e('Finally, here is where you write the actual message, thank you', 'gp3'); ?>" required></textarea></p>
			<p><input type="submit" value="<?php _e('Submit', 'gp3'); ?>" name="submit" id="submit-contact-form" /></p>
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