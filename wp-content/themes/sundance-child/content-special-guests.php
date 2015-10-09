<?php
$path = get_stylesheet_directory_uri() ;
?>

<article id="post-<?php the_ID(); ?>" class='clsFestPage4'>
	<div class='row'>
		<div class='col-xs-8 col-xs-offset-2 clsMapHead'>
				<?php the_title(); ?>
		</div>

	</div> <!-- row -->

	<div class='row'>
		<div class='col-xs-10 col-xs-offset-1 clsForm'>
		<?php
		//Footer Widget
			if ( is_active_sidebar( 'guestsidebar' ) ) : ?>
			<div class="guestsidebar">
				<?php dynamic_sidebar( 'guestsidebar' ); ?>
			</div>
		<?php endif; ?>

		</div>
	</div>
	<?php
			$args = array( 'post_type' => 'guest', 'nopaging' => true, 'posts_per_page' => -1,'post_status'=>'publish' );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();?>	
	       <div class="modal fade" id="<?php echo $post->post_name; ?>" role="dialog" tabindex="-1">
						<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-body">
												<?php the_content(); ?>
										</div>
									</div>
								</div>
				  	</div>
	<?php endwhile; ?>
</article><!-- #post-<?php the_ID(); ?> -->
