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

<?php if(has_sub_field('social_links')) : ?>
<aside id="contact-social" class="contact-social">
	<h2><?php _e('Where to find me'); ?></h2>
	<ul>
		<?php while(has_sub_field('social_links', 'option')) : ?>
			<li data-icon="<?php the_field('social_icon', 'option'); ?>"><a href="<?php the_field('social_url', 'option'); ?>"><?php the_field('social_name', 'option'); ?></a></li>
		<?php endwhile; ?>
	</ul>
</aside>
<?php endif; ?>

<?php get_footer(); ?>