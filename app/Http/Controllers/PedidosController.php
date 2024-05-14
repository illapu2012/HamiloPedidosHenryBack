<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use Twilio\Rest\Client;
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
    public function cambiarEstado($id, $estado){
        $pedido = Pedidos::with('cliente')->find($id);

        $pedido->estado = $estado;
        if ($pedido->save()) {
            // el estado es Enviado enviar sms: no hacer nada
            if($estado == 'Enviado'){
                $sid = env('TWILIO_SID');
                $token = env('TWILIO_TOKEN');
                $from = env('TWILIO_FROM');
                try {
                    $client = new Client($sid, $token);

                    $client->messages->create($pedido->cliente->telefono, [
                        'from' => $from,
                        'body' => "Tu pedido ha sido Enviado"
                    ]);
                } catch (\Throwable $th) {
                    //throw $th;
                    return back()->with('success', 'El estado se ha actualizado pero no se pudo mandar el SMS');
                }
            }
            return back()->with('success', 'Estado actualizado correctamente!');
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
