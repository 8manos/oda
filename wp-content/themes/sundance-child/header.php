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
					<img src="<?php header_image(); ?>" width="<?php //echo HEADER_IMAGE_WIDTH; ?>" height="<?php //echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
				</a>
<!-- 				<div class="secondary_menu"><?php wp_nav_menu( array('menu' => 'signup_login' ,'menu_class'=> 'list-inline',)); ?></div> -->
				<div class="lang-switcher" >
						<ul class="list-inline login-menu">
							<!-- <li><a href="" data-toggle="modal" data-target="#myModal"><?php echo __('Sign Up', 'sundance'); ?></a></li> -->
							<li><a href="" data-toggle="modal" data-target="#loginModal"><?php echo __('Log IN', 'sundance'); ?></a></li>
						</ul>
				<?php 
				 $currentlang = get_bloginfo('language');
							if($currentlang=="en-US"){
							$act="mleft";
							}else{
							$act="";
							}
							
							$translations = pll_the_languages(array('raw'=>1));
							//print_r($translations);
							?>
			
						<div class="lang-item-es "><a href="<?php echo $translations[0]['url'];?>" hreflang="<?php echo $translations[0]['slug'];?>">ESP</a></div>
						<div class="lbg">
							<img class="<?php echo $act; ?>" src="<?php echo get_stylesheet_directory_uri();?>/img/lang_selector.svg">
						</div>
						<div class="lang-item-en "><a href="<?php echo $translations[1]['url'];?>" hreflang="<?php echo $translations[0]['slug'];?>">ENG</a></div>
				</div>
				<div class="menuPanel ">
					<div class="clsMenu clsMenu1 menuFor" >
						<span>
						<img class="clsMenu4" src="<?php echo get_stylesheet_directory_uri(); ?>/img/navigation.svg">
						</span>
					</div>
					<div class='withBg'>
						<div class="clsMenu clsMenu2 menuBg" >
							<span>
							<img  class="clsMenu3" src="<?php echo get_stylesheet_directory_uri(); ?>/img/close.svg">
							</span>
						</div>
						<div class="main_menu">
							<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
						</div>
						 <div class="text-center"> 
							<?php	if ( is_active_sidebar( 'menusidebar' ) ) : 
							dynamic_sidebar( 'menusidebar' ); 
							endif; ?>
						 </div>
					</div> <!-- withBg -->
				</div> <!-- menuPanel -->
			<?php } // if ( ! empty( $header_image ) ) ?>


		<div class="modal fade loginModal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="clearfix">
						<img  class="closeImg" data-dismiss="modal" src="<?php echo get_stylesheet_directory_uri(); ?>/img/close.png" aria-label="Close"> 
						<div class="col-lg-6 col-sm-6 login text-center">
							<div class="log-heading">Ingresa</div>
							<!--<div class="form-group">
								<input type="text" class="form-control" placeholder="username">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="password">
							</div>-->
							<?php
							$args = array(
									'echo'           => true,
									'remember'       => false,
									'redirect'       => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
									'form_id'        => 'loginform',
									'id_username'    => 'user_login',
									'id_password'    => 'user_pass',
									'id_remember'    => 'rememberme',
									'id_submit'      => 'wp-submit',
									'label_username' => __( '' ),
									'label_password' => __( '' ),	
									'label_log_in'   => __( 'Log In' ),
									'value_username' => '',
									'value_remember' => false
							);
							wp_login_form($args); ?>
							<div class="link">
								olvidaste tu contrasena. <a href="">Click Now </a>
							</div>
