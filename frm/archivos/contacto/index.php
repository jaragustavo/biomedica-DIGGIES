<html>
    <head>
          <title>Formulario de Contacto</title>
          <link rel="icon" type="image/png" href="../../../mario.png"/>
          <meta charset="UTF-8">
          <meta name="viewreport" content="width=divice-width,initial-scale=1.0">
          <link href="../../../css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
          <link href="../../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
          <link href="../../../css/estilos.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="confirmar"></div>
        <div id="buscar"></div>
       
        <div id="panelPrograma" class="panel panel-primary">
                <div class="panel-body">
                    <form id="formPrograma" enctype="multipart/form-data" method="POST">
                        <div class="row">
                            <div class="col-md-1">
                                <span>Nombre</span>
                            </div>
                            <div class="col-md-3">
                                <input id="nombre" name="nombre" 
                                       type="texto" class="form-control input-sm" placeholder="Nombre">
                            </div>   
                        </div>
                        <div class="row">
                            <div class="col-md-1">
                                <span>Apellido</span>
                            </div>
                            <div class="col-md-3">
                                <input id="apellido" name="apellido" 
                                       type="texto" class="form-control input-sm" placeholder="Apellido">
                            </div>   
                        </div>
                        <div class="row">
                            <div class="col-md-1">
                                <span>Asunto</span>
                            </div>
                            <div class="col-md-3">
                                <input id="asunto" name="asunto" 
                                       type="texto" class="form-control input-sm" placeholder="Asunto">
                            </div>   
                        </div>  
                        <div class="row">
                            <div class="col-md-1">
                                <span>Email</span>
                            </div>
                            <div class="col-md-3">
                                <input id="email" name="email" 
                                       type="texto" class="form-control input-sm" placeholder="Email">
                            </div>   
                        </div>
                        <div class="row">
                            <div class="col-md-1">
                                <span>Telefono</span>
                            </div>
                            <div class="col-md-3">
                                <input id="telefono" name="telefono" 
                                       type="texto" class="form-control input-sm" placeholder="Telefono">
                            </div>   
                        </div>
                        <div class="row">
                            <div class="col-md-1">
                                <span>Celular</span>
                            </div>
                            <div class="col-md-3">
                                <input id="celular" name="celular" 
                                       type="texto" class="form-control input-sm" placeholder="Celular">
                            </div>   
                        </div>
                        <div class="row">
                            <div class="col-md-1">
                                <span>Mensaje</span>
                            </div>
                            <div class="col-md-3">
                                <textarea id="mensaje" name="mensaje" 
                                       type="texto" class="form-control input-sm" placeholder="Mensaje"
                                       rows="5" cols="10"></textarea>
                            </div>   
                        </div>
                   </form>
              </div>
              <div class="panel-footer centrado">
                  <button id="botonEnviar" type="button"
                          class="btn btn-primary btn-sm">Enviar</button>
                  <button id="botonLimpiar" type="button"
                          class="btn btn-primary btn-sm">Limpiar</button>
                  <button id="botonSalir" type="button"
                          class="btn btn-primary btn-sm">Salir</button>
              </div>
         </div>
         <div id="mensajes" class="well well-sm centrado">
             Mensajes del sistema
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
                  $("#botonEnviar").on("click",function(){
                      enviarMensaje();
                  });
                  $("#botonSalir").on("click",function(){
                      location.href="../../../menu.html";
                  });
                  $("#botonLimpiar").on("click",function(){
                      limpiarCampos();
                  });
                  
         </script>
    </body>
    
</html>