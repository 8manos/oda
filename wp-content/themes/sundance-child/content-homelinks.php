	<?php
/**
 * @package Sundance
 * @since Sundance 1.0
 */
?>

<div class='clsLinkSection'>

	<header class="entry-header">

		<h2 class="sub-homelink-title">
			<img src="<?php echo get_stylesheet_directory_uri();?>/img/title-bg-hp.png"><?php echo __('Bear shortcuts','sundance'); ?><img src="<?php echo get_stylesheet_directory_uri();?>/img/title-bg-hp.png">
		</h2>

	</header><!-- .entry-header -->
	<div class='row'>
		<div class='col-lg-10 col-lg-offset-1 ' >
		<div class="row-fluid">
	<?php
	//make the sql to collect all page links
	$args = array(
		'post_type' => 'homelinks'
	);
	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) :
		$i=0;
		?>
<!-- 		<div class="row-fluid"> -->
		<?php
		while ( $the_query->have_posts() ) : $the_query->the_post();
			//the_content();
			//if($i==3){ ?>
			<!--</div>-->
			
			<?php //} ?>
			
			<div class='col-lg-4 col-sm-6 linkBox text-center'>
				<a href='<?php echo get_the_excerpt();?>'>
         <?php the_post_thumbnail('medium') ?>
        </a>
      </div>
      
      <?php
				//if($i==5){ ?>
					<!--</div>-->
			<?php// } ?>
			
		<?php
		$i++;
	endwhile;
	?>
<!-- 	</div> -->
	<div class="clearfix">
	</div>
	<?php
	endif;
	wp_reset_postdata();
	?>	
			<!--</div>-->
		</div> <!-- col-lg-10 -->
	</div> <!-- row -->
	<div class='clsLinkSecfooter'>
	</div>
</div>
<div class='clear'></div>
