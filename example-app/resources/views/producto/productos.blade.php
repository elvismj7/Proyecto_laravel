@extends('body.encabezado')
@extends('body.cuerpo')
@section('title', 'Productos' .$productos)
@section('encabezado')

<div class="container">
  <h1>PRODUCTOS</h1>
  <hr>
  <a href="{{route('productos.crear')}}" class="btn btn-primary">Agregar Producto</a>
  <hr>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">nombre</th>
          <th scope="col">stock</th>
          <th scope="col">Precio Unitario</th>
          <th scope="col">Descripcion</th>
        </tr>
      </thead>
        
      <tbody>
        @foreach ($productos as $producto)
        <tr>
            <th scope="row">1</th>
            <td>{{$producto->Nombre}}</td>
            <td>{{$producto->stock}}</td>
            <td>{{$producto->PrecioUnitario}}</td>
            <td>{{$producto->Descripcion}}</td>
            <td>
              <a href="{{ route('productos.show', $producto->ProductoID)}}" class="btn btn-primary">Editar</a>
              <form action="{{ route('productos.delete', $producto->ProductoID) }}" method="post">
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