<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{

    public function index()
    {
        $ventas = Venta::all();
        return view('ventas.index', ['ventas' => $ventas]);
    }

    public function create()
    {
        $productos = Producto::all();
        return view('ventas.create', ['productos' => $productos]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ProductoID' => 'required|exists:productos,ProductoID',
            'cantidad' => 'required|integer|min:1',
            'precio_total' => 'required|numeric|min:0',
            'fecha_venta' => 'required|date',
        ]);
    
        Venta::create($validatedData);

        return redirect()->route('ventas.index')->with('success', 'Venta registrada exitosamente.');
    }

    public function show($id)
    {
        $venta = Venta::findOrFail($id);
        $productos = Producto::all(); // Obtén todos los productos
        return view('ventas.verVentas', [
        'datos' => $venta,
        'productos' => $productos // Pasa la lista de productos a la vista
    ]);
    }
    
    public function edit($id)
    {
        $venta = Venta::findOrFail($id);
        $productos = Producto::all(); // Obtén la lista de productos
        return view('ventas.edit', ['datos' => $venta, 'productos' => $productos]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'ProductoID' => 'required|exists:productos,ProductoID',
            'cantidad' => 'required|integer|min:1',
            'precio_total' => 'required|numeric|min:0',
            'fecha_venta' => 'required|date',
        ]);

        $venta = Venta::findOrFail($id);
        $venta->update($validatedData);

        return redirect()->route('ventas.index')->with('success', 'Venta actualizada exitosamente.');
    }

    public function destroy(Venta $VentasID)
    {

        $VentasID->delete();
        return redirect()->route('ventas.index')
                         ->with('success', 'Se elimino.');
    }
}