<!DOCTYPE html>
<html>
    <head>
	<title> Carga de Usuarios </title>
        
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     
       
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
   </head>
   <body>
       <div id="confirmar"></div>
       <div id="buscar"></div>
       <div id="panelPrograma" class="panel panel-primary">
           <div class="panel-body">
               <form id="formPrograma" enctype="multipart/form-data" method="POST">
                   <div class="row">
                       <div class="col-md-1">
                           <span>Id</span>
                       </div>
                       <div class="col-md-1">
                           <input id="id" name="id"
                                  type="text"
                                  class="form-control input-sm"
                                  placeholder="Id">
                       </div>
                       <div class="col-md-1 derecha">
                           <button id="botonBuscarIdPublicacion"
                                   type="button"
                                   class="btn btn-primary btn-sm">
                               <span class="glyphicon glyphicon-search" ></span>
                           </button>
                       </div>
                   </div>   
                   <div class="row">
                       <div class="col-md-1">
                               <span>Titulo</span>
                       </div>
                       <div class="col-md-2">
                           <input id="titulo" name="titulo"
                                  type="text"
                                  class="form-control input-sm"
                                  placeholder="Titulo">
                       </div>                      
                   </div>    
                   <div class="row">
                       <div class="col-md-1">
                               <span>Contenido</span>
                       </div>
                       <div class="col-md-5">
                           <textarea id="contenido" name="contenido"
                                  type="text" class="form-control input-sm"
                                  placeholder="Contenido" cols="10" rows="5"></textarea>
                       </div>                      
                   </div>     
                   <div class="row">
                       <div class="col-md-1">
                               <span>Imagen</span>
                       </div>
                       <div class="col-md-1">
                           <input id="imagen" name="imagen"
                                  type="file"
                                  class="btn btn-primary btn-sm">
                           </input>
                       </div>                      
                   </div>   
                 
                    <div class="panel-footer centrado">
                         <button id="botonAgregar" type="button"
                                 class="btn btn-primary btn-sm">Agregar</button>
                         <button id="botonModificar" type="button"
                                 class="btn btn-primary btn-sm">Modificar</button>
                          <button id="botonEliminar" type="button"
                                 class="btn btn-primary btn-sm" data-toggle="modal" 
                                 data-target="#confirmarEliminar">Eliminar</button>
                         <button id="botonCancelar" type="button"
                                 class="btn btn-primary btn-sm">Cancelar</button>       
                         <button id="botonSalir" type="button"
                                 class="btn btn-primary btn-sm">Salir</button>
                     </div> 
                </div>
                <div id="mensajes" class="well well-sm centrado">
                     Mensajes del sistema
                </div>
                <div class="modal fade" id="confirmarEliminar" tabindex="-1" role="dialog" 
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
         <script src="../../../js/jquery.min.js" type="text/javascript">
         </script>
         <script src="../../../js/bootstrap.min.js" type="text/javascript">
         </script> 
         <script src="../../../js/funciones.js" type="text/javascript">
         </script>
         <script src="js/funciones.js" type="text/javascript">
         </script>
         <script>
             //verificarSesion(true);
             $("#buscar").css("dispaly","none");
             $("#botonBuscarIdPublicacion").on('click',function(){
                          $("#buscar").load("buscar.html");
                          $("#buscar").fadeIn("slow");
                          $("#panelPrograma").fadeOut("slow");
                          });
                   $("#botonAgregar").on("click",function(){
                      agregarPublicacion();
                  });
                   $("#botonModificar").on("click",function(){
                      modificarPublicacion();
                  });
                   $("#botonEliminarAlert").on("click",function(){
                      eliminarPublicacion();
                      $("#confirmarEliminar").modal('hide')
                  });
                   $("#botonSalir").on("click",function(){
                       location.href="../../../menu.html";
                   });
                     $("#botonCancelar").on('click',function(){
                             $("#botonAgregar").prop('disabled',false);
                              $("#botonModificar").prop('disabled',true);
                               $("#botonEliminar").prop('disabled',true);
                                $("#botonCancelar").prop('disabled',true);
                            $("#id").prop('disabled',true);
                            limpiarCampos();
                     });
        </script>
    </body>
</html>       