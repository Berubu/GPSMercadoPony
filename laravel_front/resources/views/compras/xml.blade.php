<?xml version="1.0" encoding="utf-8"?>
<cfdi:Comprobante  
    xsi:schemaLocation="http://www.sat.gob.mx/cfd/4 http://www.sat.gob.mx/sitio_internet/cfd/4/cfdv40.xsd"
    Version="4.0" Serie="F" Folio="{{ $compra->idCompra }}" 
    Fecha="{{ $compra->fechaCompra }}" 
    SubTotal="{{ number_format($compra->total, 2) }}" 
    Moneda="MXN" Total="{{ number_format($compra->total, 2) }}" 
    TipoDeComprobante="I" MetodoPago="PUE" FormaPago="28" LugarExpedicion="58000"
    xmlns:cfdi="http://www.sat.gob.mx/cfd/4"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
    <cfdi:Emisor Rfc="XAXX010101000" Nombre="MERCADOPONY SA DE CV" RegimenFiscal="601"/>
    <cfdi:Receptor Rfc="{{ strtoupper(substr($compra->usuario->nombreCompleto, 0, 4)) }}123456789" 
                   Nombre="{{ $compra->usuario->nombreCompleto }}" 
                   UsoCFDI="P01"/>
    <cfdi:Conceptos>
        <cfdi:Concepto ClaveProdServ="90101501" 
                       Cantidad="1" 
                       ClaveUnidad="E48" 
                       Unidad="Unidad de servicio" 
                       Descripcion="Compra de {{ $compra->producto->nombreProducto }}" 
                       ValorUnitario="{{ number_format($compra->total, 2) }}" 
                       Importe="{{ number_format($compra->total, 2) }}"/>
    </cfdi:Conceptos>
</cfdi:Comprobante>

