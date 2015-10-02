<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sundance
 * @since Sundance 1.0
 */

get_header(); ?>
		<div class="talleres-banner text-center">
			<div class="banner-txt"><span>TALLERES</span></div>
		</div>
		<div class="container workshops">
			<div class="row">
		<h1 class="head">? QUE TE GUSTA	HACER?</h1>				
		<div class="text-center  work-cat">
			<ul class="list-inline">
			<?php
			$args = array('child_of'     => '12'); //locally at runwal3 24
			$categories =get_categories( $args );
			foreach($categories as $category){
				echo '<li>'.$category->name.'</li>';
			}
			?>
			</ul>
		</div>
			<?php 
			query_posts($query_string . '&orderby=date&order=ASC');
			if ( have_posts() ) : ?>
				<div class="clearfix">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="col-lg-4 work-box">
							<div>
								<?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>
								<div class="work-info">
									<span class="work-auth">
										<?php $categories = get_the_category(); 
									echo $cat_name = $categories[0]->cat_name;  ?>
									</span>
									<h3 class="work-title"><?php the_title();?> </h3>
								</div>
							</div>
						</div>
				<?php endwhile; ?>
				</div>	
				<?php sundance_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'sundance' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'sundance' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</div><!-- #primary .site-content -->


<?php get_footer(); ?>