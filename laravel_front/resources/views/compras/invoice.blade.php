
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #000;
            margin: 10px;
        }
        .container {
            width: 690px;
            margin: 0 auto;
            background: #fff;
        }
        h1 {
            text-align: left;
            font-size: 16px;
            margin-bottom: 5px;
        }
        .header {
            border-bottom: 0px solid #000;
            padding-bottom: 5px;
            margin-bottom: 5px;
        }
        
        .header .factura-title {
            font-weight: bold;
            font-size: 18px;
            color: #555;
        }
        .logo-emisor {
            display: flex;
            justify-content: space-between;
            align-items: center;
            
            gap: 20px; 
        }
        .logo-emisor img {
            max-height: 150px;
            object-fit: contain; 
        }
        .datos {
            margin-top: 20px;
            display: flex; /* Coloca los datos fiscales y receptor en fila */
            gap: 20px; /* Espaciado entre las columnas de datos */
        }
        .emisor, .receptor {
            margin-bottom: 10px;
        }
        .small-text {
            font-size: 10px;
            color: #333;
        }
        .datos-fiscales, .datos-receptor {
            width: 48%;
            display: inline-block;
            vertical-align: top;
            color: #555;
            flex: 1; 
            
        }
        .datos-fiscales p, .datos-receptor p {
            margin: 2px 0;
        }
        .section-title {
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 5px;
            border-bottom: 1px solid #000;
        }
        .conceptos-table, .totales-table, .info-pago-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
            margin-bottom: 15px;
        }
        .conceptos-table th, .conceptos-table td,
        .totales-table th, .totales-table td,
        .info-pago-table th, .info-pago-table td {
            border: 1px solid #000;
            padding: 4px;
            text-align: left;
        }
        .conceptos-table th {
            background: #f2f2f2;
        }
        .totales-right {
            text-align: right;
        }
        .totales-table {
            width: 50%;
            float: right;
        }
        .monto-letra {
            margin-bottom: 10px;
            font-weight: bold;
        }
        .clear {
            clear: both;
        }
        .info-pago-table {
            width: 100%;
        }
        .info-extra {
            font-size: 9px;
            color: #555;
            word-break: break-all;
            margin-bottom: 10px;
        }
        .qr-section {
            margin-top: 10px;
            text-align: left;
        }
        .footer {
            font-size: 9px;
            color: #333;
        }
        .footer p {
            margin: 2px 0;
        }
    </style>
</head>
<body>
<div class="container">
    <!-- Encabezado -->
    <div class="header">
        <div class="logo-emisor">
             <div style="text-align:right;">
                <span class="factura-title">FACTURA</span><br>
                <strong>FOLIO:</strong> {{ 'FAC-' . rand(10000, 99999) }}
            </div>
            <img src="../public/img/logo.jpeg" alt="Logo">
            <div class="datos">
            <div class="datos-fiscales">
                <h1>Emisor:</h1>
                <p><strong>MERCADOPONY SA DE CV</strong></p>
                <p><strong>RFC:</strong> VECI0112111TAG</p>
                <p>COLONIA MIGUEL HIDALGO, CP: 58000, MORELIA, MICHOACÁN, MEXICO</p>
                <p><strong>Lugar de Expedición:</strong> 58000 MORELIA</p>
                <p><strong>Régimen Fiscal:</strong> 601 - General de Ley Personas Morales</p>
                <p><strong>Folio Fiscal:</strong> eb4b9f78-f69f-4e7f-94de-dac09ac48cf0</p>
                <p><strong>Efecto del comprobante:</strong> I - Ingreso</p>
                <p><strong>Fecha / Hora de Emisión:</strong>{{ $compra->fechaCompra }}</p>
                <p><strong>No. de Certificado Digital:</strong> 00001000000403529628</p>
            </div>
            <div class="datos-receptor">
                <h1>Receptor:</h1>
                <p><strong>{{ $compra->usuario->nombreCompleto }}</strong></p>
                <p><strong>RFC:</strong>
                {{ strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 4)) . rand(70, 99) . str_pad(rand(1, 12), 2, '0', STR_PAD_LEFT) . str_pad(rand(1, 28), 2, '0', STR_PAD_LEFT) . strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 3)) }}
                </p>
                <p>PASEO DE LA REFORMA 295 PISO 5 CUAUHTEMOC, CP: 06500, ALCALDIA CUAUHTEMOC, CIUDAD DE MEXICO, MEXICO</p>
                <p><strong>Uso del CFDI:</strong> P01 - Por definir</p>
            </div>
         </div>
        </div>
       
    </div>
    <!-- Datos del Emisor y Receptor -->
    
    <div class="clear"></div>
    <!-- Conceptos -->
    <div class="section-title">Conceptos</div>
    <table class="conceptos-table">
        <thead>
            <tr>
                <th>ID COMPRA</th>
                <th>Cantidad</th>
                <th>Clave Unidad</th>
                <th>Concepto(s)</th>
                <th>Precio Unitario</th>
                <th>Importe</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $compra->idCompra }}</td>
                <td>1</td>
                <td>{{ $compra->idCompra }}<br><span class="small-text"> {{ $compra->producto->nombreProducto }}</span></td>
                <td>VENTA Y CONSUMO<br> ${{ number_format($compra->total, 2) }}</td>
                <td>${{ number_format($compra->total, 2) }}</td>
            </tr>
        </tbody>
    </table>
    <!-- Totales -->
    <div style="width:100%; position:relative;">
        <div class="monto-letra">CUATROCIENTOS OCHENTA Y SEIS PESOS 14/100 MXN</div>
        <table class="totales-table">
            <tr>
                <td class="totales-right"><strong>Subtotal:</strong></td>
                <td class="totales-right">${{ number_format($compra->total, 2) }}</td>
            </tr>
            <tr>
                <td class="totales-right">IVA 0%:</td>
                <td class="totales-right">$0</td>
            </tr>
            <tr>
                <td class="totales-right"><strong>Total:</strong></td>
                <td class="totales-right">${{ number_format($compra->total, 2) }}</td>
            </tr>
        </table>
    </div>
    <div class="clear"></div>
    <!-- Información de pago -->
    <div class="section-title">Información de Pago</div>
    <table class="info-pago-table">
        <tr>
            <th>Moneda</th>
            <th>Forma de Pago</th>
            <th>Método de Pago</th>
            <th>Banco</th>
            <th>Cuenta</th>
            <th>Condiciones de Pago</th>
        </tr>
        <tr>
            <td>MXN - Peso Mexicano</td>
            <td>28 - Tarjeta de débito</td>
            <td>PUE - Pago en una sola exhibición</td>
            <td></td>
            <td>{{ rand(1000, 9999) }}</td>
            <td></td>
        </tr>
    </table>
    <!-- QR y sellos -->
    <div class="qr-section">
        <img src="../public/img/{4D096BA7-CF0F-4F19-A539-A526E5050EA6}.jpg" alt="QR" style="height:155px;">
    </div>
    <div class="footer">
        <div class="info-extra"><p><strong>Fecha / Hora de Certificación:</strong>{{ $compra->fechaCompra }}       <strong>       Número de Serie Certificado del SAT:</strong> {{ str_pad(mt_rand(1, 9), 20, mt_rand(0, 9), STR_PAD_RIGHT) }}   <strong>     RFC del PAC:</strong> LS010316B9R5<strong>   Número autorización PAC:</p>
    </div>
    </div>
</div>
</body>
</html>


   

