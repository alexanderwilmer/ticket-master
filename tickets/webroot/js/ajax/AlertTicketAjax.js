
       var user = ""; 
        var stop =0;
$(document).ready(function(){  
      


GetMensajeAjax();

 


  });

 

function GetMensajeAjax() {

  //  alert(usuario)

    if(stop==1){
      return 0;
    }
    var tdata = {"usuario":user};
       
        $.ajax({
            type: "POST",
            url: "/dashboards/getTicketMEnsajesEmisorReceptor",
            data: tdata,
            success: function(tdata) {
                $("#ShowChats").html("");
                $("#ShowChats").html(tdata);
                 
                  $('.popup-messages').animate({ scrollTop: $('.popup-messages')[0].scrollHeight}, 1000);
                 
             
            },
            error: function() {
                //alert("No se pudo enviar mensaje");
             //    window.location.reload(true);
                console.log("Falla al guardar los datos")
            }
        });
    

    //setTimeout(GetMensajeAjax(usuario), 100000);
}
 
