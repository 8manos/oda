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
</article><!-- #post-<?php the_ID(); ?> -->
