<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */
?>

	<?php do_action( 'storefront_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-wrap">
			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				<div id="footer-sidebar" class="footer-sidebar" role="complementary">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div><!-- #footer-sidebar -->
			<?php endif; ?>
			<div class="copy">
				<div>&copy; <?php echo date('Y'); ?> Universole</div>
				<div class="social">
					<a href="http://www.twitter.com/universolehope" target="new" class="fa fa-twitter"></a>
					<a href="https://www.facebook.com/Universolehope" target="new" class="fa fa-facebook"></a>
				</div>
				<aside style="clear:both;"></aside>
			</div>
			<div class="watermark">
				<p>Designed and Developed by <a href="http://jordanriser.com" target="new">Jordan Riser</a> | Parent theme <a href="http://www.woothemes.com/storefront/" target="new">Storefront</a> by <a hef="http://www.woothemes.com/woocommerce/" target="new">WooCommerce</a></p>
			</div>
		</div><!-- .footer-wrap -->
	</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>
<script src="//localhost:35729/livereload.js"></script>
</body>
</html>
