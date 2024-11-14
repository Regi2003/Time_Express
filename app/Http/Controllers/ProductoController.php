<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductoController extends Controller
{
    
    public function index()
    {
        $productos = Producto::paginate(2);
        return view('productos.list', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $validate = $request->validate([
            'nombre' => 'required|string|max:30',
            'descripcion' => 'string|max:100',
            'precio' => 'required|numeric|min:0',
            'inventario' => 'required|integer|min:0',
        ]);

        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'inventario' => $request->inventario
        ]);
        Alert::success('Éxito', 'El producto ha sido creado correctamente');
        return redirect()->route('producto.list');

    }

    public function edit($id)
    {
        $producto = Producto::find($id);
        return view('productos.update', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $request->validate([
            'nombre' => 'required|string|max:30',
            'descripcion' => 'string|max:100',
            'precio' => 'required|numeric|min:0',
            'inventario' => 'required|integer|min:0',
        ]);
    
        $producto = Producto::find($id);
        
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->inventario = $request->inventario;
        $producto->save();

        return redirect()->route('producto.list');
        Alert::success('Éxito', 'Los datos han sido guardados correctamente')->flash();
    }

    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        Alert::success('Éxito', 'El producto ha sido eliminado correctamente')->flash();
        return redirect()->route('producto.list');
    }
}
