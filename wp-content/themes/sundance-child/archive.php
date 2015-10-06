<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sundance
 * @since Sundance 1.0
 */

get_header(); ?>
		<div class="parques-banner text-center">
			<div class="banner-txt"><span>PARQUES</span></div>
		</div>
		<br/><br/>
		<div class="container">
			<div class="grid col-lg-offset-1 col-lg-10"> <!--style="border:1px solid red;">-->
		  <?php 
					query_posts($query_string . '&orderby=date&order=ASC&cat=-10');
					
		    while ( have_posts() ) : the_post(); ?>
					<div class="col-lg-4 grid-item " style="width:300px;">
					<div  class="parq-box">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full', array('class' => 'img-responsive parq-img')); ?></a>
						<div class="parq-info">
							<a href="<?php the_permalink(); ?>"><span class="parq-title"> <?php	the_title(); ?></span></a>
							<div class="parq-content"><?php echo get_the_content(); ?> <a class="more-link" href="<?php the_permalink(); ?>">VER MAS+</a></div>
							<br/>
							<div class="parq-date"><img src="<?php echo get_stylesheet_directory_uri();?>/img/btn-arrow.png"> <?php echo get_the_date(); ?></div>
						</div> 
					</div>
					</div>
				<?php endwhile; ?>
			</div>
			<div class="parq-btn text-center col-lg-12 clearfix">
			<span>? QUiERES HACER UNA DONACION</span>
			</div>
		</div>
<?php get_footer(); ?>