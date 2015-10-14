<?php
/**
 * Template Name: Events Page
 *
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sundance
 * @since Sundance 1.0
 */

get_header(); ?>
	<div class="events-page">	
		<?php echo do_shortcode("[huge_it_slider id='2']"); ?>
		<div class="events-middle">
			<div class="events-table container">
					<h1><?php echo __('ya viene', 'sundance'); ?></h1>
					<?php $data=get_page( get_the_ID());
					echo $data->post_content;
					?>
			</div>			
			<div class="events-hill"></div>
		</div>
		<div class="events-foot">
		</div>
		<div class="events-bottom">
		</div>
	</div>		
<?php get_footer(); ?>