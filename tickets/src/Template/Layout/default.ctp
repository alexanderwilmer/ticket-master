<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">
<head>
<?php $ruta = "/tickets";?>
<?php
use Cake\Routing\Router;
$path=Router::url('/', false);
 // $session = $this->request->session();
    
?>


  <script type="text/javascript">
         var base ="/tickets/";/// <?php// echo $path;?>;
         var tareas =0;
  </script> 
<title>Sistema de tickets de soporte de Sinia</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="ADMINISTRADOR DE REPORTES" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="<?php echo $ruta ?>/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo $ruta ?>/css/component.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo $ruta ?>/css/export.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo $ruta ?>/css/flipclock.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo $ruta ?>/css/circles.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo $ruta ?>/css/style_grid.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo $ruta ?>/css/style.css" rel="stylesheet" type="text/css" media="all" />
>
<link href="<?php echo $ruta ?>/css/chat.css" rel="stylesheet" type="text/css" media="all" />

<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />

<link href="<?php echo $ruta ?>/datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css"  />

<!-- font-awesome-icons -->
<link href="<?php echo $ruta ?>/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>
<body>

 
<!-- banner -->
<div class="wthree_agile_admin_info">
		  <!-- /w3_agileits_top_nav-->
		  <!-- /nav-->
		  <div class="w3_agileits_top_nav">
			<ul id="gn-menu" class="gn-menu-main">
			  		 <!-- /nav_agile_w3l -->
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu"><i class="fa fa-bars" aria-hidden="true"></i><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
				 <!-- 
						<div class="gn-scroller scrollbar1">
							<ul id="myUL"  class="gn-menu agile_menu_drop">
								<li><a href="<?php echo $ruta?>"> <i class="fa fa-tachometer"></i> USUARIOS </a></li>
								
								<li ><a >  
								<form id="ffilter">
						 
								<input type="text" class="form-control" id="filteru"  placeholder="Buscar por nombres.." title="Type in a name">
						
								</form>
								</a></li>

								<li >
									<a href="#"><i class="fa fa-cogs" aria-hidden="true"></i> filtrar lista  <i class="fa fa-angle-down" aria-hidden="true"></i></a> 
									<ul id="lusers" class="gn-submenu">
									<?php  foreach ($LUSERS as $lista) {
							
									?>

										<li id="<?php echo $lista['id']?>" nombre="<?php echo $lista['nombre']?> <?php echo $lista['apellido']?>" imagen="<?php echo $lista['imagen']?>" class="chaton"  ><a ><i class="fa " style="    border-radius: 50%; -webkit-border-radius: 50%;" aria-hidden="true"> 
										 
										<?php echo $this->Html->image("usuarios/".$lista["imagen"], ['alt' => 'CakePHP',"width"=>"50px","height"=>"50px" ,"style"=>"border-radius: 50%;
    -webkit-border-radius: 50%;" ]);  ?></i> 
     <?php echo $lista["departamento"]?>--<?php echo $lista["nombre"]?>  <?php echo $lista["apellido"]?>
                                    	 
										</a></li>
										 
                                     <?php }?>

									</ul>
								</li>
								 
							</ul>
						</div>   --> <!-- //nav_agile_w3l -->
					</nav>
				</li>
				<!-- //nav_agile_w3l -->
		 
				<li class="second logo"><h1> <?= $this->Html->link('SOPORTE	 
											 ', ['controller' => 'Dashboards', 'action' => 'principal'] ,array('escape' => false)   ) ?> </h1></li>
					<li class="second admin-pic">
				       <ul class="top_dp_agile">
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
											  
												<span class="prfil-img"> <?php echo $this->Html->image("usuarios/".$userl["image"], ['alt' => 'CakePHP',"style"=>"height:50px;width:50px; "]);  ?> </span> 
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
											<!-- <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
										-->	<li> <a href="<?= $ruta?>/users/perfil/<?=  $userl['id'] ?>"><i class="fa fa-user"></i> Perfil</a> </li> 
											<li> <a href="<?php echo $ruta?>/users/logout"><i class="fa fa-sign-out"></i> Salir</a> </li>
										</ul>
									</li>
									
						</ul>
				</li>
				<li id="TicketTareas" class="second top_bell_nav">
				   <ul class="top_dp_agile ">
						  <?php    $rol=$this->request->session()->read('Auth.User.rol');// $this->Session->read('Auth.User.rol'); 
                 

                               if($rol>1){
						   ?>
									<li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-bell-o" aria-hidden="true"></i> <span class="badge blue"><?= count($TICKETP);?></span></a>
										<ul    id="ticketspendientes" class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>Tus Notificaciones</h3>
												</div>
											</li>
										     
										<?php foreach ($TICKETP as $ticket ) {
											# code...
										 ?>

										 


										<li class="removeitem"><a href="<?= $ruta?>/tickets/view/<?=$ticket["id"]?> ">
												<div class="user_img"><img src="<?= $ruta  ?>/img/<?= $ticket["imagen"] ?>" alt=""></div>
											   <div class="notification_desc">
											     <h6><?= $ticket["user"] ?></h6>
												<p><?= $ticket["name"] ?></p>
												<p><span><?= $ticket["fecha"] ?></span></p>
												</div>
											  <div class="clearfix"></div>	
											 </a></li>
											 	<?php
										}
											 	?>

											 <li>
												<div class="notification_bottom">
													<a href="#">Ver todas las tareas</a>
												</div> 
											</li>
										</ul>
									</li>
									<?php }?>
									
						</ul>

				</li>
				<li class="hidden second top_bell_nav">
				   <ul class="top_dp_agile ">
									<li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span class="badge blue"><?= count($mensajes);?></span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>Tus Mensages</h3>
												</div>
											</li>
											<?php  foreach ($mensajes as $mensaje ) {
												# code...
											 ?>
											<li  id="<?php echo $mensaje['ide']?>" nombre="<?php echo $mensaje['emisor']?>" imagen="<?php echo $mensaje['imge']?>" class="chaton"  ><a href="#">
												<div class="user_img"> 
														<img src="<?= $ruta  ?>/img/usuarios/<?= $mensaje["imge"] ?>" alt="">
												</div>
											   <div class="notification_desc">
											     <h6><?php echo $mensaje['emisor'];?></h6>
												<p><?php echo $mensaje['mensaje'];?></p>
												<p><span>3 hour ago</span></p>
												</div>
											  <div class="clearfix"></div>	
											 </a></li>
											 <?php 
											}
											 ?>
											 
										</ul>
									</li>
									
						</ul>
				</li>

				<li class="second top_bell_nav">
				 <?php    $rol=$this->request->session()->read('Auth.User.rol');// $this->Session->read('Auth.User.rol'); 
                               if($rol>1){
						   ?>
				   <ul class="top_dp_agile ">
				       <li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i><span class="badge blue"><?php if(isset($Pendientes)) { echo  $Pendientes[0]["tareas"]; }else { echo "0";}?></span></a>
										<ul class="dropdown-menu">
											<?php if(isset($Pendientes)) { ?>
											<li>
												<div class="notification_header">
													<h3>Pendientes  <?= $Pendientes[0]["tareas"]?></h3>
												</div>
											</li>
											<li><a href="#">
												<div class="task-info">
													<span class="task-desc">Porcentaje completado</span><span class="percentage"><?= $Pendientes[0]["porcentaje"]?>%</span>
													<div class="clearfix"></div>	
												</div>
												<div class="progress progress-striped active">
													<div class="bar yellow" style="width: <?= $Pendientes[0]["porcentaje"]?>%;"></div>
												</div>
											</a></li>
											<li>
												<div class="notification_bottom">
													<a href="<?= $ruta ?>/tickets/">Ver tareas pendientes</a>
												</div> 
											</li>
											<?php }?>
										</ul>
									</li>	
								</ul>
								<?php }?>
				</li>

				<li class="second w3l_search">
				 
						<div class="notification_bottom">
													<a  href="/users/logout"><i class="fa fa-sign-out"></i></a>
												</div> 
					
				</li>
				<li class="second full-screen">
					<section class="full-top">
						<button id="toggle"><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>	
					</section>
				</li>

			</ul>
			<!-- //nav -->
			
		</div>
	

	  <?= $this->Flash->render() ?>
    <div class="wthree_agile_admin_info">
        <?= $this->fetch('content') ?>

  
<?php 

include('chat.ctp'); 
?>

    </div>
<!-- banner -->
<!--copy rights start here-->
<div style="height: 300px"></div>
<div  style="height: 500px" class="copyrights ">
	 <p>Derechos reservados para SINIA </p>
</div>	
<!--copy rights end here-->
<!-- js -->

<script type="text/javascript" src="<?php echo $ruta ?>/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="<?php echo $ruta ?>/datatable/js/jquery.dataTables.js"></script>




<script>
function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
}
</script>





<script type="text/javascript">
	$(document).ready(function(){

			$('#table').DataTable();
	});
</script>



	<!-- /amcharts -->
				<script src="<?php echo $ruta ?>/js/amcharts.js"></script>
		       <script src="<?php echo $ruta ?>/js/serial.js"></script>
				<script src="<?php echo $ruta ?>/js/export.js"></script>	
				<script src="<?php echo $ruta ?>/js/light.js"></script>
				<script src="<?php echo $ruta ?>/js//ajax/TicketDepartamento.js"></script>
				<!-- Chart code -->
 
<!-- Chart code -->
<script>
var chart = AmCharts.makeChart("chartdiv1", {
    "type": "serial",
	"theme": "light",
    "legend": {
        "horizontalGap": 10,
        "maxColumns": 1,
        "position": "right",
		"useGraphSettings": true,
		"markerSize": 10
    },
    "dataProvider": [{
        "year": 2017,
        "Formateo": 2.5,
        "Energia": 2.5,
        "Internet": 2.1,
        "Correo": 0.3,
        "Usuarios reseteo": 0.2,
        "software": 0.1
    }, {
        "year": 2016,
      "Formateo": 5.5,
        "Energia": 4.5,
        "Internet": 2.1,
        "Correo": 0.3,
        "Usuarios reseteo": 0.2,
        "software": 0.1
    }],
    "valueAxes": [{
        "stackType": "regular",
        "axisAlpha": 0.5,
        "gridAlpha": 0
    }],
    "graphs": [{
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Formateo",
        "type": "column",
		"color": "#000000",
        "valueField": "europe"
    }, {
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Energia",
        "type": "column",
		"color": "#000000",
        "valueField": "namerica"
    }, {
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Internet",
        "type": "column",
		"color": "#000000",
        "valueField": "asia"
    }, {
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Correo",
        "type": "column",
		"color": "#000000",
        "valueField": "lamerica"
    }, {
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Usuarios reseteo",
        "type": "column",
		"color": "#000000",
        "valueField": "meast"
    }, {
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "software",
        "type": "column",
		"color": "#000000",
        "valueField": "africa"
    }],
    "rotate": true,
    "categoryField": "year",
    "categoryAxis": {
        "gridPosition": "start",
        "axisAlpha": 0,
        "gridAlpha": 0,
        "position": "left"
    },
    "export": {
    	"enabled": true
     }
});
</script>

	<!-- //amcharts -->
		<script src="<?php echo $ruta ?>/js/chart1.js"></script>
				<script src="<?php echo $ruta ?>js/Chart.min.js"></script>
		<script src="<?php echo $ruta ?>/js/modernizr.custom.js"></script>
		
		<script src="<?php echo $ruta ?>/js/classie.js"></script>
		<script src="<?php echo $ruta ?>/js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
			<!-- script-for-menu -->

<!-- /circle-->
	 <script type="text/javascript" src="<?php echo $ruta ?>/js/circles.js"></script>
 	 <script type="text/javascript" src="<?php echo $ruta ?>/js/ajax/TicketContratiempos.js"></script>
	<!-- //circle -->
	<!--skycons-icons-->
<script src="<?php echo $ruta ?>/js/skycons.js"></script>


<script>
									 var icons = new Skycons({"color": "#fcb216"}),
										  list  = [
											"partly-cloudy-day"
										  ],
										  i;

									  for(i = list.length; i--; )
										icons.set(list[i], list[i]);
									  icons.play();
								</script>
								<script>
									 var icons = new Skycons({"color": "#fff"}),
										  list  = [
											"clear-night","partly-cloudy-night", "cloudy", "clear-day", "sleet", "snow", "wind","fog"
										  ],
										  i;

									  for(i = list.length; i--; )
										icons.set(list[i], list[i]);
									  icons.play();
								</script>
<!--//skycons-icons-->
<!-- //js -->
<script src="<?php echo $ruta ?>/js/screenfull.js"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});	
		});
		</script>
		<script src="<?php echo $ruta ?>/js/flipclock.js"></script>
	
	<script type="text/javascript">
		var clock;
		
		$(document).ready(function() {
			/*
			clock = $('.clock').FlipClock({
		        clockFace: 'HourlyCounter'
		    });*/
 var ServerTime = $('#my_time').val();
var d = new Date();
var n = d.getHours();
var diff = ServerTime - n;
clock = $('.clock').FlipClock(diff,{  
    clockFace: 'TwentyFourHourClock'  
});  
 
/*
var date  = new Date(2013, 10, 01);
var now   = new Date();
var diff  = now.getTime()/1000 - date.getTime()/1000;

clock = $('.clock').FlipClock(diff, {
    clockFace: 'DailyCounter',
    countdown: false
});*/

		});
	</script>
<script src="<?php echo $ruta ?>/js/bars.js"></script>
<script src="<?php echo $ruta ?>/js/jquery.nicescroll.js"></script>
<script src="<?php echo $ruta ?>/js/scripts.js"></script>

<script type="text/javascript" src="<?php echo $ruta ?>/js/bootstrap-3.1.1.min.js"></script>


 

 	 <script type="text/javascript" src="/tickets/js/ajax/MultipleTicketsYear.js"></script>

 	 <script type="text/javascript" src="<?php echo $ruta ?>/js/ajax/filteruser.js"></script>
 	 	 <script type="text/javascript" src="<?php echo $ruta ?>/js/chat.js"></script>
	 <script type="text/javascript" src="<?php echo $ruta ?>/js/ajax/chats.js"></script>
       
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="<?php echo $ruta ?>/js/ajax/chartdate.js"></script>

</body>
</html>
