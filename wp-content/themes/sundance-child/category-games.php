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
		<div class="juegos-banner text-center">
			<div class="banner-txt"><span><?php echo __('Games', 'sundance'); ?></span></div>
			<div class="container text-center">
				<?php	/*if ( is_active_sidebar( 'gamessidebar' ) ) : ?>
			   <div class="gamessidebar">
				<?php dynamic_sidebar( 'gamessidebar' ); ?>
			  </div>
		    <?php endif;*/ ?>
		    <?php
        $arr=get_page_by_title( "juegos video" );
        $id=$arr->ID;
       $my_query = new WP_Query( array( 'page_id' => $id ) );
				while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>

			</div>
		</div>
		<br/>
		<div class="container games">
			<div class="row">
<?php
			query_posts($query_string . '&orderby=date&order=ASC');
			if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>
					<div class="col-lg-4 col-sm-6 game-box">
						<div class="game-content">
							<?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>
							<div class="game-info">
							 <span class="game-auth"><?php echo get_post_meta($post->ID, 'author', true); ?></span>
						  	<h3 class="game-title"><?php the_title();?> </h3>
							</div>
							<div class="caption">
								<br/><br/>
								<?php the_excerpt();?>
								<br/><br/>
								<div class="text-center jbtn">
									<a  href=""><span><?php echo __('DESCARGAR', 'sundance'); ?></span></a>
								</div>
							</div>
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