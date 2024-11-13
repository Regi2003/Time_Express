<?php

namespace App\Http\Controllers;


use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    
    public function index()
    {
        $pedidos = Pedido::paginate(2);
        return view('pedidos.list', compact('pedidos'));
    }

    public function create()
    {
        return view('pedidos.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $validate = $request->validate([
            'cliente' => 'required|string|max:30',
            'producto' => 'required|string|max:50',
            'fecha_pedido' => 'required|date',
            'total' => 'required|numeric|min:0',
        ]);

        Pedido::create([
            'cliente' => $request->cliente,
            'producto' => $request->producto,
            'fecha_pedido' => $request->fecha_pedido,
            'total' => $request->total
        ]);
        //Alert::success('Éxito', 'El producto ha sido creado correctamente')->flash();
        return redirect()->route('pedido.list');

    }

    public function edit($id)
    {
        $pedido = Pedido::find($id);
        return view('pedidos.update', compact('pedido'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $request->validate([
            'cliente' => 'required|string|max:30',
            'producto' => 'required|string|max:50',
            'fecha_pedido' => 'required|date',
            'total' => 'required|numeric|min:0',
        ]);
    
        $pedido = Pedido::find($id);
    
        $pedido->cliente = $request->cliente;
        $pedido->producto = $request->producto;
        $pedido->fecha_pedido = $request->fecha_pedido;
        $pedido->total = $request->total;
        $pedido->save();

        return redirect()->route('pedido.list');
        //Alert::success('Éxito', 'Los datos han sido guardados correctamente')->flash();
    }

    public function destroy($id)
    {
        $pedido = Pedido::find($id);
        $pedido->delete();
        //Alert::success('Éxito', 'El pedido ha sido eliminado correctamente')->flash();
        return redirect()->route('pedido.list');
    }

}
