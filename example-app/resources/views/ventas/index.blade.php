@extends('body.encabezado')
@extends('body.cuerpo')
@section('title', 'Ventas' .$ventas)
@section('encabezado')

<div class="container">
    <h1>Listado de Ventas</h1>
  <hr>
  <a href="{{ route('ventas.create') }}" class="btn btn-primary">Registrar Nueva Venta</a>
  <hr>


  <table class="table mt-4">
    <thead>
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Total</th>
            <th>Fecha de Venta</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ventas as $venta)
            <tr>
                <td>{{ $venta->VentasID }}</td>
                <td>{{ $venta->producto->Nombre }}</td>
                <td>{{ $venta->cantidad }}</td>
                <td>{{ $venta->precio_total }}</td>
                <td>
                    <a href="{{ route('ventas.show', $venta->VentasID) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('ventas.delete', $venta->VentasID) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</div>
    
    
@endsection()


