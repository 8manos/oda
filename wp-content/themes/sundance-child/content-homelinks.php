	<?php
/**
 * @package Sundance
 * @since Sundance 1.0
 */
?>

<nav <?php post_class(); ?>>

	<header class="entry-header">

		<h2 class="sub-homelink-title">
			<?php echo __('Home Links','sundance'); ?>
		</h2>

	</header><!-- .entry-header -->

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'sundance' ) );
				if ( $categories_list && sundance_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'sundance' ), $categories_list ); ?>
			</span>
			<span class="sep"> | </span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'sundance' ) );
				if ( $tags_list ) :
			?>
			<span class="tag-links">
				<?php printf( __( 'Tagged %1$s', 'sundance' ), $tags_list ); ?>
			</span>
			<span class="sep"> | </span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'sundance' ), __( '1 Comment', 'sundance' ), __( '% Comments', 'sundance' ) ); ?></span>
		<span class="sep"> | </span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'sundance' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- #entry-meta -->
</nav>