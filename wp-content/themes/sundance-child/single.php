<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Sundance
 * @since Sundance 1.0
 */

get_header(); ?>
  <div class="parques-banner text-center">
		<div class="banner-txt"><span><?php echo __('Parks', 'sundance'); ?></span></div>
	</div>
	<div class="masonary_flex">
		<?php
				$images = get_attached_media('image', $post->ID);
				foreach($images as $img) {
				$img_src=wp_get_attachment_image_src($img->ID,'medium'); ?>
							<img  class="" src="<?php echo $img_src[0]; ?>" alt="" />
				<?php
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
							echo implode(' / ',$cats);
							?>
						</p>
						<div class="sp-content"><?php the_content(); ?></div>
					<?php endwhile; ?>

					<span class="coment"><?php echo __('Comments', 'sundance'); ?></span><br/><br/>
		      <?php echo do_shortcode("[contact-form-7 id='185' title='single post page']"); ?>
				</div>
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
		</div>
		<div class="clearfix row col-lg-12">
		<br/>
		<br/>

		</div>
	</div>
<?php get_footer(); ?>