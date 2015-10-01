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
			<div class="col-lg-1"></div>
		  <?php 
					query_posts($query_string . '&orderby=date&order=ASC');
		    while ( have_posts() ) : the_post(); ?>
					<div class="col-lg-3 par">
						<?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>
						<div class="par-info">
							<span> <?php	the_title(); ?></span>
							<?php the_content(); ?>
						</div> 
					</div>
				<?php endwhile; ?>
				<div class="col-lg-1"></div>
			</div>	
		</div>
<?php get_footer(); ?>