@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h2>Gracias por tu compra</h2>
        <button onclick="mostrarFactura()">Link de factura</button>

        @if(isset($factura))
            @include('components.factura', ['factura' => $factura])
        @endif
    </div>
@endsection
