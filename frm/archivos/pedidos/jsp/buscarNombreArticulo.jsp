<%@page import="cursojavaweb.controlador.ArticulosControlador"%>
<%@page import="org.json.simple.JSONObject"%>
<%@page import= "java.sql.ResultSet"%>
<%
    String nombre_articulo = request.getParameter("bnombre_articulo");
    int pagina = Integer.parseInt(request.getParameter("bpagina"));

    String mensaje = "busqueda exitosa.";
    String contenido = ArticulosControlador.buscarNombre(nombre_articulo, pagina);

    JSONObject obj = new JSONObject();
    obj.put("mensaje", mensaje);
    obj.put("contenido", contenido);

    out.print(obj);
    out.flush();
%>