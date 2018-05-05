	<div class="clearfix"></div>
		<!-- //w3_agileits_top_nav-->
		<!-- /inner_content-->
				<div class="inner_content">
				    <!-- /inner_content_w3_agile_info-->
					<div class="inner_content_w3_agile_info">
					<!-- /agile_top_w3_grids-->
					   
                       <?php 
 						 
                       ?>
					   <div class="agile_top_w3_grids">

					          <ul class="ca-menu">

                                    <?php 
                                    $rol=$this->request->session()->read('Auth.User.rol');// $this->Session->read('Auth.User.rol'); 
                                    if($rol==1  || $rol==3 ){?>

									<li>
										<a href="/tickets/tickets/listticketc">
											
											<i class="fa fa-building-o" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main"></h4>
												<h3 class="ca-sub">Mis Tickets</h3>
											</div>
										</a>
									</li>
								 
									<li>
										<a href="/tickets/tickets/add">
											<i class="fa fa-database" aria-hidden="true"></i>
											<div class="ca-content">
											<h4 class="ca-main two"></h4>
												<h3 class="ca-sub two">Crear Ticket</h3>
											</div>
										</a>
									</li>
									<?php }?>
  <?php
                                           if($rol==2  || $rol==3 ){?>

									<li>
										<a href="/tickets/tickets/addtsoporte">
											<i class="fa fa-database" aria-hidden="true"></i>
											<div class="ca-content">
											<h4 class="ca-main two"></h4>
												<h3 class="ca-sub two">Crear Ticket por soporte</h3>
											</div>
										</a>
									</li>

									<li class="hiden">
										<a href="/tickets/tickets/">
											
											<i class="fa fa-building-o" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main"></h4>
												<h3 class="ca-sub">Mis Tickets soporte</h3>
											</div>
										</a>
									</li>
									<?php } 
									?>

									   <?php        if($rol>=3 ){?>

									<li>
										 	
                                     <?= $this->Html->link('	<i class="fa fa-building-o" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main"></h4>
												<h3 class="ca-sub three">Menu administrativo</h3>
											</div> ', ['controller' => 'Dashboards', 'action' => 'menu'] ,array('escape' => false)   ) ?> 
									</li>

								 
									<?php } 
									?>

								<!--
									<li class="hiden">
										<a href="#">
											<i class="fa fa-tasks" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main three">49,436</h4>
												<h3 class="ca-sub three">Old Projects</h3>
											</div>
										</a>
									</li>
										<li>
										<a href="#">
											<i class="fa fa-clone" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main four">30,808</h4>
												<h3 class="ca-sub four">New Orders</h3>
											</div>
										</a>
									</li> -->
									<div class="clearfix"></div>
								</ul>
					   </div>



					 <!-- //agile_top_w3_grids-->
						<!-- /agile_top_w3_post_sections-->
							<div class="agile_top_w3_post_sections">
							      <?php if($rol==3){  ?>
							       <div class="col-md-6 agile_top_w3_post agile_info_shadow">
										   <div class="img_wthee_post">
										         <h3 class="w3_inner_tittle">Reporte General</h3>
												<div class="stats-wrap">
													<div class="count_info"><h4 class="count"><?php if(isset($tickets["todos"][0])){echo $tickets["todos"][0]["total"] ;}else{echo "0"; }  ?> </h4><span class="year">Total tickets</span></div>
													<div class="year-info"><p class="text-no"><?php if(isset($tickets["anio"][0])){echo $tickets["anio"][0]["total"] ;}else{echo "0"; }  ?> </p><span class="year">Ticket por año</span></div>
													<div class="clearfix"></div>
												</div>
												<div class="stats-wrap">
													<div class="count_info"><h4 class="count"><?php if(isset($tickets["completados"][0])){echo $tickets["completados"][0]["total"] ;}else{echo "0"; }  ?> </h4><span class="year">Total Completados</span></div>
													<div class="year-info"><p class="text-no"><?php if(isset($tickets["mes"][0])){echo $tickets["mes"][0]["total"] ;}else{echo "0"; }  ?> </p><span class="year">Tickets por mes</span></div>
													<div class="clearfix"></div>
												</div>
												<div class="stats-wrap">
													<div class="count_info"><h4 class="count"><?php if(isset($tickets["pendientes"][0])){echo $tickets["pendientes"][0]["total"] ;}else{echo "0"; }  ?> </h4><span class="year">Total pendientes</span></div>
													<div class="year-info"><p class="text-no"><?php if(isset($tickets["semana"][0])){echo $tickets["semana"][0]["total"] ;}else{echo "0"; }  ?> </p><span class="year">Ticket por semana</span></div>
													<div class="clearfix"></div>
												</div>
												<div class="stats-wrap">
													<div class="count_info"><h4 class="count"><?php if(isset($tickets["rechazados"][0])){echo $tickets["rechazados"][0]["total"] ;}else{echo "0"; }  ?></h4><span class="year">Total Rechazados</span></div>
													<div class="year-info"><p class="text-no"><?php if(isset($tickets["dia"][0])){echo $tickets["dia"][0]["total"] ;}else{echo "0"; }  ?> </p><span class="year">Ticket por dia </span></div>
													<div class="clearfix"></div>
												</div>
											  
											</div>
									   </div>


									    <div class="col-md-6 agile_top_w3_post_info agile_info_shadow">
										    <div class="img_wthee_post1">
											<h3 class="w3_inner_tittle"> Hora</h3>
										       	<div class="main-example">
													<div class="clock"></div>
													<div class="message"></div>

												</div>
											</div>
							            </div>
								       <div class="clearfix"></div>
								       <?php }?>
							     </div>
								   
						<!-- //agile_top_w3_post_sections-->
							<!-- /w3ls_agile_circle_progress-->
							<div class="w3ls_agile_cylinder chart agile_info_shadow">
							      <?php if($rol==3){  ?>
							<h3 class="w3_inner_tittle two"> Tickets por departamento</h3>
							
									 <div id="chartdiv"></div>
										
								     <?php } ?>
							</div>
						<!-- /w3ls_agile_circle_progress-->
						<!-- /chart_agile-->
						 
						  <!-- /w3ls_agile_circle_progress-->
							     <?php if($rol==3){  ?>
							<div class="w3ls_agile_circle_progress agile_info_shadow">
							
								<div class="cir_agile_info ">
								<h3 class="w3_inner_tittle">Tickets por tipo de problema</h3>
									  <div class="skill-grids">
									 
											<?php  foreach ($contratiempos as $contratiempo) {
												# code...
											?>
										     <div class="skills-grid text-center">
												<div class="circle" id="circles-<?php echo $contratiempo['id']?>"></div>
												<p><?php echo $contratiempo['name']?></p>
											</div>
											<?php
											}
											?>
												
								
				
										 <div class="clearfix"></div>
										
								</div>
							</div>
						</div>
						<!-- /w3ls_agile_circle_progress-->
						 <!--/prograc-blocks_agileits-->
							<div class="prograc-blocks_agileits">
								
								
								 <div class="col-md-6 bars_agileits agile_info_shadow">
								   <h3 class="w3_inner_tittle two">Ronda por mes</h3>
										<div class='bar_group'>
												<?php foreach ($tmesresponsable as $responsable) {
													# code...
												?>
												<div class='bar_group__bar thin' label='<?php echo $responsable["nombre"]?>  <?php echo $responsable["apellido"]?>' show_values='true' tooltip='true' value='<?php echo $responsable["total"]?>'></div>
												 <?php }?>
											 
										</div>
								</div>
								<div class="col-md-6 fallowers_agile agile_info_shadow">
									<h3 class="w3_inner_tittle two">Flujo de trabajo</h3>
												<div class="work-progres">
													<div class="table-responsive">
														<table class="table table-hover">
														  <thead>
															<tr>
															  <th>Usuario</th>
															  <th>Rol</th>                                   
																								
															  <th>Stado</th>
															  <th>Progreso</th>
														  </tr>
													  </thead>
													  <tbody>
													  <?php foreach ($flujos as $flujo ) {
													   $progreso =0;
													   if($flujo["completados"]>0){
													   $progreso = $flujo["completados"]/$flujo["total"];
													   }
													   ?>

														<tr>
														  <td><?php echo $flujo["nombre"]." ".$flujo["apellido"] ?></td>
														  <td>Soporte</td>                                 

								                    <?php if ($progreso==100 ) {
													   ?>
														  <td><span class="label label-success">Completado</span></td>
													 <?php }else{  ?>
	                                                      <td><span class="label label-danger">in progress</span></td>
													     <?php }?>

														  <td><span class="badge badge-info"><?php echo   number_format($progreso,2,",",".");  ?> %</span></td>
													  </tr>
													  <?php }?>
													  
												  </tbody>
											  </table>
											</div>
										</div>											
								</div>
									 <div class="clearfix"></div>
							</div>
                          <?php }  ?>
							  <!--//prograc-blocks_agileits-->
						<!-- /bottom_agileits_grids-->
						 <?php if($rol==3){  ?>
						<div class="bottom_agileits_grids">
						 
							<div class="col-md-12 chart_agile agile_info_shadow">
							 <h3 class="w3_inner_tittle two">Stacked Bar Chart</h3>
							   
<div id="chartdivdate" style="height: 500px"></div>					
							</div>
											
						
							 <div class="clearfix"></div>
						</div>
						<!-- //bottom_agileits_grids-->
							 <?php }?>					<!-- /weather_w3_agile_info-->
					 
						<!-- //weather_w3_agile_info-->
						<!-- /social_media-->
						   
						<!-- //social_media-->
				    </div>
					<!-- //inner_content_w3_agile_info-->
				</div>
		<!-- //inner_content-->
	</div>
