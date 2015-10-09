	<?php
/**
 * @package Sundance
 * @since Sundance 1.0
 */
?>

<div class='clsLinkSection'>

	<header class="entry-header">

		<h2 class="sub-homelink-title">
			<img src="<?php echo get_stylesheet_directory_uri();?>/img/title-bg-hp.png"><?php echo __('atajos del oso','sundance'); ?><img src="<?php echo get_stylesheet_directory_uri();?>/img/title-bg-hp.png">
		</h2>

	</header><!-- .entry-header -->
	<div class='row'>
		<div class='col-lg-10 col-lg-offset-1 ' >

	<?php
	//make the sql to collect all page links
	$args = array(
		'post_type' => 'homelinks'
	);
	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) :
		while ( $the_query->have_posts() ) : $the_query->the_post();
			//the_content();
		?>
			<div class='col-lg-4 linkBox'>
				<a href='<?php echo get_the_content();?>'>
         <?php the_post_thumbnail('large') ?>
        </a>
      </div>

		<?php
	endwhile;
	endif;
	wp_reset_postdata();
	?>
		</div> <!-- col-lg-10 -->
	</div> <!-- row -->
	<div class='clsLinkSecfooter'>
	</div>
</div>
<div class='clear'></div>
