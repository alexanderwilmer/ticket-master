 
		<div class="clearfix"></div>
		<!-- //w3_agileits_top_nav-->
		
		<!-- /inner_content-->
				<div class="inner_content" style="height:900px">
				    <!-- /inner_content_w3_agile_info-->
					<div class="inner_content_w3_agile_info">
					

							<div class="registration admin_agile">
								
												<div class="signin-form profile admin">
													<h2>Ingreso por perdida de contraseña</h2>
													 <?= $this->Flash->render() ?>
													 <div class="login-form">
														<form method="post" action="/tickets/users/lostpassw" accept-charset="utf-8" class="form-signin">
															<input type="text" name="usuario" placeholder="Usuario de maquina de miambiente o correo de ingresado" value="" required="">
														     <p><a href="/tickets/users/lostpassw">Olvide mi contraseña</a></p>
															<div class="tp">
																<input type="submit" value="ENVIAR">
															</div>
															
														</form>
													</div>
													 

													 
												</div>

					

				    </div>
					<!-- //inner_content_w3_agile_info-->
				</div>
		<!-- //inner_content--> 