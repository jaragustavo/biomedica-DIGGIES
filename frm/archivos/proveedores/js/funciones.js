
function agregarProveedor(){
    var formData= new FormData(document.getElementById("formPrograma"));
        $.ajax({
                url:"php/agregarProveedor.php",
                type:"post",
                dataType:"html",
                data:formData,
                cache:false,
                contentType:false,
                processData:false,
                success:function(res){
                    $("#mensajes").html(res);
                   // $("#botonEnviar").prop('disabled',true);
                   // $("#botonLimpiar").prop('disabled',true);
                },
                error:function(e){
                    $("#mensajes").html("No se puede agregar los datos,Error:"+e.status);
                    
                } 
        });
}

function limpiarCampos (){
    $("#nombre").val("");
    $("#contacto").val("");
    $("#email").val("");
    $("#telefono").val("");
    $("#direccion").val("");
    $("#ruc").val("");
}


