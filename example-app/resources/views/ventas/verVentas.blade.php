@extends('body.cuerpo')

@section('title', 'Ver Venta')

@section('cuerpo')

<div class="container mt-5">
    <h2 class="mb-4">Editar Venta</h2>
    <form action="{{ route('ventas.edit', $datos->VentasID)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="ProductoID">Producto</label>
            <select name="ProductoID" id="ProductoID" class="form-control" required>
                <option value="">Seleccionar Producto</option>
                @foreach($productos as $producto)
                    <option value="{{ $producto->ProductoID }}" 
                            data-precio="{{ $producto->PrecioUnitario }}"
                            {{ $producto->ProductoID == old('ProductoID', $datos->ProductoID) ? 'selected' : '' }}>
                        {{ $producto->Nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" required min="1" value="{{ old('cantidad', $datos->cantidad) }}">
        </div>

        <div class="form-group">
            <label for="precio_total">Precio Total</label>
            <input type="number" name="precio_total" id="precio_total" class="form-control" required step="0.01" value="{{ old('precio_total', $datos->precio_total) }}" readonly>
        </div>

        <div class="form-group">
            <label for="fecha_venta">Fecha de Venta</label>
            <input type="date" name="fecha_venta" id="fecha_venta" class="form-control" required value="{{ old('fecha_venta', $datos->fecha_venta) }}">
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

    // Actualiza el precio total al cargar la página si ya hay un producto seleccionado
    updatePrecioTotal();
});
</script>

@endsection
