DROP FUNCTION IF EXISTS generar_informe_compras_facturas(INTEGER);

CREATE OR REPLACE FUNCTION generar_informe_compras_facturas(
    p_id_producto INTEGER         -- El parámetro es de tipo INTEGER
) RETURNS TABLE (
    "idCompra" BIGINT,            -- ID de la compra
    "fechaCompra" TIMESTAMP,      -- Fecha de la compra
    "total" NUMERIC,              -- Total gastado en la compra
    "idFactura" BIGINT,           -- ID de la factura asociada
    "fechaFactura" DATE           -- Cambiar el tipo a DATE
) AS $$
BEGIN
    RETURN QUERY
    SELECT 
        c."idCompra",              -- ID de la compra
        c."fechaCompra",            -- Fecha de la compra
        c."total",                  -- Total gastado en la compra
        f."idFactura",              -- ID de la factura asociada
        f."fechaFactura"            -- Dejarla como DATE
    FROM "compras" c
    JOIN "facturas" f ON c."idCompra" = f."idCompra"  -- Relacionar la compra con la factura
    WHERE c."idProducto" = p_id_producto;             -- Filtrar por el producto especificado
END;
$$ LANGUAGE plpgsql;


-- Generar el informe para el producto con idProducto = 15 
SELECT * FROM generar_informe_compras_facturas(15);




