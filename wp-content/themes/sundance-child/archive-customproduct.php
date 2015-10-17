<?php
/*
* This page belongs to eco-tinda
*/
get_header(); ?>
  <div class="eco-banner text-center">
			<div class="banner-txt"><span><?php echo str_replace(" ","</span><p>", __('Eco Store', 'sundance'));  ?></p></div>
	</div>
	<br/><br/>
<div class="container ecotinda">
				<?php
				$i=0;
				while ( have_posts() ) : the_post(); ?>
					<div class="col-lg-4 col-sm-6 prod-box">
						<div class="prod-img text-center" data-toggle="modal" data-target="#ecoModal<?php echo $i; ?>">
						  <?php the_post_thumbnail('medium', array('class' => 'img-responsive')); ?>
						</div>
						<div class="prod-name" data-toggle="modal" data-target="#ecoModal<?php echo $i; ?>"><?php the_title(); ?></div>
						<div class="prod-price"><?php echo get_post_meta($post->ID, 'price', true); ?></div>
						<h3 class="buy_prod" data-toggle="modal" data-target="#ecoModal<?php echo $i; ?>"><span><?php echo __('Comprar', 'sundance'); ?>&nbsp;&nbsp;<span class="buy-img"></span></span></h3>
						<div class="modal fade" id="ecoModal<?php echo $i; ?>" role="dialog">
						<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-body">
											<div class="clearfix">
											  <div class="col-lg-12 head row"><?php echo __('CANASTO DE COMPRA', 'sundance'); ?>
												  <img src="<?php echo get_stylesheet_directory_uri();?>/img/modal-close.png" data-dismiss="modal" class="pull-right">
												</div>
												
														<?php
													unset($_category);
													$post_categories = get_the_terms( get_the_ID(),'product_size' );
													if($post_categories!=""){
													foreach($post_categories as $c){
														 echo '<input class="p_size" type="hidden" value='. $c->name .' >';
													} 
													}?>
												<div class="col-lg-4 pimg">
												  <?php the_post_thumbnail('medium', array('class' => 'img-responsive')); ?>
												</div>
												<div class="col-lg-8 pleft">
														<div class="prod-name"><?php the_title(); ?> </div>
					                 	<div class="prod-price"><?php echo get_post_meta($post->ID, 'price', true); ?></div>
					                 	<div><?php echo __('DESCRIPCIÓN', 'sundance'); ?></div>
					                 	<div> <?php the_content(); ?></div>
												</div>
												<?php
               $currentlang = get_bloginfo('language');
              if($currentlang=="en-US"):
              ?>
           <div><?php echo do_shortcode("[contact-form-7 id='205' title='eco tienda form']"); ?></div>
           <?php else: ?>
           <div><?php echo do_shortcode("[contact-form-7 id='186' title='eco tienda form']"); ?></div>
           <?php endif; ?>
												
											</div>
										</div>
									</div>
								</div>
				  	</div>
					</div>
					<?php $i++; ?>
				<?php endwhile; ?>
</div>
<?php get_footer(); ?>