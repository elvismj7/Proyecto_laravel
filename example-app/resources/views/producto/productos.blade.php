@extends('body.encabezado')
@extends('body.cuerpo')
@section('title', 'Productos' .$productos)
@section('encabezado')

<div class="container">
  <h1>LISTA DE PRODUCTOS</h1>
  <hr>
  <a href="{{route('productos.crear')}}" class="btn btn-primary">Agregar Producto</a>
  <hr>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">NOMBRE</th>
          <th scope="col">STOCK</th>
          <th scope="col">PRECIO UNITARIO</th>
          <th scope="col">DESCRIPCION</th>
          <th scope="col"> </th>
          <th scope="col"> </th>
        </tr>
      </thead>
        
      <tbody>
        @foreach ($productos as $producto)
        <tr>
            <th scope="row">{{$producto->ProductoID}}</th>
            <td>{{$producto->Nombre}}</td>
            <td>{{$producto->stock}}</td>
            <td>{{$producto->PrecioUnitario}}</td>
            <td>{{$producto->Descripcion}}</td>
            <td>
              <a href="{{ route('productos.show', $producto->ProductoID)}}" class="btn btn-primary">Editar</a>
            </td>
            <td>
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