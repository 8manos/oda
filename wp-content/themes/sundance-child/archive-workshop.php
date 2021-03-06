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
			<ul id="source" class='list-unstyled list-inline'>
			<?php
			$categories = get_terms("cat_workshop");
			foreach($categories as $category){
				echo '<li data-filter=".'.$category->slug.'">'.$category->name.'</li>';
			}
				echo '<li class="all" data-filter="*">' . __('All Previous', 'sundance') . "</li>";
			?>

			</ul>
			</div>
			<div class='clearfix'>
				<?php
			query_posts($query_string . '&posts_per_page=-1&orderby=date&order=ASC');
			if ( have_posts() ) : ?>
				<ul id="destination" class='list-unstyled'>
				<?php
				$i=0;
				while ( have_posts() ) : the_post();
					unset($_category); $_category_first = "" ; // Reset
					$post_categories = get_the_terms( get_the_ID(),'cat_workshop' );
					foreach($post_categories as $c){
						//$cat = get_category( $c );
						$_category[] =  $c->name ;
						if($_category_first == "")
						$_category_first = $c->slug ;
					}
				?>
				<li class='col-lg-4 col-xs-12 work-box col-sm-6 <?php echo $_category_first ;?>' >
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

										if(count($_category)){
											echo implode($_category);
										}
										$post = get_post($post_id);
										//echo " --- " . $post->post_name;
									?>
									</span>
									<h3 class="work-title"  data-toggle="modal" data-target="#<?php echo $post->post_name; ?>"><?php the_title();?> </h3>
								</div>
								<div class="modal fade" id="<?php echo $post->post_name; ?>" role="dialog">
						      <div class="modal-dialog modal-lg">
									  <div class="modal-content">
										  <div class="modal-body">
												<div>
													<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/taller_earth.png">
													<img data-dismiss="modal" class="pull-right cls" src="<?php echo get_stylesheet_directory_uri(); ?>/img/taller_close.png">
												</div>
												<div class="clearfix">
														<div class="col-lg-4 col-xs-12 text-center">
															<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/taller_glass.png">
															<div class="pdf"><?php echo pdf_attachment_file(1,__("DOWNLOAD PDF SHEET",'sundance'));?></div>
															<div class="wlink"><a href=""><?php echo __('WORKSHOP TO YOUR SCHOOL', 'sundance'); ?></a></div>
															<div class="cimg"><?php echo __('You have <br>questions about the workshop?', 'sundance'); ?></div>

															<?php
															//echo $c->slug;
               $currentlang = get_bloginfo('language');
              if($currentlang=="en-US"):
              ?>
           <div><?php echo do_shortcode("[contact-form-7 id='327; title='talleres popup_en']");?></div>
           <?php else: ?>
           <div><?php echo do_shortcode("[contact-form-7 id='199; title='talleres popup']");?></div>
           <?php endif; ?>
															
														</div>
														<div class="col-lg-8 col-xs-12">
																<div class="main-title"> <?php the_title();?> </div>
																<div class="work-descp"> <?php the_content();?> </div>
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