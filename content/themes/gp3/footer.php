<?php
/**
 * @package WordPress
 * @subpackage GuillemAndreu.com
 * @since GuillemAndreu.com 3.0.0
 */
?>


			<footer id="footer" class="footer">
				<p><small>© 2010–<?php echo date('Y'); ?> Guillem Andreu</small></p>
			</footer>

		</div><!-- END .wrapper -->

		<?php wp_footer(); ?>

		<?php if(is_front_page()) : ?>
			<script>
				$(function() {
					$('#home-slide').unslider({
						speed: 500,
						delay: 3000,
						keys:  true,
						dots:  true,
						fluid: true
					});
				});
			</script>
		<?php endif; ?>

	</body>

</html>