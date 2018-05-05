	      
$(document).ready(function(){  




$("#TicketTareas").on("click", ".urltarea", function(event){
 

	alert("tarea");
	id = $(this).attr("id");
	window.location.href = '/Tickets/view/'+id;     

});
	

	$.getJSON(base+"Dashboards/getTicketPorContratiempos", function(data) { //obten         


	                  var colors = [
										['#ffffff', '#fd9426'], ['#ffffff', '#fc3158'],['#ffffff', '#53d769'], ['#ffffff', '#147efb']
									];
					 $.each(data, function( index, value ) {
//  alert( index + ": " + value );


						var child = document.getElementById('circles-' + value["id"]),
												percentage = value["total"];
												
											Circles.create({
												id:         child.id,
												percentage: percentage,
												radius:     80,
												width:      10,
												number:   	percentage / 1,
												text:       '%',
												colors:     colors[value["id"] - 1]
											});

						}); 
	});


	                 getTicketContratiemposRecursivos();
				     setInterval("getTicketContratiemposRecursivos()",19000);
});







function GoContratiempos(id){


	 alert("gatos");
	window.location.href = '/Tickets/view/'+id;   

}


function getTicketContratiemposRecursivos(){

 

        var contador =0;
	  $.getJSON(base+"Dashboards/GetTareasPendientes", function(data) { //obten         

          //  alert(data);
		$.each(data, function( index, value ) {
          contador +=1;
         
        });

	if(tareas<contador){
		var x = document.getElementById("myAudio"); 
       // x.play(); 
        tareas = contador;  

         var items = '';
        $.each(data, function( index, value ) {





        var item  =   '<li onclick="GoContratiempos('+data[index]['id']+')" id ="'+data[index]['id']+'" class="urltarea"><a   href="/tickets/view/'+data[index]['id']+'"></a></li>';
						 item  += 		 			'<div class="user_img"><img src="/img/'+data[index]['img']+'" alt=""></div>';
											 item  += '<div class="notification_desc">';
											   item  += '<h6>'+data[index]['user']+'</h6>';
											 item  += '<p>'+data[index]['name']+'</p>';
										 item  += '<p><span>'+data[index]['fecha']+'</span></p>';
											 item  += '</div>';
											   item  += '<div class="clearfix"></div>';	
											  item  += '</a></li>';

         	items +=item;
        //$("#ticketspendientes>li:eq(1)").html(item);
//         alert(item);
        });


        //# $("#ticketspendientes>li:eq(1)").html(items);


	}

	});

    

    
}