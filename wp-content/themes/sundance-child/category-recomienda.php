<?php


get_header(); ?>
		<div class="recmd-banner text-center">
			<div class="banner-txt"><span>OSO</span><p>RECOMIENDA</p></div>
		</div>
		<br/><br/>
		<div class="container">
			<div class="recmd col-lg-offset-1 col-lg-10"> <!--style="border:1px solid red;">-->
		  <?php 
					query_posts($query_string . '&orderby=date&order=ASC&cat=-10');
					
		    while ( have_posts() ) : the_post(); ?>
					<div class="col-lg-4 recmd-item " style="width:300px;">
					<div  class="recmd-box">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full', array('class' => 'img-responsive recmd-img')); ?></a>
						<div class="recmd-info">
							<a href="<?php the_permalink(); ?>"><span class="recmd-title"> <?php	the_title(); ?></span></a>
							<div class="recmd-content"><?php echo get_the_content(); ?> <a class="more-link" href="<?php the_permalink(); ?>">VER MAS+</a></div>
							<br/>
							<div class="recmd-date"><img src="<?php echo get_stylesheet_directory_uri();?>/img/btn-arrow.png"> <?php echo get_the_date(); ?></div>
						</div> 
					</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
<?php get_footer(); ?>