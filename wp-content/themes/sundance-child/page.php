<?php

get_header(); ?>
	<div class="events-page">	
		<?php the_post_thumbnail( 'full', array('class' => 'img-responsive ban-image'));  ?>
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
			<?php	
				$i=0;
				$mypages = get_pages( array( 'child_of' => $post->ID, 'parent' => $post->ID ) );
            foreach( $mypages as $page ) {      
						if($i==0)
						$content = $page->post_content;
							if ( ! $content ) // Check for empty page
                continue;

            $content = apply_filters( 'the_content', $content );
        ?>
				<div class="row">
					<div class="col-lg-4 event-abt-title text-center"><?php echo $page->post_title; ?></div>
					<div class="col-lg-8 event-abtus"><?php echo $content; ?></div>
				</div>
				<?php
				}
				$i++;
				} ?>
		</div>
	</div>		
<?php get_footer(); ?>