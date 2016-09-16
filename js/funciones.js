
function validarAcceso (){
    $("#mensajes").html("Mensajes del Sistema");
    if($("#login_usuario").val()===""){
        $("#mensajes").html("Usuario no debe estar vacio.");
    }
    else if ($("#password_usuario").val()===""){
        
        $("#mensajes").html("La contraseña no debe estar vacio.");
    }
    else{
        validarAccesoAjax();
    }
 }
 
 function validarAccesoAjax(){
     var datosFormulario=$("#formAcceso").serialize();
     $.ajax({
         type:"POST",
         url:"php/validarAcceso.php",
         data:datosFormulario,
         dataType:'json',
         beforeSend:function(objeto){
             $("#mensajes").html("Enviando datos al servidor...");
             
         },
         success:function(json){
             if(json.acceso==="true"){
                 location.href="menu.html";
                 
             }
             else{
                 $("#mensajes").html("Credencial invalida");
                 
             }
             
         },
         error:function(e){
             $("#mensajes").html("No se pudo conectar con el servidor Error:"+e.status);
         },
         complete:function(objeto,exito,error){
             if(exito==="success"){
                 
             }
         }
         
     });
     
 }
 
 function verificarSesion(programa){
     
     var url= 'php/verificarSession.php';
     if (programa){
        url= '../../../php/verificarSession.php'; 
     }
     var datosFormulario = $("#formAcceso").serialize();
     $.ajax({
         type:"POST",
         url:url,
         data:datosFormulario,
         dataType:'json',
         beforeSend:function(objeto){
             $("#mensajes").html("Enviando datos al servidor...");
             
         },
         success:function(json){
             if(json.activo==="false"){
                if(programa){
                    location.href="../../../index.html";
                }else{
              
                    location.href="index.html";
                      
               }
            }
            else {
               $("#contenido").css("display","block");
            }
            $("#snombre_empresa").html("BIOMEDICA");
            $("#susuario_usuario").html(json.login_usuario);
            $("#mensajes").html(json.mensaje); 
         },
         error:function(e){
             $("#mensajes").html("No se pudo recuperar la session");
         },
         complete:function(objeto,exito,error){
             if(exito==="success"){
                 
             }
         }
         
     })
 }

 function cerrarSesion(){
     var datosFormulario=$("#formAcceso").serialize();
     $.ajax({
         type:"POST",
         url:"php/cerrarSesion.php",
         data:datosFormulario,
         dataType:'html',
         beforeSend:function(objeto){
             $("#mensajes").html("Enviando datos al servidor...");
             
         },
         success:function(mensaje){
             $("#mensajes").html(mensaje);
         },
         error:function(e){
             $("#mensajes").html("No se pudo conectar con el servidor Error:"+e.status);
         },
         complete:function(objeto,exito,error){
             if(exito==="success"){
                 
             }
         }
         
     });
     
 }