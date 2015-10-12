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
        $arr=get_page_by_title( "juegos video" ); // Might be kind of hardcoded.
        $id=$arr->ID;
       $my_query = new WP_Query( array( 'page_id' => $id, 'post_status'=>'publish') );
				while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>

			</div>
		</div>
		<br/>
		<div class="container games">
			<div class="row">
<?php
			//array( 'post_type' => 'games', 'post_status'=>'publish'
			query_posts($query_string . '&orderby=date&order=ASC');
			if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>
					<div class="col-lg-4 col-sm-6 game-box">
						<div class="game-content">
							<?php the_post_thumbnail('large', array('class' => 'game-img img-responsive')); ?>
							<div class="game-info">
							 <span class="game-auth"><?php
							unset($_category);
							 $post_categories = get_the_terms( get_the_ID(),'cat_games' );
							 //print_r($post_categories);
							 foreach($post_categories as $c){
								//$cat = get_category( $c );
								$_category[] =  $c->name ;
							 }
							 if(count($_category)){
								echo implode(' + ',$_category);
							 }?></span>
						  	<h3 class="game-title"><?php the_title();?> </h3>
							</div>
							<div class="caption">
								<br/><br/>
								<?php the_content(); ?>
								<br/><br/>
								<div class="text-center jbtn">
									<a  href="<?php echo get_the_excerpt();?>"><span><?php echo __('DOWNLOAD ', 'sundance'); ?></span></a>

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