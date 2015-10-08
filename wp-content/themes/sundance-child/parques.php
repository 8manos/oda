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
			<div class="banner-txt"><span><?php echo __('PARQUES', 'sundance'); ?></span></div>
		</div>
		<br/><br/>
		<div class="container">
			<div class="grid col-lg-offset-1 col-lg-10"> <!--style="border:1px solid red;">-->
		  <?php
		  $slug=array('games','recomienda');
		  foreach($slug as $sl){;
		  $category = get_category_by_slug($sl);
      $cid[]=$category->term_id;
		  }
				$args=array(
					'category__not_in' => $cid,
					'post_type' => 'post',
					'post_status' => 'publish',
					'posts_per_page' => -1,
				);
				$my_query = null;
				$my_query = new WP_Query($args);
		    while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
					<div class="col-lg-4 grid-item " style="width:300px;">
					<div  class="parq-box">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full', array('class' => 'img-responsive parq-img')); ?></a>
						<div class="parq-info">
							<a href="<?php the_permalink(); ?>"><span class="parq-title"> <?php	the_title(); ?></span></a>
							<div class="parq-content"><?php the_excerpt(); ?> <a class="more-link" href="<?php the_permalink(); ?>">VER MAS+</a></div>
							<br/>
							<div class="parq-date"><img src="<?php echo get_stylesheet_directory_uri();?>/img/btn-arrow.png"> <?php echo get_the_date(); ?></div>
						</div>
					</div>
					</div>
				<?php endwhile; ?>
			</div>
			<div class="parq-btn text-center col-lg-12 clearfix">
			<span><?php echo __('? QUiERES HACER UNA DONACION','sundance') ?></span>
			</div>
		</div>
<?php get_footer(); ?>