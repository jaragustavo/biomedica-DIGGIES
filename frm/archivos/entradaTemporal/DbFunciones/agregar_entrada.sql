CREATE OR REPLACE FUNCTION agregar_entrada(p_orden_compra text, 
                                           p_tipo_entrada text, 
                                           p_tipo_licitacion text, 
                                           p_codigo_proveedor text,
                                           p_numero_licitacion text,
                                           p_anio_licitacion text,
                                           p_numero_factura text,
                                           p_numero_remision text,
                                           p_fecha_factura text,
                                           p_fecha_remision text,
                                           p_productos text,
                                           p_precios text,
                                           p_cantidades text,
                                           p_series text,
                                           p_fecha_fabricacion text,
                                           p_plazo_garantia text)


RETURNS bigint AS
$BODY$
  DECLARE
        
        v_orden_compra BIGINT;
        vector_p_producto TEXT[];
        vector_precio TEXT[];
        vector_cantidad TEXT[];
        vector_fecha_fabricacion TEXT[];
        vector_plazo_garantia TEXT[];
        vector_serie TEXT[];
        v_cantidad_productos BIGINT;
        v_producto BIGINT;
        v_precio BIGINT;
        v_cantidad BIGINT;
        v_serie TEXT;
        v_codigo_entrada BIGINT;
        v_tipo_entrada BIGINT;
        v_tipo_licitacion BIGINT; 
        v_codigo_proveedor BIGINT; 
        v_numero_licitacion BIGINT;
        v_anio_licitacion BIGINT;
        v_numero_factura BIGINT;
        v_numero_remision BIGINT;
        v_fecha_fabricacion DATE;
        v_plazo_garantia DATE;

        v_fecha_factura DATE;
        v_fecha_remision DATE;
        

        
BEGIN 
          vector_p_producto = string_to_array( p_productos, ',' );

          v_cantidad_productos = array_upper( vector_p_producto, 1 ); 

          vector_precio    = string_to_array( p_precios, ',' );
          vector_cantidad    = string_to_array( p_cantidades, ',' );
          vector_serie    = string_to_array( p_series, ',' );
          vector_fecha_fabricacion    = string_to_array( p_fecha_fabricacion, ',' );
          vector_plazo_garantia    = string_to_array( p_plazo_garantia, ',' );

          v_orden_compra = cast(p_orden_compra as BIGINT);
          v_tipo_entrada = cast(p_tipo_entrada as BIGINT); 
          v_tipo_licitacion = cast(p_tipo_licitacion as BIGINT); 
          v_codigo_proveedor = cast(p_codigo_proveedor as BIGINT); 
          v_numero_licitacion = cast(p_numero_licitacion as BIGINT);
          v_anio_licitacion = cast(p_anio_licitacion as BIGINT);
          v_numero_factura = cast(p_numero_factura as BIGINT);
          v_numero_remision = cast(p_numero_remision as BIGINT); 

          v_fecha_factura = cast(p_fecha_factura as DATE); 
          v_fecha_remision = cast(p_fecha_remision as DATE); 
         
        
            INSERT INTO entrada
                   ( codigo_proveedor,
                     orden_compra, 
                     numero_licitacion,
                     anio_licitacion,
                     codigo_tipo_licitacion,
                     fecha_recepcion,
                     numero_factura,
                     numero_remision,
                     fecha_factura,
                     fecha_remision,
                     codigo_establecimiento,
                     codigo_tipo_movimiento,
                     codigo_tipo_estado
                     )
                             
            VALUES (v_codigo_proveedor,
                    v_orden_compra,
                    v_numero_licitacion,
                    v_anio_licitacion,
                    v_tipo_licitacion,
                    now(),
                    --v_fecha_recepcion,
                    v_numero_factura,
                    v_numero_remision,
                    v_fecha_factura,
                    v_fecha_remision,
                    1, -- v_ codigo_establecimiento,
                    v_tipo_entrada,
                    1 --v_ codigo_tipo_estado
                    
      );


              
            v_codigo_entrada    = currval( 'entrada_codigo_seq' )::BIGINT; 


           
        FOR i IN 1..v_cantidad_productos  LOOP
                v_producto = cast(vector_p_producto[i] as bigint);
                v_serie = cast(vector_serie[i] as text);
                v_cantidad = cast(vector_cantidad[i] as bigint);
                v_precio = cast(vector_precio[i] as bigint);
                v_fecha_fabricacion = cast(vector_fecha_fabricacion[i] as DATE);
                v_plazo_garantia = cast(vector_fecha_fabricacion[i] as DATE);

                INSERT INTO entrada_detalle (
                     numero_serie,
                     fecha_fabricacion,
                     cantidad ,
                     precio_unitario,
                     plazo_garantia ,
                     codigo_entrada,
                     codigo_producto
                )
                VALUES (
                    v_serie,
                    v_fecha_fabricacion,
                    v_cantidad,
                    v_precio,
                    v_plazo_garantia,
                    v_codigo_entrada,
                    v_producto);

            END LOOP;
        RETURN(v_codigo_entrada);
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

GRANT EXECUTE ON FUNCTION agregar_entrada(text, text, text, text, text, text, text,text, text, text, text, text, text, text,text,text) TO public;

GRANT EXECUTE ON FUNCTION agregar_entrada(text, text, text, text, text, text, text,text, text, text, text, text, text, text,text,text) TO postgres;
