@extends('body.encabezado')
@extends('body.cuerpo')

@section('title', 'Registrar Venta')

@section('encabezado')
<div class="container">
    <h1>Registrar Nueva Venta</h1>
    <form action="{{ route('ventas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="ProductoID">Producto</label>
            <select name="ProductoID" id="ProductoID" class="form-control" required>
                <option value="">Seleccionar Producto</option>
                @foreach($productos as $producto)
                    <option value="{{ $producto->ProductoID }}" data-precio="{{ $producto->PrecioUnitario }}">{{ $producto->Nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" required min="1">
        </div>
        <div class="form-group">
            <label for="precio_total">Precio Total</label>
            <input type="number" name="precio_total" id="precio_total" class="form-control" required step="0.01" readonly>
        </div>
        <div class="form-group">
            <label for="fecha_venta">Fecha de Venta</label>
            <input type="date" name="fecha_venta" id="fecha_venta" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar Venta</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const productoSelect = document.getElementById('ProductoID');
    const cantidadInput = document.getElementById('cantidad');
    const precioTotalInput = document.getElementById('precio_total');

    function updatePrecioTotal() {
        const selectedOption = productoSelect.options[productoSelect.selectedIndex];
        const precioUnitario = parseFloat(selectedOption.getAttribute('data-precio')) || 0;
        const cantidad = parseInt(cantidadInput.value, 10) || 0;
        const precioTotal = precioUnitario * cantidad;
        precioTotalInput.value = precioTotal.toFixed(2); // Muestra dos decimales
    }

    productoSelect.addEventListener('change', updatePrecioTotal);
    cantidadInput.addEventListener('input', updatePrecioTotal);
});
</script>
    
@endsection()