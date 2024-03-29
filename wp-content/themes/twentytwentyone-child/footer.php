<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->

<?php get_template_part('template-parts/footer/footer-widgets'); ?>

<footer id="colophon" class="site-footer">

	<?php if (has_nav_menu('footer')) : ?>
		<nav aria-label="<?php esc_attr_e('Secondary menu', 'twentytwentyone'); ?>" class="footer-navigation">
			<ul class="footer-navigation-wrapper">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'items_wrap'     => '%3$s',
						'container'      => false,
						'depth'          => 1,
						'link_before'    => '<span>',
						'link_after'     => '</span>',
						'fallback_cb'    => false,
					)
				);
				?>
			</ul><!-- .footer-navigation-wrapper -->
		</nav><!-- .footer-navigation -->
	<?php endif; ?>
	<div class="site-info">
		<div class="site-name">
			<?php if (has_custom_logo()) : ?>
				<div class="site-logo"><?php the_custom_logo(); ?></div>
			<?php else : ?>
				<?php if (get_bloginfo('name') && get_theme_mod('display_title_and_tagline', true)) : ?>
					<?php if (is_front_page() && !is_paged()) : ?>
						<?php bloginfo('name'); ?>
					<?php else : ?>
						<a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
					<?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>
		</div><!-- .site-name -->

		<?php
		if (function_exists('the_privacy_policy_link')) {
			the_privacy_policy_link('<div class="privacy-policy">', '</div>');
		}
		?>

		<div class="powered-by">
			<?php
			printf(
				/* translators: %s: WordPress. */
				esc_html__('Proudly powered by %s.', 'twentytwentyone'),
				'<a href="' . esc_url(__('https://wordpress.org/', 'twentytwentyone')) . '">WordPress</a>'
			);
			?>
		</div><!-- .powered-by -->

	</div><!-- .site-info -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
	<script>
		$(document).ready(function() {
			$('.child').draggable({	
				//cursor: 'move',
				helper: "clone",
				//revert:"false"
			});
			/**$("#container1").droppable({
				drop: function(event, ui) {
					var itemid = $(event.originalEvent.toElement).attr("itemid");
					$('.child').each(function() {
						if ($(this).attr("itemid") === itemid) {
							$(this).appendTo("#container1");
						}
					});
				}
			});*/

			$("#container2").droppable({
				drop: function(event, ui) {
					//$(event.originalEvent.toElement).attr("itemid").hide();
					var itemid = $(event.originalEvent.toElement).html();
					//alert(itemid);
					$('.child').each(function() {
						if ($(this).html() === itemid) {
							$(this).appendTo("#container2");
						}

					});

					$.ajax({
						method: "POST",
						dataType: "json",
						url: "<?php echo get_stylesheet_directory_uri(); ?>/template/insert.php",
						data: {
							value: itemid,
						},
						success: function(result) {
							console.log(result);
						}
					});
				},
			});

		});

		/**$.ajax({
			method: "GET",
			dataType: "json",
			url: '<?php echo get_stylesheet_directory_uri(); ?>/template/chk_data.php',
			success: function(result) {
				alert(result);
			}
		});*/
	</script>

<script>
var random = Math.floor(Math.random() * 100000000);
const value = ('; '+document.cookie).split(`; cookie_id=`).pop().split(';')[0];
if(value == ''){
document.cookie = "cookie_id=" +random;
console.log(document.cookie);
}
</script>
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>