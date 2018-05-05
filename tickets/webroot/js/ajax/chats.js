
       var user = ""; 
        var stop =0;
$(document).ready(function(){  
      






        $("#lusers").on("click", ".chaton", function(event){
   

   //   

          $('#qnimate').addClass('popup-box-on');
                    

           user = $(this).attr("id");    
         
         var imagen = $(this).attr("imagen");    
         var nombre = $(this).attr("nombre");    
            var id = $(this).attr("id");    
               $("#imgu").attr("src","/img/usuarios/"+imagen);
               $("#nameu").html(nombre); 
              $("#receptor_id").val(id);    


                GetMensajeAjax();
              setInterval("GetMensajeAjax()",3000);

         });
          

   $(".chaton").on( "click",function () {


   //     $(".chaton").on( "click",function () {


          $('#qnimate').addClass('popup-box-on');
                    

               user = $(this).attr("id");    
         
         var imagen = $(this).attr("imagen");    
         var nombre = $(this).attr("nombre");    
            var id = $(this).attr("id");    
               $("#imgu").attr("src","/img/usuarios/"+imagen);
               $("#nameu").html(nombre); 
              $("#receptor_id").val(id);    


                    GetMensajeAjax();
                   setInterval("GetMensajeAjax()",3000);
         
         });




            $("#removeClass").click(function () {
          $('#qnimate').removeClass('popup-box-on');
            });


            $("#btnsendMensaje").click(function () {
                var mensaje = $("#mensajea").val();    
                var receptor = $("#receptor_id").val();    

              SetMensajeAjax(receptor,mensaje);

              $("#mensajea").val("");    
            });


             $("#btnstop").click(function () {
            
              stop =1;
             });



  });

function SetMensajeAjax(receptor,mensaje) {

  //  alert(usuario)
    var tdata = {receptor_id:receptor,mensaje:mensaje};

       stop=0;
        $.ajax({
            type: "POST",
            url: "/Mensajes/addMensajes",
            data: tdata,
            success: function(tdata) {
               GetMensajeAjax();
             //  $('.popup-messages').scrollTop($('.popup-messages')[0].scrollHeight);
                $('.popup-messages').animate({ scrollTop: $('.popup-messages')[0].scrollHeight}, 1000);
            },
            error: function() {
                alert("No se pudo enviar mensaje");
           //   window.location.reload(true);
                console.log("Falla al guardar los datos")
            }
        });    
}

   
 



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
 
