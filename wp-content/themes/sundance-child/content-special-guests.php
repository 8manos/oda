<?php
$path = get_stylesheet_directory_uri() ;
?>

<article id="post-<?php the_ID(); ?>" class='clsFestPage4'>
	<div class='row'>
		<div class='clsMapHead col-xs-8 col-xs-offset-2 col-lg-8 col-lg-offset-2 col-xs-offset-2 col-sm-11 col-sm-offset-1 '>
				<?php the_title(); ?>
		</div>

	</div> <!-- row -->

	<div class='row'>
		<div class='clsForm col-xs-10 col-xs-offset-1 col-lg-10 col-lg-offset-1 col-sm-offset-0'>
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
