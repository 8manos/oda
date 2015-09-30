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
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
		<div class="container games">
			<div class="row">
<?php 
			query_posts($query_string . '&orderby=date&order=ASC');
			if ( have_posts() ) : ?>
				
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="col-lg-4 game-box">
						<div>
							<?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>
							<div class="game-info">
							 <span class="game-auth"><?php echo get_post_meta($post->ID, 'author', true); ?></span>
						  	<h3 class="game-title"><?php the_title();?> </h3>
							</div>
							<div class="caption" style="position:relative;">111111111</div>
						</div>
				  </div>
				<?php endwhile; ?>
			
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

<?php //get_sidebar(); ?>
<?php get_footer(); ?>