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
	<br/><br/>
	<div class="container sp-page">
		<div class="col-lg-7 row">
			<?php while (have_posts()) : the_post(); ?>
				<h1 class="sp-head"><?php the_title(); ?></h1>
				<p class="sp-date"> <span><?php echo get_the_date(); ?></span></p>
				<div class="sp-content"><?php the_content(); ?></div>
			<?php endwhile; ?>
		</div>
		<div class="col-lg-5 row clearfix">
			<?php 
			$slug=array('games','recomienda','cat_workshop');
		  foreach($slug as $sl){;
		  $category = get_category_by_slug($sl);
      $cid[]=$category->term_id;
		  } ?>
		  <ul class="list-unstyled">
		  <?php
			$args = array('exclude'=>$cid,'hide_empty' => FALSE,'parent' => 0); 
			$categories =get_categories( $args );
			foreach($categories as $category){
				echo '<li>+&nbsp;'.$category->name.'</li>';
			} ?>
			</ul>
		</div>
		<div class="clearfix row col-lg-12">
		<br/>
		<br/>
		<span class="coment">COMENTAR</span><br/><br/>
		 <?php echo do_shortcode("[contact-form-7 id='185' title='single post page']"); ?>
		</div> 
	</div>
<?php get_footer(); ?>