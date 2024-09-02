<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\FlareClient\View;
use App\Models\Producto;

class ProductoController extends Controller
{
    //
    // public function __invoke() {
        
    // }

    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        $productos = Producto::all();
        return view('producto.productos', ["productos"=> $productos]);
    }
    
    public function crear(){
        return view('producto.creando');
    }


    public function store(Request $request){

        $validatedData= $request->validate([
            'Nombre' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'PrecioUnitario' => 'required|numeric|min:0',
            'Descripcion' => 'nullable|string|max:1000',
        ]);
    
        Producto::create($validatedData);

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
        
       //return 'se guardo correctamente los productos'. $request->Nombre;
    }
    
    public function show($id) {

        $producto = Producto::findOrFail($id);
        return view('producto.verProducto',["datos"=> $producto]);
    }

    public function edit($id)
    {
        // Mostrar el formulario de edición
        $producto = Producto::findOrFail($id);
        return view('productos.editar', ["datos"=> $producto]);
    }

    public function destroy(Producto $ProductoID) {
        //$producto = Producto::findOrFail($ProductoID);
        $ProductoID->delete();
        return redirect()->route('productos.index')
                         ->with('success', 'Se elimino.');
    }

    public function update(Request $request, Producto $ProductoID)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'Nombre' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'PrecioUnitario' => 'required|numeric|min:0',
            'Descripcion' => 'nullable|string|max:1000',
        ]);
        // Actualizar el producto
        $ProductoID->update($validatedData);
        // Redirigir con mensaje de éxito
        return redirect()->route('productos.index')
                         ->with('success', 'Producto actualizado exitosamente.');
    }
}
