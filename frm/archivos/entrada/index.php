<!DOCTYPE html>
<html>
    <head>
	<title> Entrada de Equipo </title>
	<link rel="icon" type = "image/png" href="../../imag/logo.png"/>
        <meta charset="UTF-8">
        <meta name="viewport" content ="width=device-width",
              initial-scale="1.0">
        <link href="../../../css/bootstrap-theme.min.css"
              rel="stylesheet" type="text/css">
        <link href="../../../css/bootstrap.min.css"
              rel="stylesheet" type="text/css">
        <link href="../../../css/estilos.css"
              rel="stylesheet" type="text/css">
        
    <!--      
   <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
  -->
 <!-- Latest compiled and minified CSS -->
 <!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->
    <!-- Optional theme -->
  <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous"> -->
    <!-- Latest compiled and minified JavaScript -->
  <!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> -->
  <!-- Datepicker Files -->
    
         <link rel="stylesheet" href="../../../css/bootstrap-datepicker3.css">
         <link rel="stylesheet" href="../../../css/bootstrap-datepicker.standalone.css">
    
         <script src="../../../js/jquery.min.js" type="text/javascript">
         </script>
         <script src="../../../js/bootstrap.min.js" type="text/javascript">
         </script> 
         <script src="../../../js/funciones.js" type="text/javascript">
         </script>
         <script src="js/funciones.js" type="text/javascript">
         </script>
         
         <script src="../../../css/bootstrap-theme.min.css" type="text/javascript">
         </script> 
         <script src="../../../css/bootstrap.min.js" type="text/javascript">
         </script> 
        <script src="../../../js/bootstrap-datepicker.js"></script>
        <!-- Languaje -->
        <script src="../../../locales/bootstrap-datepicker.es.min.js"></script>
   </head>
   <body>
       <div id="confirmar"></div>
        <div id="buscar"></div>
      
       <div id="panelPrograma" class="panel panel-primary">
           <div class="panel-body">
               <form id="formPrograma" enctype="multipart/form-data" method="POST">    
                  <input type="hidden" id="bpagina" name="bpagina" value="1"/>
                  <div class="row">
                     <div class="col-md-2 derecha">
                        <span>Código Entrada</span>
                     </div>
                     <div class="col-md-1">
                         <input id="codigo_entrada" name="codigo_entrada" type="text" 
                                class="form-control input-sm" placeholder="Codigo Entrada" disabled="true"/>
                    </div> 
                    <div class="col-md-1 izquierda">
                           <button id="botonBuscarEntrada"
                                   type="button"
                                   class="btn btn-primary btn-sm izquierda">
                               <span class="glyphicon glyphicon-search" ></span>
                           </button>
                    </div>
                </div>
                <div class="row">
                     <div class="col-md-2 derecha">
                        <span>Orden Compra</span>
                    </div>
                     <div class="col-md-2">
                         <input id="orden_compra" name="orden_compra" type="text"
                                class="form-control input-sm" placeholder="Orden Compra"/>
                     </div> 
                     <div class="col-md-1 derecha">
                        <span>Tipo Entrada</span>
                    </div>
                  <!--   <div class="col-md-2 izquierda">
                         <input id="tipo_entrada" name="tipo_entrada" type="text"
                                class="form-control input-sm" placeholder="Tipo Entrada" disabled="true"/>
                     </div>
                  -->
                  <div class="col-md-2" id="tipo_entrada" name="tipo_entrada">
                     
                  </div>
                   <!--  <div class="col-md-1 izquierda">
                           <button id="botonBuscarTipoEntrada"
                                   type="button"
                                   class="btn btn-primary btn-sm izquierda">
                               <span class="glyphicon glyphicon-search" ></span>
                           </button>
                      </div>
                   -->
                </div>
                 <div class="row">
                     <div class="col-md-2 derecha">
                        <span>Tipo Licitación</span>
                     </div>
                     <div class="col-md-2" id="tipo_licitacion" name="tipo_licitacion">
                         <!--
                         <input id="tipo_licitacion" name="tipo_licitacion" type="text" disabled="true"
                                class="form-control input-sm" placeholder="Tipo Licitación" /> -->
                         
                     </div> 
                    <div class="col-md-1 derecha">
                        <span>Proveedor</span>
                    </div>
                     <div class="col-md-2 izquierda">
                         <input id="proveedor" name="proveedor" type="text" disabled="true"
                                class="form-control input-sm" placeholder="Proveedor" />
                     </div> 
                     <div class="col-md-1 izquierda">
                           <button id="botonBuscarProveedor"
                                   type="button"
                                   class="btn btn-primary btn-sm izquierda">
                               <span class="glyphicon glyphicon-search" ></span>
                           </button>
                      </div>
                    
                  </div>
                  <div class="row">
                     <div class="col-md-2 derecha">
                        <span>Nro.Licitación</span>
                    </div>
                     <div class="col-md-2">
                         <input id="numero_licitacion" name="numero_licitacion" type="text"
                                class="form-control input-sm" placeholder="Nro.Licitación"/>
                     </div> 
                     <div class="col-md-1 derecha">
                        <span>Nro.Factura</span>
                    </div>
                     <div class="col-md-2">
                         <input id="numero_factura" name="numero_factura" type="text"
                                class="form-control input-sm" placeholder="Nro.Factura"/>
                     </div>   
                      <div class="col-sm-1 derecha">
                        <span>Fec.Factura</span>
                    </div>
                     <div class="col-md-2">
                         <input id="fecha_factura" name="fecha_factura" type="text"
                                 class="form-control datepicker" placeholder="Fecha Factura">
                                
                                
                     </div>    
                                        
                </div>
                <div class="row">
                    <div class="col-md-2 derecha">
                        <span>Año Licitación</span>
                    </div>
                     <div class="col-md-2">
                         <input id="anio_licitacion" name="anio_licitacion" type="text"
                                class="form-control input-sm" placeholder="Año Licitación"/>
                     </div> 
                    
                    <div class="col-md-1 derecha">
                        <span>Nro.Remision</span>
                    </div>
                     <div class="col-md-2">
                         <input id="numero_remision" name="numero_remision" type="text"
                                class="form-control input-sm" placeholder="Nro.Remision"/>
                     </div>  
                     <div class="col-md-1 derecha">
                        <span>Fec.Remision</span>
                    </div>
                     <div class="col-md-2 derecha">
                         <input id="fecha_remision" name="fecha_remision" type="date"
                                 class="form-control datepicker" placeholder="Fecha Remision" size='30'/>
                     </div>   
                </div>
            <br>
            <div id="detalleTitulo">
               <table class="table table-bordered table-striped table-hover">
                   <thead>
                       <tr>
                           <th style="width: 5%" class="centrado">Elegir </th>
                           <th style="width: 10%" class="centrado">Código</th>
                           <th style="width: 35%" class="centrado">Equipo</th>
                           <th style="width: 10%" class="centrado">Serie </th>
                           <th style="width: 10%" class="centrado">Fecha Fabricación</th>
                           <th style="width: 10%" class="centrado">Plazo Garantía</th>
                           <th style="width: 5%" class="centrado">Precio</th>
                           <th style="width: 5%" class="centrado">Cantidad</th>
                           <th style="width: 10%" class="centrado">Total Precio</th>
                          
                       </tr>
                   </thead>
                   <tbody id="detalleDatos">
     
                       <!--<tr>
         <td id='elegir'><input type='checkbox'></input></td>
         <td id='codigo_producto'></td>
         <td id='descripcion_producto'></td>
         <td><input name='serie' id='serie' size='15' type='text'></input></td>
         <td> <input id='fecha_fabricacion' name='fecha_fabricacion' type='text'class='form-control datepicker' placeholder='Fecha Remision' size='30' /></td>
         <td><input name='plazo_garantia' id='plazo_garantia'  size='10' type='text'></input></td>
         <td><input name='precio' id='precio' type='text' size='15'></input></td>
         <td><input name='cantidad' id='cantidad' type='text' size='10'></input></td>
         <td><input name='total_precio' id='total_precio' type='text' size='15'></input></td>
     
        </tr>-->
                 
                   </tbody>
              </table>
           </div>
            
           <input TYPE="hidden" id="codigo_proveedor" name="codigo_proveedor" type="text" >
           
            </form>
            <div class="panel-footer centrado">
                         <button id="botonAgregarDetalle" type="button"
                                 class="btn btn-primary btn-sm" data-toggle="modal" 
                                 data-target="#agregarDetalle">Agregar Detalle</button>
                         <button id="botonEliminarDetalle" type="button"
                                 class="btn btn-primary btn-sm">Eliminar Detalle</button>
                
                
                         <button id="botonModificar" type="button"
                                 class="btn btn-primary btn-sm">Modificar</button>
                          <button id="botonEliminar" type="button"
                                 class="btn btn-primary btn-sm" data-toggle="modal" 
                                 data-target="#confirmarEliminar">Eliminar</button>
                         <button id="botonGuardar" type="button"
                                 class="btn btn-primary btn-sm">Guardar</button>       
                         <button id="botonSalir" type="button"
                                 class="btn btn-primary btn-sm">Salir</button>
            </div> 
           
    </div>
    <div id="mensajes" class="well well-sm centrado">
        Mensajes del sistema
    </div>
    <div class="modal fade" id="agregarEntrada" tabindex="-1" role="dialog" 
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header centrado">
                     <button  type="button"
                      class="close" data-dismiss="modal">
                         <span aria-hidden="true">&times;</span>
                         </button>
                    <h4 class="modal-title" id="myModalLabel">
                        Mensaje del sistema</h4>
                </div>
                <div class="modal-body">Esta seguro de eliminar estos datos</div>
                <div class="modal-footer centrado">
                    <button id="botonEliminarAlert" type="button"  class="btn btn-primary btn-sm">
                        Eliminar</button>
                    <button  type="button"  class="btn btn-default btn-sm" data-dismiss="modal">
                        Cancelar</button>

                </div>
            </div>
        </div>
    </div>  
         
 <script>
             
        obtenerListaTipoMovimiento();
        obtenerListaTipoLicitacion();
        
          $("#detalleDatos").on("click", function(e){
             $(".numero").css("text-align","right");
           
           });   
         $("#detalleDatos").on("keyup",  "#cantidad,#precio",function(e){
            calcularTotal();
             
         });   

      
         $("#detalleDatos").on("click",  function(e){
             $("tbody tr").each(function (index) {
                $(this).find(".datepicker").datepicker({
                        format: "dd/mm/yyyy",
                        language: "es",
                        autoclose: true
                }); 
             });    
             
         });
            
            
        $('.datepicker').datepicker({
                format: "dd/mm/yyyy",
                language: "es",
                autoclose: true
        });  



         //verificarSesion(true);
         $("#buscar").css("display","none");

         $("#botonBuscarEntrada").on('click',function(){
                      $("#buscar").load("buscarEntrada.html");
                      $("#buscar").fadeIn("slow");
                      $("#panelPrograma").fadeOut("slow");
         });
          $("#botonBuscarTipoEntrada").on('click',function(){
                      $("#buscar").load("buscarTipoEntrada.html");
                      $("#buscar").fadeIn("slow");
                      $("#panelPrograma").fadeOut("slow");
         });  

         $("#botonBuscarProveedor").on('click',function(){
                      $("#buscar").load("buscarProveedor.html");
                      $("#buscar").fadeIn("slow");
                      $("#panelPrograma").fadeOut("slow");
         });


         $("#botonAgregarDetalle").on('click',function(){
                      agregar=1;
                      $("#buscar").load("buscarEquipo.html");
                      $("#buscar").fadeIn("slow");
                      $("#panelPrograma").fadeOut("slow");
                      });
          $("#botonEliminarDetalle").on('click',function(){
                     eliminarDetalle();
          });


           $("#botonGuardar").on('click',function(){
                 agregarEntrada();


           }); 
           $("#botonSalir").on("click",function(){
                 location.href="../../../menu.html";
             });
     </script>
        
    </body>
</html>       