<!-- 													<button class="btn">Ingresar</button> -->
						</div>
						<div class="col-lg-6 col-sm-6 loading">
								<div>cargando...</div>
						</div>
					</div>
			</div>
		</div>
	</div>
	</div><!--loginModal-->
	
	<!--signup modal-->
	<div class="modal fade customModal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-6 left text-center">
								<div class="heading "> Unete</div>
								<div class="text text-center">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
								</div>	
								<form>
									<div class="form-group">
										<input type="text" class="form-control"  placeholder="Escribe el Codigo">
										<button type="submit" class="btn btn-default btn-block">Register</button>
									</div>
								</form>
								<div class="note">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit.
								</div>
						</div>
						<div class="col-lg-6 right">
							
							
							
							
								<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
									<!-- Indicators -->
									<ol class="carousel-indicators">
										<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
										<li data-target="#carousel-example-generic" data-slide-to="1"></li>
										<li data-target="#carousel-example-generic" data-slide-to="2"></li>
									</ol>

									<!-- Wrapper for slides -->
									<div class="carousel-inner" role="listbox">
										<div class="item active slide1">
											<div class="heading "> En compania de un adulto</div>
											<div class="text text-left"> En compania de un adulto</div>
											<div class="clearfix">
												<?php
														// lowest year wanted
														$cutoff = 1910;

														// current year
														$now = date('Y');
														
														// build months menu
														echo '<select name="month"  class="form-control">' . PHP_EOL;
														echo '  <option >Month</option>' . PHP_EOL;
														for ($m=1; $m<=12; $m++) {
																echo '  <option value="' . $m . '">' . date('M', mktime(0,0,0,$m)) . '</option>' . PHP_EOL;
														}
														echo '</select>' . PHP_EOL;

														// build days menu
														echo '<select name="day"  class="form-control">' . PHP_EOL;
														echo '  <option >Day</option>' . PHP_EOL;
														for ($d=1; $d<=31; $d++) {
																echo '  <option value="' . $d . '">' . $d . '</option>' . PHP_EOL;
														}
														echo '</select>' . PHP_EOL;
														
														// build years menu
														echo '<select name="year" class="form-control">' . PHP_EOL;
														echo '  <option >Year</option>' . PHP_EOL;
														for ($y=$now; $y>=$cutoff; $y--) {
																echo '  <option value="' . $y . '">' . $y . '</option>' . PHP_EOL;
														}
														echo '</select>' . PHP_EOL;

												?>
											</div>
											<div class="text text-left"> En compania de un adulto</div>
											<div class=btn-bar>
												<button class="btn btn-default">Padre</button>
												<button class="btn btn-default">Educador</button>
											</div>
											<button class="cbtn btn">Continue</button>
											<div class="note">
													Lorem ipsum dolor sit amet, consectetur adipiscing elit.
											</div>
										</div><!--slide1-->
										<div class="item slide2">
												<div class="heading"> Crea tu cuenta</div>
												<div class="text text-center"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
													Nunc tellus purus, dapibus ut pretium quis, egestas quis massa. 
												</div>
												<br/>
												<div class="clearfix inp-bar">
													<div class="col-lg-6">
														<input type="text" class="form-control" placeholder="name">
													</div>	
													<div class="col-lg-6">
														<input type="text" class="form-control" placeholder="surname">
													</div>	
												</div>
												<input type="text" class="form-control" placeholder="correo elctronico">
												<input type="text" class="form-control" placeholder="contrasena">
												<div class="checkbox text-left">
													<label>
														<input type="checkbox"> Check me out
													</label>
												</div>
												<button class="cbtn btn">Continue</button>
												<div class="note">
													Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
												</div>
										</div><!--slide2-->
										<div class="item">
												<div class="heading"> Gracias por ser parte de nuestra causa!</div>
												<div class="text text-center"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
													Nunc tellus purus, dapibus ut pretium quis, egestas quis massa. Nunc tellus purus, dapibus ut pretium quis, egestas quis massa.
												</div>
										</div>
									</div>

								
								</div>
							
							
							
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!--signup modal-->
							
	<div id="main" class="clear-fix" >
		<?php if ( is_front_page() && ! is_paged() )
			get_template_part( 'featured' );
		?>