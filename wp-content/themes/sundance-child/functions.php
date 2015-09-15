<?php
function theme_enqueue_styles() {

    $parent_style = 'sundance';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'stabile-regular', get_stylesheet_directory_uri() . '/css/fonts/Stabile-regular.css', array( $parent_style ) );
    wp_enqueue_style( 'stabile-toy', get_stylesheet_directory_uri() . '/css/fonts/Stabile-toy.css', array( $parent_style ) );

    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );


		wp_enqueue_style( 'bootstrap-style', get_stylesheet_directory_uri() . '/css/bootstrap-3.3.5-dist/css/bootstrap.min.css', array( 'child-style' ) );
		wp_deregister_script('bxSliderSetup');
		wp_register_script( 'bxSliderSetup', get_stylesheet_directory_uri() .'/js/bxslider.setup.js',array ('bxSlider'), '1.0.0', true);
    wp_register_script('bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap-3.3.5-dist/js/bootstrap.min.js', array('jquery'), true );
    wp_enqueue_script('bootstrap');
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function child_sundance_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'sundance_custom_header_args', array(
		'default-text-color'     => '464646',
		'width'                  => apply_filters( 'sundance_header_image_width', 180 ),
		'height'                 => apply_filters( 'sundance_header_image_height', 210 ),
		'flex-height'            => true,
		'wp-head-callback'       => 'sundance_header_style',
		'admin-head-callback'    => 'sundance_admin_header_style',
		'admin-preview-callback' => 'sundance_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'child_sundance_custom_header_setup' );


function sundance_header_style() {

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == get_header_textcolor() )
		return;
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == get_header_textcolor() ) :
	?>
		#page {
			padding-top: 0px;
		}
		.site-title,
		.site-description {
			position: absolute !important;
			clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
		.header-image-link {
			margin-top: 0;
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo get_header_textcolor(); ?> !important;
		}
	<?php endif; ?>
	</style>
	<?php
}
add_action('sundance_credits', 'show_footer');
function show_footer(){
	echo __( 'Contacto: Lorel Ipsum', 'sundance' );
}

//Added theme supports
add_theme_support('post-thumbnails');
set_post_thumbnail_size( 80, 80, true );