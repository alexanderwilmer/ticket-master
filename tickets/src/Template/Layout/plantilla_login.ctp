<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">
<head>
<title>Sistema de tickets de soporte</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="/tickets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="/tickets/css/component.css" rel="stylesheet" type="text/css" media="all" />
<link href="/tickets/css/style_grid.css" rel="stylesheet" type="text/css" media="all" />
<link href="/tickets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome-icons -->
<link href="tickets/css/font-awesome.css" rel="stylesheet"> 
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

				<!-- //nav_agile_w3l -->
                <li class="Soporte Sinia"><h1><a href=""><i class="fa fa-graduation-cap" aria-hidden="true"></i>Soporte   </a></h1></li>
					
				<li class="second w3l_search admin_login">
				 
						<form action="#" method="post">
							<
						</form>
					
				</li>
				<li class="second full-screen">
					<section class="full-top">
						<button id="toggle"><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>	
					</section>
				</li>

			</ul>
			<!-- //nav -->
			
		</div>
		<div class="clearfix"></div>
		<!-- //w3_agileits_top_nav-->
		
	  
    <div class="">
        <?= $this->fetch('content') ?>
    </div>
		<!-- //inner_content-->
	</div>
<!-- banner -->
<!--copy rights start here-->
<div class="copyrights">
	 <p> Derechos reservado a TMC </p>
</div>	
<!--copy rights end here-->
<!-- js -->

          <script type="text/javascript" src="tickets/js/jquery-2.1.4.min.js"></script>
		   
				<script>

        $(function(){
            //default
            $('.map-canvas').prettyMaps({
                address: 'Melbourne, Australia',
                image: 'map-icon.png',
                hue: '#FF0000',
                saturation: -20
            });

            //red map example
            $('#default-map-btn').on('click', function(){
                $('.map-canvas').prettyMaps();
            });

            //green map example
            $('#green-map-btn').on('click', function(){
                $('.map-canvas').prettyMaps({
                    address: 'Melbourne, Australia',
                    image: 'map-icon.png',
                    hue: '#00FF55',
                    saturation: -30
                });
            });

            //blue map example
            $('#blue-map-btn').on('click', function(){
                $('.map-canvas').prettyMaps({
                    address: 'Melbourne, Australia',
                    image: 'map-icon.png',
                    hue: '#0073FF',
                    saturation: -30,
                    zoom: 16,
                    panControl: true,
                    zoomControl: true,
                    mapTypeControl: true,
                    scaleControl: true,
                    streetViewControl: true,
                    overviewMapControl: true,
                    scrollwheel: false,
                });
            });
            
            //grey map example
            $('#grey-map-btn').on('click', function(){
                $('.map-canvas').prettyMaps({
                    address: 'Melbourne, Australia',
                    image: 'map-icon.png',
                    saturation: -100,
                    lightness: 10
                });
            });
        });

  </script>
<!-- //js -->
<script src="tickets/js/screenfull.js"></script>
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
<script src="tickets/js/jquery.nicescroll.js"></script>
<script src="tickets/js/scripts.js"></script>

<script type="text/javascript" src="/tickets/js/bootstrap-3.1.1.min.js"></script>


</body>
</html>
