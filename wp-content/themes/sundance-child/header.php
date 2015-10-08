<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Sundance
 * @since Sundance 1.0
 */
?><!DOCTYPE html>
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<div class='container-fluid'>
	<?php do_action( 'before' );
	 //TODO might be we provide fixed page no.
	 //$homePageObj = get_page_by_title( 'Lorem ipsum dolor sit amet');
			$header_image = get_header_image();
			if ( ! empty( $header_image ) ) { ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
					rel="home" class="sliderLogo header1-image-link">
					<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
				</a>
				<div class="menuPanel ">
					<div class="clsMenu clsMenu1 menuFor" >
						<span>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/navigation.svg">
						</span>
					</div>
					<div class='withBg'>
						<div class="clsMenu clsMenu2 menuBg" >
							<span>
							<img  class="clsMenu1" src="<?php echo get_stylesheet_directory_uri(); ?>/img/close.svg">
							</span>
						</div>

						<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
						
						 <div class="text-center"> 
							<?php	if ( is_active_sidebar( 'menusidebar' ) ) : 
							dynamic_sidebar( 'menusidebar' ); 
							endif; ?>
						 </div>
					</div> <!-- withBg -->
				</div> <!-- menuPanel -->
			<?php } // if ( ! empty( $header_image ) ) ?>



	<div id="main" class="clear-fix" >
		<?php if ( is_front_page() && ! is_paged() )
			get_template_part( 'featured' );
		?>