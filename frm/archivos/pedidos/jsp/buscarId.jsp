
<%@page import="cursojavaweb.controlador.DetallesPedidosControlador"%>
<%@page import="cursojavaweb.modelos.Clientes"%>
<%@page import="cursojavaweb.controlador.PedidosControlador"%>
<%@page import="cursojavaweb.modelos.Pedidos"%>
<%@page import="org.json.simple.JSONObject"%>
<%@page import="java.sql.ResultSet"%>
<%
    int id_pedido = Integer.parseInt(request.getParameter("id_pedido"));
    
   
    String tipo = "error";
    String mensaje = "Datos no encontrados.";
    String nuevo = "true";

    Pedidos pedidos = PedidosControlador.buscarId(id_pedido);
    if (pedidos != null) {
        tipo = "success";
        mensaje = "Datos encontrados.";
        nuevo = "false";
    } else {
        pedidos = new Pedidos();
        pedidos.setId_pedido(0);
        Clientes cliente=new Clientes();
        pedidos.setCliente(cliente);
        }
    
    String contenido_detalle = DetallesPedidosControlador.buscarIdPedido(id_pedido);
    
    JSONObject obj = new JSONObject();
    obj.put("tipo", tipo);
    obj.put("mensaje", mensaje);
    obj.put("nuevo", nuevo);

    obj.put("id_pedido", String.valueOf(pedidos.getId_pedido()));
    obj.put("id_cliente", String.valueOf(pedidos.getCliente().getId_cliente()));
    obj.put("nombre_cliente", pedidos.getCliente().getNombre_cliente());
    obj.put("contenido_detalle", contenido_detalle);
    
    out.print(obj);
    out.flush();
%>