<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Sundance
 * @since Sundance 1.0
 */
?>
	</div> <!-- container -->
	</div><!-- #main -->


	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
		//Footer Widget
			if ( is_active_sidebar( 'footersidebar' ) ) : ?>
			<div class="footersidebar">
				<?php dynamic_sidebar( 'footersidebar' ); ?>
			</div>
		<?php endif; ?>

		<div class="site-info">
			<?php //do_action( 'sundance_credits' ); ?>
			<?php	if ( is_active_sidebar( 'copyrightsidebar' ) ) : 
							dynamic_sidebar( 'copyrightsidebar' ); 
							endif; ?>
		</div><!-- .site-info -->
	</footer><!-- .site-footer .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>