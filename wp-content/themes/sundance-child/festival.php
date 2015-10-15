<?php
/**
	Template Name: Festival Page

*/

get_header();
$path = get_stylesheet_directory_uri() ;
?>
<div id="primary" class="site-content festival">
	<div id="content" role="main">

			<div class='page1'>
			<div class="timg"> <img src='<?php echo $path ?>/img/festival-page1-top.png' class='img-responsive' /></div>
			<div class="text-center mimg">
				<div class=" clsxs">
					<div class="col-lg-8 fes-vid">
							<img src='<?php echo $path ?>/img/bear-hand.png' class='himg' />
						<?php while ( have_posts() ) : the_post(); 
						remove_filter ('the_content',  'wpautop'); 
							the_content(); 
							endwhile; 
							wp_reset_query(); 
					?>
					</div>
					<div class="col-lg-2 hidden-xs">
					<img class='sbear img-responsive' src='<?php echo $path ?>/img/small-bear.png'  />
					</div>
				</div>
     </div>
			<div class="bimg">
			 <!--   <img src='<?php echo $path ?>/img/festival-page1-bottom.png' class='img-responsive' />-->
			 </div>
		</div> <!-- page 1 -->
		
     
		 
		<div class='clearfix clsFestMenu'>
			<div class='col-lg-10 col-lg-offset-1' >
				<ul class=' nav nav-justified'>
				<?php
				//Creating menu
				$this_page_id=$post->ID;
				query_posts(array('showposts' => 20, 'post_parent' => $this_page_id, 'post_type' => 'page', 'orderby'=> 'menu_order' , 'order'=> 'asc'));

					while (have_posts()) { the_post();
						$post1 = get_post(get_the_ID());
						echo '<li><a href=#'.$post->post_name.'>' . get_the_title() . '</a></li>';
					}
				?>
				</ul>
			</div> <!-- col-lg-8 -->
		</div>
		<?php

		//find child pages

		query_posts(array('showposts' => 20, 'post_parent' => $this_page_id, 'post_type' => 'page', 'orderby'=> 'menu_order' , 'order'=> 'asc'));

    	while (have_posts()) { the_post();
						$post1 = get_post(get_the_ID());
    	?>

            <div class="subpage-img" id="<?php echo $post->post_name; ?>">
						<?php
							//echo $post1->post_name ;
							get_template_part( 'content', $post1->post_name);
						?>
            <!-- closes subpage-img -->
            </div>

        <?php }


		?>

	</div><!-- #content -->
</div><!-- #primary .site-content -->


<?php get_footer(); ?>