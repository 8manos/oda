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
			<div class="banner-txt"><span><?php echo __('Workshop', 'sundance'); ?></span></div>
		</div>
		<div class="container workshops">
		<div class="row">
		<h1 class="head"><?php echo __('WHAT DO YOU LIKE TO DO?', 'sundance'); ?></h1>
		<div class="text-center  work-cat">
			<ul id="source" class="list-inline">
			<?php
		  $parent= get_category_by_slug( "cat_workshop");
			$categories = get_terms("cat_workshop");
			foreach($categories as $category){
				echo '<li data-id="'.$category->name.'">'.$category->name.'</li>';
			}
			?>
			</ul>
		</div>
			<?php
			query_posts($query_string . '&posts_per_page=-1&orderby=date&order=ASC');
			if ( have_posts() ) : ?>
				<div class="clearfix">
				<ul id="destination">
				<?php
				$i=0;
				while ( have_posts() ) : the_post(); ?>
				<li data-id="<?php $cat = get_the_category();echo $cat[0]->name;?>" class="list-unstyled">
					<div class="col-lg-4 work-box col-sm-6">
							<div>
								<div class="clearfix img-div"><?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>
									<div class="wrk-cap">
										<br/>
										<?php the_excerpt(); ?>
									</div>
								</div>
								<div class="work-info">
									<span class="work-auth">
										<?php
										unset($_category);
										$post_categories = get_the_terms( get_the_ID(),'cat_workshop' );
										foreach($post_categories as $c){
											//$cat = get_category( $c );
											$_category[] =  $c->name ;
										}
										if(count($_category)){
											echo implode($_category);
										}

									?>
									</span>
									<h3 class="work-title"  data-toggle="modal" data-target="#talleresModal<?php echo $i; ?>"><?php the_title();?> </h3>
								</div>
								<div class="modal fade" id="talleresModal<?php echo $i; ?>" role="dialog">
						      <div class="modal-dialog modal-lg">
									  <div class="modal-content">
										  <div class="modal-body">
												<div>
													<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/taller_earth.png">
													<img data-dismiss="modal" class="pull-right cls" src="<?php echo get_stylesheet_directory_uri(); ?>/img/taller_close.png">
												</div>
												<div class="clearfix">
														<div class="col-lg-4 text-center">
															<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/taller_glass.png">
															<div class="pdf"><?php echo pdf_attachment_file(1,"DESCARGA FICHA PDF");?></div>
															<div class="wlink"><a href=""><?php echo __('LEEVA ESTA TALLER A TU COLEGIO', 'sundance'); ?></a></div>
															<div class="cimg"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/taller_cloud.png"></div>
															<div><?php echo do_shortcode("[contact-form-7 id='209; title='talleres popup']");?></div>
														</div>
														<div class="col-lg-8">
																<div class="main-title"> <?php the_title();?> </div>
																<div class="work-descp"> <?php the_content();?> </div>
														</div>
												</div>
										  </div>
										</div>
									</div>
								</div>
							</div>
						</div>
						</li>
				<?php
				$i++;
				endwhile; ?>
				</ul>
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