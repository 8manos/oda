<?php
/**
 * @package Sundance
 * @since Sundance 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" class='clsHomeMiddle'>

	<div class='row'>
		<div class='col-lg-4 clsHomeHead'>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		</div>
		<div class="col-lg-8 clsHomeBody">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'sundance' ) ); ?>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->