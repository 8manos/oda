<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Sundance
 * @since Sundance 1.0
 */

get_header(); ?>
  <div class="parques-banner text-center">
		<div class="banner-txt"><span>PARQUES</span></div>
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
		<div class="col-lg-6 row">
			<?php while (have_posts()) : the_post(); ?>
				<h1 class="sp-head"><?php the_title(); ?></h1>
				<p class="sp-date"> <span><?php echo get_the_date(); ?></span></p>
				<div class="sp-content"><?php the_content(); ?></div>
			<?php endwhile; ?>
		</div>
		<div class="col-lg-5 col-lg-offset-1 row clearfix">
			<?php 
			$slug=array('games','recomienda','cat_workshop');
		  foreach($slug as $sl){;
		  $category = get_category_by_slug($sl);
      $cid[]=$category->term_id;
		  } ?>
		<div class="catbox1">
			<div class="indiv1">
				<p><?php echo __('NUEYSTROS PROYECTOS', 'sundance'); ?></p>
				<ul class="list-unstyled">
					<?php
					$args = array('exclude'=>$cid,'hide_empty' => FALSE,'parent' => 0); 
					$categories =get_categories( $args );
					foreach($categories as $category){
						echo '<li><a href="'.get_category_link( $category->term_id ).'">+&nbsp;'.$category->name.'</a></li>';
					} ?>
				</ul>
			</div>
		</div>
		</div>
		<div class="clearfix row col-lg-12">
		<br/>
		<br/>
		<span class="coment">COMENTAR</span><br/><br/>
		 <?php echo do_shortcode("[contact-form-7 id='185' title='single post page']"); ?>
		</div> 
	</div>
<?php get_footer(); ?>