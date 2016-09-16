var fila=0;
var agregar=0;
function agregarEntrada(){
     
     var detalles = [];
     orden_compra = $("#orden_compra").val();
     codigo_tipo_entrada = $("#lista_tipo_movimiento").val();
     tipo_licitacion = $("#lista_tipo_licitacion").val();
     codigo_proveedor = $("#codigo_proveedor").val();
     numero_licitacion = $("#numero_licitacion").val();
     anio_licitacion = $("#anio_licitacion").val();
     numero_factura = $("#numero_factura").val();
     numero_remision = $("#numero_remision").val();
     fecha_factura = $("#fecha_factura").val();
     fecha_remision = $("#fecha_remision").val();

          
     $("tbody tr").each(function (index) {
         codigo_producto= $(this).find("#codigo_producto").text();
         cantidad= $(this).find("#cantidad").val();
         precio= $(this).find("#precio").val();
         serie= $(this).find("#serie").val(); 
         fecha_fabricacion= $(this).find("#fecha_fabricacion").val(); 
        
         plazo_garantia= $(this).find("#plazo_garantia").val(); 
         
       
         var detalle = {
            "codigo_producto" : codigo_producto,
            "cantidad" : cantidad,
            "precio" : precio,
            "serie" : serie,
            "fecha_fabricacion":  fecha_fabricacion,
            "plazo_garantia": plazo_garantia
      };
      detalles.push(detalle);
      });
      var send = {
        "orden_compra" : orden_compra,
        "codigo_tipo_entrada" : codigo_tipo_entrada,
        "tipo_licitacion" : tipo_licitacion,
        "codigo_proveedor":  codigo_proveedor,
        "numero_licitacion": numero_licitacion,
        "anio_licitacion": anio_licitacion,
        "numero_factura": numero_factura,
        "numero_remision": numero_remision,
        "fecha_factura": fecha_factura,
        "fecha_remision": fecha_remision,
        "detalles" : detalles
       };
 
    // Convertimos la lista de arrays en una cadena con el formato JSON
    var entradaJSON = JSON.stringify(send);
     
    // Realizamos la petición al servidor
    $.post('php/agregar.php', {entrada: entradaJSON},
        function(respuesta) {
             $("#mensajes").html(respuesta);
    }).error(
        function(e){
             $("#mensajes").html("No se puede agregar los datos,Error:"+e.status);
        }
    );
 }   
 
 function calcularTotal(){
     

     
     $("tbody tr").each(function (index) {
        
         cantidad= $(this).find("#cantidad").val().replace(/\./g,'');
        // alert(cantidad);
         precio= $(this).find("#precio").val().replace(/\./g,'');
         var total_precio = cantidad*precio;
         if(!isNaN(cantidad)){
            cantidad = cantidad.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
            cantidad = cantidad.split('').reverse().join('').replace(/^[\.]/,'');
            $(this).find("#cantidad").val(cantidad);
         }
         if(!isNaN(precio)){
            precio = precio.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
            precio = precio.split('').reverse().join('').replace(/^[\.]/,'');
            $(this).find("#precio").val(precio);
         }
         if(!isNaN(total_precio)){
            total_precio = total_precio.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
            total_precio = total_precio.split('').reverse().join('').replace(/^[\.]/,'');
            $(this).find("#total_precio").val(total_precio);
         }      
       
     });
   
 
 }
 
function eliminarDetalle(){
    
        $('#detalleDatos input[type=checkbox]').each(function () {
                if (this.checked) {
                   $(this).closest('tr').remove();
                                      
                }
       });
    
    
}

