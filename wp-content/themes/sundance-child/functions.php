<?php
function theme_enqueue_styles() {

    $parent_style = 'sundance';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'stabile-regular', get_stylesheet_directory_uri() . '/css/fonts/Stabile-regular.css', array( $parent_style ) );
    wp_enqueue_style( 'stabile-toy', get_stylesheet_directory_uri() . '/css/fonts/Stabile-toy.css', array( $parent_style ) );
    wp_enqueue_style( 'stabile-toy', get_stylesheet_directory_uri() . '/css/fonts/apercu.css', array( $parent_style ) );

    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );
    wp_enqueue_style( 'iconmoon', get_stylesheet_directory_uri() . '/css/iconmoon.css', array( $parent_style ) );
    wp_enqueue_style( 'iconmoon', get_stylesheet_directory_uri() . '/wpp.css', array( $parent_style ) );


		wp_enqueue_style( 'bootstrap-style', get_stylesheet_directory_uri() . '/css/bootstrap-3.3.5-dist/css/bootstrap.min.css', array( 'child-style' ) );
		wp_deregister_script('bxSliderSetup');
		wp_register_script( 'bxSliderSetup', get_stylesheet_directory_uri() .'/js/bxslider.setup.js',array ('bxSlider'), '1.0.0', true);
		wp_register_script( 'customjs', get_stylesheet_directory_uri() .'/js/custom.js',array ('jquery'), '1.0.0', true);
    wp_register_script('bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap-3.3.5-dist/js/bootstrap.min.js', array('jquery'), true );
		wp_register_script( 'masonary_js', get_stylesheet_directory_uri() .'/js/masonry.pkgd.js',array ('jquery'), '1.0.0', true);
		
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('customjs');
    wp_enqueue_script('masonary_js');
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
	echo '<div class="siteInfoFooter text-center">' . __( 'Contacto: Lorel Ipsum', 'sundance' ) . '</div>';
}

//This will be used to register footer section as sidebar
add_action( 'widgets_init', 'footer_sidebar_init' );

function footer_sidebar_init() {
    register_sidebar( array(
        'name' => __( 'Footer Section', 'sundance' ),
        'id' => 'footersidebar',
        'description' => __( 'Widgets in this area will be shown on all footer sections', 'sundance' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget'  => '</li>',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>',
    ) );
}

//This will be used to register footer section as sidebar
add_action( 'widgets_init', 'guest_sidebar_init' );

function guest_sidebar_init() {
    register_sidebar( array(
        'name' => __( 'Guest Section', 'sundance' ),
        'id' => 'guestsidebar',
        'description' => __( 'Widgets in this area will be shown on all Guest sections', 'sundance' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget'  => '</li>',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>',
    ) );
}

//This will be used to register footer section as sidebar
add_action( 'widgets_init', 'games_sidebar_init' );

function games_sidebar_init() {
    register_sidebar( array(
        'name' => __( 'Games Section', 'sundance' ),
        'id' => 'gamessidebar',
        'description' => __( 'Widgets in this area will be shown on Games Page.', 'sundance' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget'  => '</li>',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>',
    ) );
}

//Check whether class exists or not
if(class_exists('Social_Icons_Widget')){
	class mySocialIcons extends Social_Icons_Widget {
		function __construct(){
			add_filter('social_icon_accounts', array('mySocialIcons','my_socialIcons'));

			parent::__construct();

		}
		function my_socialIcons($content)
		{
			$siw_social_accounts = array(
					'Facebook' => 'facebook',
					'Instagram' => 'instagram',
					'YouTube' => 'youtube',
			);
			return $siw_social_accounts;
		}

	}
	unregister_widget( 'Social_Icons_Widget' );
	add_action('widgets_init', create_function('', 'register_widget("mySocialIcons");') );
}
//Added theme supports
add_theme_support('post-thumbnails');
set_post_thumbnail_size( 80, 80, true );