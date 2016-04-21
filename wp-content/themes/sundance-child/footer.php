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


	<footer id="colophon"  role="contentinfo">
		<div class="site-footer">				
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
		</div>	
		
			<div class="clearfix footer_menu">
			<?php $currentlang = get_bloginfo('language');
					if($currentlang=="en-US"){
							wp_nav_menu( array(
									'menu' => 'footer_menu-eng'
							) );
					}else{
							wp_nav_menu( array(
									'menu' => 'footer_menu-esp'
							) );
					}
			?>
		</div><!--footer_menu-->
	</footer><!-- .site-footer .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>