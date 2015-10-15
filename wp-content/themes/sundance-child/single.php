<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Sundance
 * @since Sundance 1.0
 */

get_header(); 

		
		$p_type = get_post_type();
    if($p_type == post){ ?>
		<div class="parques-banner text-center">
			<div class="banner-txt"><span><?php echo __('Parks', 'sundance');  echo  get_post_type(); ?></span></div>
		</div>
     <?php  }
      else {  ?>
      <div class="recmd-banner text-center">
			<div class="banner-txt"><span><?php echo __('BEAR', 'sundance'); ?></span><p><?php echo __('RECOMMENDATION', 'sundance');echo  get_post_type(); ?></p></div>
		  </div>
</span>
	<?php }?>
	<div class="masonary_flex">
		<?php
				$images = get_attached_media('image', $post->ID);
				foreach($images as $img) {
				$img_src=wp_get_attachment_image_src($img->ID,'medium');
				$vid_thumb=wp_get_attachment_image_src($img->ID,'full');
					if($vid_thumb[0]!= get_video_thumbnail()) { ?>
							<div>
							<img  class="" src="<?php echo $img_src[0]; ?>" alt="" />
							</div>
				  <?php
				  }
				}
		?>
	</div>
	<div class="container sp-page">
		<div class="col-lg-10 col-lg-offset-1">
				<div class="col-lg-8">
					<?php while (have_posts()) : the_post(); ?>
					
						<h1 class="sp-head"><?php the_title(); ?></h1>
						<p class="sp-date"> <span><?php echo get_the_date(); ?></span></p>
						<p class="sp-cat">
								<?php $cat=get_the_category($post->ID);
								foreach($cat as $cat_name){
										$cats[]='<a href="'.get_category_link( $cat_name->term_id ).'">'.$cat_name->name.'</a>';
								}
							echo __('THEMES : ', 'sundance');
							if (is_array($cats))
							echo implode(' / ',$cats);
							?>
						</p>
						<div class="sp-content"><?php the_content(); ?></div>
					<?php endwhile; ?>

					<span class="coment"><?php echo __('Comments', 'sundance'); ?></span><br/><br/>
           <?php
               $currentlang = get_bloginfo('language');
              if($currentlang=="en-US"):
              ?>
           <?php echo do_shortcode("[contact-form-7 id='328' title='single post page_en']"); ?>
           <?php else: ?>
           <?php echo do_shortcode("[contact-form-7 id='85' title='single post page']"); ?>
           <?php endif; ?>
				
				</div>
				<br>
				<?php
				if($p_type == post){?>
				
				<div class="col-lg-4 clearfix">
					
				<div class="catbox1">
					<div class="indiv1">
						<p><?php echo __('NUEYSTROS PROJECTOS', 'sundance'); ?></p>
						<ul class="list-unstyled">
							<?php
							$args = array('hide_empty' => FALSE);
							$categories =get_categories();
							foreach($categories as $category){
								echo '<li><a href="'.get_category_link( $category->term_id ).'">+&nbsp;'.$category->name.'</a></li>';
							} ?>
						</ul>
					</div>
				</div>
				</div>
				
				<?php } else { ?>
				<div class="col-lg-4 recmd-item for-cat">
							<div class="catbox">
								<div class="indiv">
									<p><?php echo __('TEMAS', 'sundance'); ?></p>
									<ul class="list-unstyled">
								<?php
											$terms =get_terms('recomienda' );
											foreach ( $terms as $term ) {
												$term_link = get_term_link( $term );
												if ( is_wp_error( $term_link ) ) {
														continue;
												}
											  echo '<li><a href="' . esc_url( $term_link ) . '">+&nbsp;' . $term->name . '</a></li>';
											} ?>
									</ul>
								</div>
						</div>
					</div>
					<?php }?>
				
		</div>
		<div class="clearfix row col-lg-12">
		<br/>
		<br/>

		</div>
	</div>
<?php get_footer(); ?>