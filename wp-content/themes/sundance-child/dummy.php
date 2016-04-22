<?php
/**
 * Template Name: Dummy Page
 *
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sundance
 * @since Sundance 1.0
 */

get_header(); ?>
		<div class="parques-banner text-center">
			<div class="banner-txt"><span><?php echo __('Parks', 'sundance'); ?></span></div>
		</div>
		<br/><br/>
		<div class="container">
			<div class="parq_container">
							
							<button class="btn btn-primary " data-toggle="modal" data-target="#myModal">
								open
							</button>
							<!-- Modal -->
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
							</div>
							
							
							<!--login modal-->
								<button class="btn btn-primary " data-toggle="modal" data-target="#loginModal">
								login
							</button>
							<!-- Modal -->
							<div class="modal fade loginModal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-body">
											<div class="clearfix">
												<img  class="closeImg" data-dismiss="modal" src="<?php echo get_stylesheet_directory_uri(); ?>/img/close.png" aria-label="Close"> 
												<div class="col-lg-6 col-sm-6 login text-center">
													<div class="log-heading">Ingresa</div>
													<div class="form-group">
														<input type="text" class="form-control" placeholder="username">
													</div>
													<div class="form-group">
														<input type="text" class="form-control" placeholder="password">
													</div>
													<div class="link">
														olvidaste tu contrasena. <a href="">Click Now </a>
													</div>
													<button class="btn">Ingresar</button>
												</div>
												<div class="col-lg-6 col-sm-6 loading">
														<div>cargando...</div>
												</div>
											</div>
									</div>
								</div>
							</div>
							<!--end of login modal-->

			</div>
		</div>
<?php get_footer(); ?>