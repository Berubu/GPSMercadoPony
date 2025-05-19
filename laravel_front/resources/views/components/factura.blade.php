
<div class="bg-white p-6 rounded-md shadow-md mt-6">
    <h2 class="text-2xl mb-4">Factura #{{ $factura->id }}</h2>
    <p>Fecha: {{ $factura->fecha }}</p>
    <p>Total: ${{ $factura->total }}</p>
    <ul>
        @foreach ($factura->items as $item)
            <li>{{ $item->nombre }} - ${{ $item->precio }}</li>
        @endforeach
    </ul>
</div>