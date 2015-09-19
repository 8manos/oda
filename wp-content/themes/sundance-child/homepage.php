<?php
/**
	Template Name: Home Page

*/

get_header(); ?>
<div id="primary" class="site-content homepage">
			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>
					<?php echo do_shortcode("[huge_it_slider id='2']"); ?>
					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						//This will be used to show home links
						get_template_part( 'content', 'homelinks' );

						get_template_part( 'home-content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php //sundance_content_nav( 'nav-below' ); ?>

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