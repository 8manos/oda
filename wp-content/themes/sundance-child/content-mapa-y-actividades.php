<?php
$path = get_stylesheet_directory_uri() ;
?>

<article id="post-<?php the_ID(); ?>" class='clsFestPage2'>

	<div class='row'>
		<div class='col-xs-12 text-center clsMapHead'>
				<?php the_title(); ?>
		</div>

	</div> <!-- row -->

	<div class='row'>
		<div class='col-lg-2 col-lg-offset-2 col-xs-4 col-xs-offset-1'>
			<?php
				$link1= get_post_meta ( $post->ID , 'link_mapa',true);
			?>
			<a id="view_map" class='clsMapBtn' href='<?php echo $link1 ; ?>'>
				<?php echo __( 'View Map', 'sundance' ); ?>
			</a>
			<span class='clsDecoFont hidden-xs'></span>
			<div class='mapFont'>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'sundance' ) ); ?>
			</div>
			<span class='clsDecoFont hidden-xs'></span>
		</div>
		<div class="col-lg-2 col-lg-offset-3 clsMapPageDesc col-xs-5 col-xs-offset-0">
			<?php
				$link2 = get_post_meta ( $post->ID , 'link_actividadas',true);
			?>
			<a id="view_act" class='clsActBtn' href='<?php echo $link2 ?>'>
				<?php echo __( 'View Activities', 'sundance' ); ?>
			</a>
		</div>
		<div class='col-lg-4 hidden-xs'></div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
