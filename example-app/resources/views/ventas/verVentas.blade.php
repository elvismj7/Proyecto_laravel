@extends('body.encabezado')
@extends('body.cuerpo')

@section('title', 'verVentas'.$datos)

@section('cuerpo')
<div class="container mt-5">
  <h2 class="mb-4">Editar Ventas</h2>
  <form action="{{ route('ventas.update', $datos)}}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="ProductoID">Producto</label>
        <select name="ProductoID" id="ProductoID" class="form-control" required>
            <option value="">Seleccionar Producto</option>
            @foreach($productos as $producto)
                <option value="{{ $producto->ProductoID }}">{{ $producto->Nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="cantidad">Cantidad</label>
        <input type="number" name="cantidad" id="cantidad" class="form-control" required min="1">
    </div>
    <div class="form-group">
        <label for="precio_total">Precio Total</label>
        <input type="number" name="precio_total" id="precio_total" class="form-control" required step="0.01">
    </div>
    <div class="form-group">
        <label for="fecha_venta">Fecha de Venta</label>
        <input type="date" name="fecha_venta" id="fecha_venta" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Guardar Venta</button>
  </form>
</div>
@endsection()