function buscarEquipo(){
   // alert($("#detalleDatos").html()); 
    var datosFormulario = $("#formBuscar").serialize();
    $.ajax({
        url:'php/buscarEquipo.php',
        type:'POST',
        data:datosFormulario,
        dataType:'json',
        beforeSend: function(objeto){
            $("#mensajes").html("Enviando datos al servidor..");
            $("#contenidoBusqueda").css("display","none");
        },
        success:function(json){
            $("#mensajes").html(json.mensaje);
            $("#contenidoBusqueda").html(json.contenido);        
            $("#contenidoBusqueda").fadeIn("slow");
            $("tbody tr").on("click",function(){
                var id=$(this).find("td:first").html();
                var descripcion=$(this).find("td:nth-child(2)").html();
             //   fila++;
                $("#panelBuscar").html("");
                
               //$("#detalleDatos").html($("#detalleDatos").html()+"<tr><td style='width: 5%'><input type='checkbox' name="+fila+" ></input></td><td style='width: 10%' id='codigo_producto'>"+id+"</td><td style='width: 30%' id='descripcion_producto'>"+descripcion+"</td><td style='width: 10%'><input type='text' name='serie' id='serie'></input></td><td style='width: 5%'><input id='fecha_fabricacion' type='text' ></input></td><td style='width: 5%'><input  id='inicio_garantia' type='text'></input></td><td style='width: 5%'><input id='plazo_garantia' type='text'></input></td><td style='width: 10%'><input id='precio_unitario' type='text'></input></td><td style='width: 10%'><input id='cantidad' type='text'></input></td><td style='width: 10%'><input id='total_precio' type='text'></input></td></tr>");
              // $("#detalleDatos").html($("#detalleDatos").html()+"<tr><td><input type='checkbox' id="+fila+" ></input></td><td>"+id+"</td><td id='descripcion'>"+descripcion+"</td><td><input type='text' id='serie' name='serie'></input></td></tr>"); 
               if (agregar==1){ 
                  $('#detalleDatos').append("<tr><td id='elegir'><input type='checkbox'></input></td><td id='codigo_producto'>"+id+"</td><td id='descripcion_producto'>"+descripcion+"</td><td><input name='serie' id='serie' size='15' type='text'></input></td><td> <input id='fecha_fabricacion' name='fecha_fabricacion' type='date'"+
                    " class='form-control datepicker'></input></td><td><input name='plazo_garantia' id='plazo_garantia' type='date' class='form-control datepicker'></input></td><td><input name='precio' id='precio' type='text' size='15' style='text-align:right;'></input></td><td><input name='cantidad' id='cantidad' type='text' size='10' style='text-align:right;'></input></td><td><input name='total_precio' id='total_precio' type='text' size='15' disabled='true' style='color: black; font-family: Verdana;text-align:right;'></input></td></tr>");
                  agregar=0;
               }
                
                $("#buscar").fadeOut("slow");
                $("#panelPrograma").fadeIn("slow");
            });
        },
        error:function(e){
            $("#mensajes").html("No se pudo buscar registros Error:"+e.status);
        },
        complete:function(objeto,exito,error){
            if(exito==="success"){
                
        }
        }
        
    });
    
}

function buscarIdEntrada(){
    $('#codigo_entrada').prop('disabled',false);
    var datosFormulario = $('#formPrograma').serialize();
    $.ajax({
        type:'POST',
        url:'php/buscarIdEntrada.php',
        data:datosFormulario,
        dataType:'json',
         beforeSend: function(objeto){
            $("#mensajes").html("Enviando datos al servidor..");
            
        },
         success:function(json){
            $("#mensajes").html(json.mensaje);
            $("#codigo_proveedor").val(json.codigo_proveedor);     
            $("#orden_compra").val(json.orden_compra);    
            $("#numero_licitacion").val(json.numero_licitacion);    
            $("#anio_licitacion").val(json.anio_licitacion);    
            $("#fecha_recepcion").val(json.fecha_recepcion);    
            $("#numero_factura").val(json.numero_factura);    
            $("#numero_remision").val(json.numero_remision);    
            $("#fecha_factura").val(json.fecha_factura);    
            $("#fecha_remision").val(json.fecha_remision);  
            $("#lista_tipo_movimiento").val(json.codigo_tipo_movimiento); 
            $("#codigo_tipo_estado").val(json.codigo_tipo_estado); 
            $("#lista_tipo_licitacion").val(json.codigo_tipo_licitacion); 
            $("#proveedor").val(json.nombre_proveedor); 
            $("#detalleDatos").html(json.contenido);
            
        },
        error:function(e){
            $("#mensajes").html("No se pudo recuperar los datos en buscarIdUsuario:"+e.status);
        },
        complete:function(objeto,exito,error){
            if(exito==="success"){
                
            }
        }
    })
}

function buscarNombreProveedor(){
 
    var datosFormulario = $("#formBuscar").serialize();
    $.ajax({
        url:'php/buscarNombreProveedor.php',
        type:'POST',
        data:datosFormulario,
        dataType:'json',
        beforeSend: function(objeto){
            $("#mensajes").html("Enviando datos al servidor..");
            $("#contenidoBusqueda").css("display","none");
        },
        success:function(json){
            $("#mensajes").html(json.mensaje);
            $("#contenidoBusqueda").html(json.contenido);        
            $("#contenidoBusqueda").fadeIn("slow");
            $("tbody tr").on("click",function(){
                var id=$(this).find("td:first").html();
                $("#panelBuscar").html("");
                $("#codigo_entrada").val(id);
                $("#orden_compra").focus();
                buscarIdEntrada();
                $("#buscar").fadeOut("slow");
                $("#panelPrograma").fadeIn("slow");
            });
        },
        error:function(e){
            $("#mensajes").html("No se pudo buscar registros Error:"+e.status);
        },
        complete:function(objeto,exito,error){
            if(exito==="success"){
                
            }
        }
        
    });
    
}


