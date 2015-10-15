<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sundance
 * @since Sundance 1.0
 */

get_header();
  $p_type =  get_post_type();
  $p_tax= get_queried_object(); //This will give object for taxonomy 
//	 print_r($p_tax);
//	 die;
   $taxonomy = $p_tax->taxonomy;
   
    if($taxonomy == 'category'){ ?>
		<div class="parques-banner text-center">
			<div class="banner-txt"><span><?php echo __('Parks', 'sundance'); ?></span></div>
		</div>
     <?php  }
      else {  ?>
      <div class="recmd-banner text-center">
			<div class="banner-txt"><span><?php echo __('BEAR', 'sundance'); ?></span><p><?php echo __('RECOMMENDATION', 'sundance'); ?></p></div>
		  </div>
</span>
	<?php } ?>

		<div class="container">
			<div class="text-center archive-heading">
				<?php echo single_cat_title( '', true );?>
			</div>
			<div class="grid parq_grid col-lg-offset-1 col-lg-10">
				
		  <?php

				$i=1;
				$cnt = $GLOBALS['wp_query']->post_count;
		   while ( have_posts() ) : the_post(); ?>
					<!---This is POST <?php print_r ( $cnt); ?> -->
					<div class="col-lg-4 grid-item " >
						<div  class="parq-box">
							<a href="<?php the_permalink(); ?>">
								<?php
								if(get_video_thumbnail(get_the_ID() )!=""){
									?>
									<img class="img-responsive" src="<?php echo get_video_thumbnail(get_the_ID()); ?>" />
								<?php
								}else{
									the_post_thumbnail('full', array('class' => 'img-responsive parq-img'));
								}
								?>
							</a>
							<div class="parq-info">
								<a href="<?php the_permalink(); ?>"><span class="parq-title"> <?php	the_title(); ?></span></a>
								<div class="parq-content"><?php echo get_the_excerpt(); ?> <a class="more-link" href="<?php the_permalink(); ?>"><?php echo __('View More','sundance'); ?>+</a></div>
								<br/>
								<div class="parq-date"><img src="<?php echo get_stylesheet_directory_uri();?>/img/btn-arrow.png"> <?php echo get_the_date(); ?></div>
							</div>
						</div>
					</div>
					
					<?php
					if( $i==2 || ( $i == $cnt && $cnt < 3 ) ) {
					if($taxonomy == 'category'){ ?>
					
						<!---This is Category -->
						<div class="col-lg-4 grid-item " >
							<div class="catbox1">
								<div class="indiv1">
									<p><?php echo __('NUEYSTROS PROJECTS', 'sundance'); ?></p>
									<ul class="list-unstyled">
								<?php
											$args = array('exclude'=>$cid,'hide_empty' => FALSE,'parent' => 0);
											$categories = get_categories( $args );
											foreach($categories as $p_tax){											
													echo '<li><a href="'.get_category_link( $p_tax->term_id ).'">+&nbsp;'.$p_tax->name.'</a></li>';
											}?>
									</ul>
								</div>
							</div>
						</div>
						<?php } else { ?>
				<div class="col-lg-4 recmd-item for-cat grid-item">
							<div class="catbox">
								<div class="indiv">
									<p><?php echo __('TEMAS', 'sundance'); ?></p>
									<ul class="list-unstyled">
								<?php
											$terms = get_terms('recomienda' );
											foreach ( $terms as $term ) {
												$term_link = get_term_link( $term );
												/*
												if ( is_wp_error( $term_link ) ) { // ???
														continue;
												}
												*/
											  echo '<li><a href="' . esc_url( $term_link ) . '">+&nbsp;' . $term->name . '</a></li>';
											} ?>
									</ul>
								</div>
						</div>
					</div>
					<?php }?>
					<?php }

				$i++;
				endwhile;
				//If there is not post for the category
				if($cnt == 0){
				if($taxonomy == 'category'){ ?>
						<div class="col-lg-4  grid-item " >
							<div class="catbox1">
								<div class="indiv1">
									<p><?php echo __('NUEYSTROS PROJECTS', 'sundance'); ?></p>
									<ul class="list-unstyled">
								<?php
											$args = array('exclude'=>$cid,'hide_empty' => FALSE,'parent' => 0);
											$categories =get_categories( $args );
											foreach($categories as $category){
													echo '<li><a href="'.get_category_link( $category->term_id ).'">+&nbsp;'.$category->name.'</a></li>';
											}?>
									</ul>
								</div>
							</div>
						</div>
						<?php } else { ?>
				<div class="col-lg-4 recmd-item for-cat grid-item">
							<div class="catbox">
								<div class="indiv">
									<p><?php echo __('Terms', 'sundance'); ?></p>
									<ul class="list-unstyled">
								<?php
											$terms =get_terms('recomienda' );
											foreach ( $terms as $term ) {
												$term_link = get_term_link( $term );
												/*
												if ( is_wp_error( $term_link ) ) {
														continue;
												}
												*/
											  echo '<li><a href="' . esc_url( $term_link ) . '">+&nbsp;' . $term->name . '</a></li>';
											} ?>
									</ul>
								</div>
						</div>
					</div>
					<?php }?>
					<?php
				}
				?>
			</div>
			<div class="parq-btn text-center col-lg-12 clearfix">
			<span><?php echo __('You want to make a donation?','sundance') ?></span>
			</div>
		</div>
<?php get_footer(); ?>