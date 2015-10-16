<?php
$path = get_stylesheet_directory_uri() ;
?>

<article id="post-<?php the_ID(); ?>" class='clsFestPage3'>
	<div class='row'>
		<div class='col-lg-8 col-lg-offset-2 col-xs-10 col-xs-offset-1 clsMapHead'>
				<?php the_title(); ?>
		</div>

	</div> <!-- row -->

	<div class='row'>
		<div class='col-lg-6 col-lg-offset-2 col-xs-10 col-xs-offset-1 clsForm'>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'sundance' ) ); ?>
		</div>
		<div class='col-lg-4 col-xs-4'>
			<div class='tinybear hidden-xs hidden-sm'>
			<?php
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				the_post_thumbnail('full');
			}
			?>
			</div>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