function buscarTipoEntrada(){
 
    var datosFormulario = $("#formBuscar").serialize();
    $.ajax({
        url:'php/buscarTipoEntrada.php',
        type:'POST',
        data:datosFormulario,
        dataType:'json',
        beforeSend: function(objeto){
            $("#mensajes").html("Enviando datos al servidor..");
            $("#contenidoBusqueda").css("display","none");
        },
        success:function(json){
            $("#mensajes").html(json.mensaje);
            $("#contenidoBusqueda").html(json.contenido);        
            $("#contenidoBusqueda").fadeIn("slow");
            $("tbody tr").on("click",function(){
                var id=$(this).find("td:first").html();
                var descripcion=$(this).find("td:nth-child(2)").html();
                
                $("#panelBuscar").html("");
                
                $("#codigo_tipo_entrada").val(id);
                $("#tipo_entrada").val(descripcion);        
                       
                $("#tipo_entrada").focus();
                
                $("#buscar").fadeOut("slow");
                $("#panelPrograma").fadeIn("slow");
            });
        },
        error:function(e){
            $("#mensajes").html("No se pudo buscar registros Error:"+e.status);
        },
        complete:function(objeto,exito,error){
            if(exito==="success"){
                
            }
        }
        
    });
    
}

function obtenerListaTipoMovimiento(){
    var datosFormulario = $("#formBuscar").serialize();
    $.ajax({
        url:'php/buscarListaTipoMovimiento.php',
        type:'POST',
        data:datosFormulario,
        dataType:'json',
        success:function(json){
            $("#tipo_entrada").html(json.contenido);        
           
        },
        error:function(e){
            
        },
        complete:function(objeto,exito,error){
            if(exito==="success"){
                
            }
        }
        
    });
}

function obtenerListaTipoLicitacion(){
    var datosFormulario = $("#formBuscar").serialize();
    $.ajax({
        url:'php/buscarListaTipoLicitacion.php',
        type:'POST',
        data:datosFormulario,
        dataType:'json',
        success:function(json){
            $("#tipo_licitacion").html(json.contenido);        
           
        },
        error:function(e){
            
        },
        complete:function(objeto,exito,error){
            if(exito==="success"){
                
            }
        }
        
    });
}

function buscarProveedor(){
 
    var datosFormulario = $("#formBuscar").serialize();
    $.ajax({
        url:'php/buscarProveedor.php',
        type:'POST',
        data:datosFormulario,
        dataType:'json',
        beforeSend: function(objeto){
            $("#mensajes").html("Enviando datos al servidor..");
            $("#contenidoBusqueda").css("display","none");
        },
        success:function(json){
            $("#mensajes").html(json.mensaje);
            $("#contenidoBusqueda").html(json.contenido);        
            $("#contenidoBusqueda").fadeIn("slow");
            $("tbody tr").on("click",function(){
                var id=$(this).find("td:first").html();
                var descripcion=$(this).find("td:nth-child(2)").html();
                
                $("#panelBuscar").html("");
               
                $("#codigo_proveedor").val(id);
                $("#proveedor").val(descripcion);
                
                $("#proveedor").focus();
                $("#buscarProveedor").fadeOut("slow");
                $("#panelPrograma").fadeIn("slow");
            });
        },
        error:function(e){
            $("#mensajes").html("No se pudo buscar registros Error:"+e.status);
        },
        complete:function(objeto,exito,error){
            if(exito==="success"){
                
            }
        }
        
    });
    
}


function buscarTipoLicitacion(){
 
    var datosFormulario = $("#formBuscar").serialize();
    $.ajax({
        url:'php/buscarTipoLicitacion.php',
        type:'POST',
        data:datosFormulario,
        dataType:'json',
        beforeSend: function(objeto){
            $("#mensajes").html("Enviando datos al servidor..");
            $("#contenidoBusqueda").css("display","none");
        },
        success:function(json){
            $("#mensajes").html(json.mensaje);
            $("#contenidoBusqueda").html(json.contenido);        
            $("#contenidoBusqueda").fadeIn("slow");
            $("tbody tr").on("click",function(){
                var id=$(this).find("td:first").html();
                var descripcion=$(this).find("td:nth-child(2)").html();
                
                $("#panelBuscar").html("");
                
                $("#codigo_tipo_licitacion").val(id);
                $("#tipo_licitacion").val(descripcion);
              
                $("#tipo_licitacion").focus();
                $("#buscarTipoLicitacion").fadeOut("slow");
                $("#panelPrograma").fadeIn("slow");
            });
        },
        error:function(e){
            $("#mensajes").html("No se pudo buscar registros Error:"+e.status);
        },
        complete:function(objeto,exito,error){
            if(exito==="success"){
                
            }
        }
        
    });
    
}

function limpiarCampos (){
    $("#cod_usuario").val("");
    $("#nombre_usuario").val("");
    $("#login_usuario").val("");
    $("#password_usuario").val("");
    $("#rep_pass").val("");
    
}



  
