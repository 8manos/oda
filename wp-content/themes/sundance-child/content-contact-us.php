<?php
$path = get_stylesheet_directory_uri() ;
?>

<article id="post-<?php the_ID(); ?>" class='clsFestPage3'>
	<div class='row'>
		<div class='col-xs-8 col-xs-offset-2 clsMapHead'>
				<?php the_title(); ?>
		</div>

	</div> <!-- row -->

	<div class='row'>
		<div class='col-xs-6 col-xs-offset-2 clsForm'>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'sundance' ) ); ?>
		</div>
		<div class='col-xs-4'>
			<div class='tinybear'>
			<?php
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				the_post_thumbnail('full');
			}
			?>
			</div>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
