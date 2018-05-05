 	<div class="clearfix"></div>
		<!-- //w3_agileits_top_nav-->
		<!-- /inner_content-->
				<div class="inner_content">
				    <!-- /inner_content_w3_agile_info-->
					<div class="inner_content_w3_agile_info">


 				<div class="agile_top_w3_grids">

					          <ul class="ca-menu">


                              <?php 
                                    $rol=$this->request->session()->read('Auth.User.rol');// $this->Session->read('Auth.User.rol'); 
                                    if($rol==3){?>

                                     <li>
                                     	
                                     	 <?= $this->Html->link('	<i class="fa fa-building-o" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main"></h4>
												<h3 class="ca-sub">Departamentos de Miambiente</h3>
											</div> ', ['controller' => 'Departamentos', 'action' => 'index'] ,array('escape' => false)   ) ?> 
                                     </li>


                                
              <li>
                                     	
                                     	 <?= $this->Html->link('	<i class="fa fa-building-o" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main"></h4>
												<h3 class="ca-sub two">Estados</h3>
											</div> ', ['controller' => 'Estados', 'action' => 'index'] ,array('escape' => false)   ) ?> 
                                     </li>

							 
							 
              <li>
                                     	
                                     <?= $this->Html->link('	<i class="fa fa-building-o" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main"></h4>
												<h3 class="ca-sub thre">Contratiempos</h3>
											</div> ', ['controller' => 'Contratiempos', 'action' => 'index'] ,array('escape' => false)   ) ?> 
                                     </li>


                                      <li>
                                     	
                                     	 <?= $this->Html->link('	<i class="fa fa-user-circle-o" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main"></h4>
												<h3 class="ca-sub four">Usuarios</h3>
											</div> ', ['controller' => 'Users', 'action' => 'index'] ,array('escape' => false)   ) ?> 
                                     </li>
                                        <?php }?>
                                      <li>
                                     	
                                     	 <?= $this->Html->link('	<i class="fa fa-building-o" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main"></h4>
												<h3 class="ca-sub five">Tickets</h3>
											</div> ', ['controller' => 'Tickets', 'action' => 'adminlistticket'] ,array('escape' => false)   ) ?> 
                                     </li>


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
		</div>
					   
	</div>
		 
					   