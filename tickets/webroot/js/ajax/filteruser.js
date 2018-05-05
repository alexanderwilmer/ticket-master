 
$(document).ready(function() {
 
    $("#filteru").change(function() {

         
    });


   $('#filteru').keydown(function (e){
    if(e.keyCode > 0){
    
        var usuario =$("#filteru").val();  

       getUsers(usuario);  
    
    }
 })
  

 
 $("#ffilter").submit(function(e){
    e.preventDefault();
  });

});

 

function getUsers(usuario){ 
  //  var tdata = $("#ffilter").serializeArray();
    //   alert(tdata);
 
       $.ajax({
            type: "POST",
            url: "/dashboards/getUsers",
            data: {usuario: usuario},
            success: function(tdata) {
                $("#lusers").html();
                $("#lusers").html(tdata);
            },
            error: function() {

            }
        });
   


}
  