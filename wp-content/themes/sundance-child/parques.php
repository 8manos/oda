<?php
/**
 * Template Name: PARQUES Page
 *
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sundance
 * @since Sundance 1.0
 */

get_header(); ?>
		<div class="parques-banner text-center">
			<div class="banner-txt"><span><?php echo __('Parks', 'sundance'); ?></span></div>
		</div>
		<br/><br/>
		<div class="container">
		 <div class="parq_container">
			<div class="grid col-lg-offset-1 col-lg-10"> <!--style="border:1px solid red;">-->
				<div class='row'>
		  <?php
				$args=array(
					//'category__not_in' => $cid,
					'post_type' => 'post',
					'post_status' => 'publish',
					'posts_per_page' => -1,
				);
				$my_query = new WP_Query($args);
//         $p_count= $my_query->found_posts;
				$i=1 ; $my_query->found_posts;

		    while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
		    <?php
					if( $i==1 ) { ?>
						<div class="col-xs-12 grid-item visible-xs <?php echo $i;?>" >
							<div class="catbox1">
								<div class="indiv1">
									<p><?php echo __('NUEYSTROS PROJECTS', 'sundance'); ?></p>
									<ul class="list-unstyled">
								<?php
											$args = array('exclude'=>$cid,'hide_empty' => FALSE,'parent' => 0);
											$categories =get_categories( $args );
											foreach($categories as $category){
													echo '<li><a href="'.get_category_link( $category->term_id ).'">+&nbsp;'.$category->name.'</a></li>';
											}?>
									</ul>
								</div>
							</div>
						</div>
					<?php } ?>
					<div class="col-lg-4 grid-item " >
						<div  class="parq-box">
							<a  href="<?php the_permalink(); ?>">
								<?php
								if(get_video_thumbnail(get_the_ID() )!=""){
									?>
										<img class="OverlayIcon" src="<?php echo get_stylesheet_directory_uri();?>/img/play-button.png"/>
										<img class="img-responsive" src="<?php echo get_video_thumbnail(get_the_ID()); ?>" />
								
								<?php
								}else{
									the_post_thumbnail('full', array('class' => 'img-responsive parq-img'));
								}
								?>
							</a>
							<div class="parq-info">
								<a href="<?php the_permalink(); ?>"><span class="parq-title"> <?php	the_title(); ?></span></a>
								<div class="parq-content"><?php echo get_the_excerpt(); ?> <a class="more-link" href="<?php the_permalink(); ?>"><?php echo __('View More','sundance'); ?>+</a></div>
								<br/>
								<div class="parq-date"><img src="<?php echo get_stylesheet_directory_uri();?>/img/btn-arrow.png"> <?php echo get_the_date(); ?></div>
							</div>
						</div>
					</div>
					<?php
					if( $i==2 || ( $i == $my_query->found_posts &&  $my_query->found_posts < 3 ) ) { ?>
						<div class="col-lg-4 grid-item visible-lg <?php echo $i;?>" >
							<div class="catbox1">
								<div class="indiv1">
									<p><?php echo __('NUEYSTROS PROJECTS', 'sundance'); ?></p>
									<ul class="list-unstyled">
								<?php
											$args = array('exclude'=>$cid,'hide_empty' => FALSE,'parent' => 0);
											$categories =get_categories( $args );
											foreach($categories as $category){
													echo '<li><a href="'.get_category_link( $category->term_id ).'">+&nbsp;'.$category->name.'</a></li>';
											}?>
									</ul>
								</div>
							</div>
						</div>
					<?php } 
				
				$i++;
				endwhile; ?>
				</div> <!--row -->
			</div> <!-- col-lg-10 grid -->
			</div>
			<div class="parq-btn text-center col-lg-12 col-xs-12 clearfix">
				<?php  $page_id     = get_queried_object_id();?>
				<a href="<?php  echo get_post_meta($page_id, 'donation_link', true);?>">
					<span><?php echo __('You want to make a donation?','sundance'); ?></span>
				</a>
			</div>
		</div>
<?php get_footer(); ?>