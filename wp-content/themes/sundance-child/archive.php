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
			<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
		  <?php 
					query_posts($query_string . '&orderby=date&order=ASC');
		    while ( have_posts() ) : the_post(); ?>
					<div class="col-lg-4 ">
					<div  class="parq-box">
						<?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
						<div class="parq-info">
							<span class="parq-title"> <?php	the_title(); ?></span>
							<span class="parq-content"><?php the_content(); ?></span>
							<hr/>
						</div> 
					</div>
					</div>
				<?php endwhile; ?>
				</div>
			</div>	
		</div>
<?php get_footer(); ?>