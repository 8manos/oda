<?php
$path = get_stylesheet_directory_uri() ;
?>

<article id="post-<?php the_ID(); ?>" class='clsFestPage1'>

	<div class='row'>
		<div class='col-lg-4 text-right hidden-xs'>
			<img src='<?php echo $path ; ?>/img/people-moutain.png' class='imgMPple' />
		</div>
		<div class='col-lg-4 col-xs-12 text-center clsPageHead'>
				<?php the_title(); ?>
		</div>
		<div class='col-lg-4 hidden-xs'>
			<img src='<?php echo $path ; ?>/img/people-moutain.png ' class='imgMPple reverseImg' />
		</div>

	</div> <!-- row -->

	<div class='clearfix'>
		<div class="col-lg-8 col-lg-offset-2 clsFirstPageDesc">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'sundance' ) ); ?>
		</div>
		<div class='col-lg-2'></div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->