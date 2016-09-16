<%@page import="cursojavaweb.controlador.PedidosControlador"%>
<%@page import="cursojavaweb.modelos.Pedidos"%>
<%@page import="cursojavaweb.modelos.Clientes"%>
<%@page import="org.json.simple.JSONObject"%>
<%@page import="java.sql.ResultSet"%>
<%
    
    int id_pedido = Integer.parseInt(request.getParameter("id_pedido"));
    int id_cliente = Integer.parseInt(request.getParameter("id_cliente")); 

    
    String tipo = "error";
    String mensaje = "Datos no agregados.";
    
    Clientes cliente = new Clientes();
    cliente.setId_cliente(id_cliente);
    
    
    
    Pedidos pedido = new Pedidos();
    pedido.setId_pedido(id_pedido);
    pedido.setCliente(cliente);
      
    
    if (PedidosControlador.agregar(pedido)) {
        tipo = "success";
        mensaje = "Datos agregados.";
    }

    JSONObject obj = new JSONObject();
    obj.put("tipo", tipo);
    obj.put("mensaje", mensaje);
    obj.put("id_pedido", String.valueOf(pedido.getId_pedido()));
    out.print(obj);
    out.flush();
    
%>