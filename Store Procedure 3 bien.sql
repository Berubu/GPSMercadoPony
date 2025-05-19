DROP FUNCTION IF EXISTS calcular_total_gastado_por_fecha(DATE);

CREATE OR REPLACE FUNCTION calcular_total_gastado_por_fecha(
    p_fecha_compra DATE             -- Fecha de compra
) RETURNS NUMERIC AS $$
DECLARE
    v_total_gastado NUMERIC;        -- Variable para almacenar el total gastado
BEGIN
    -- Calcular el total gastado en todas las compras durante la fecha especificada
    SELECT SUM(c."total") INTO v_total_gastado
    FROM "compras" c
    WHERE c."fechaCompra"::DATE = p_fecha_compra;  -- Filtrar por fecha (convierte a tipo DATE para comparar solo la fecha)

    -- Si no hay compras, se establece como 0
    IF v_total_gastado IS NULL THEN
        v_total_gastado := 0;
    END IF;

    RETURN v_total_gastado;  -- Retornar el total gastado
END;
$$ LANGUAGE plpgsql;


select * from compras;

SELECT calcular_total_gastado_por_fecha('2024-11-06');














