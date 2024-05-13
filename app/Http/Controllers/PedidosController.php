<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use App\Models\Negocios;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function index(){
        $pedidos= Pedidos::with('cliente', 'negocio')->orderBy('id', 'DESC')->paginate(10);
        // dd($pedido);
        return view('pedidos.index', compact('pedidos'));
    }
    public function create(){
        return view('pedidos.create');
    }
    // estado
    public function cambiarEstado(Request $request, $id){
        $pedido = Pedidos::find($id);

        $pedido->estado = !$pedido->estado;
        if ($pedidos->save()) {
            return redirect('/pedidos')->with('success', 'Estado actualizado correctamente!');
        } else {
            return back()->with('error', 'El estado no fué actualizado!');
        }
    }
    // show
    public function show($id){
        $pedido = Pedidos::with('cliente', 'negocio', 'detalles', 'detalles.producto')->findOrFail($id);
        return view('pedidos.show', compact('pedido'));
    }
}
