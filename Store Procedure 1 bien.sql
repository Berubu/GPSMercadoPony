CREATE OR REPLACE FUNCTION generar_factura_compra(
    p_id_usuario BIGINT,           -- ID del usuario que realiza la compra
    p_producto_ids BIGINT[],       -- Array de IDs de productos que el usuario compra
    p_total NUMERIC               -- Total de la compra
) RETURNS VOID AS $$
DECLARE
    v_id_compra BIGINT;
    v_id_factura BIGINT;
    v_producto_id BIGINT;
BEGIN
    -- Registrar la compra en la tabla "compras" para cada producto
    -- Lo que se inserta es la fecha, el total, el usuario, y el producto
    FOR i IN 1..array_length(p_producto_ids, 1) LOOP
        v_producto_id := p_producto_ids[i];  -- ID del producto
        
        -- Insertar cada producto de la compra en la tabla "compras"
        INSERT INTO compras ("fechaCompra", "total", "idUsuario", "idProducto")
        VALUES (CURRENT_TIMESTAMP, p_total, p_id_usuario, v_producto_id)
        RETURNING "idCompra" INTO v_id_compra; -- Guardamos el ID de la compra generada
    END LOOP;

    -- Crear la factura asociada a la compra
    INSERT INTO facturas ("idCompra", "fechaFactura")
    VALUES (v_id_compra, CURRENT_TIMESTAMP)
    RETURNING "idFactura" INTO v_id_factura; -- Guardamos el ID de la factura generada

END;
$$ LANGUAGE plpgsql;

-- Ejemplo de cómo llamar a la función para realizar una compra
SELECT generar_factura_compra(
    2,                            -- ID del usuario
    ARRAY[48],                 -- IDs de los productos
    700                            -- Total de la compra
);

select * from compras;
select * from facturas;
