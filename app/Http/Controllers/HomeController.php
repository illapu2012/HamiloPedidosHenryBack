<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pedidos;
use Twilio\Rest\Client;
use App\Models\Negocios;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $arrayNeg = Negocios::where('usuario_id', auth()->user()->id)->get()->pluck('id');
        // cantidad pedidos Anual
        $cantPedidosAnual = Pedidos::whereIn('negocio_id', $arrayNeg)->whereYear('fecha', date('Y'))->count();
        // cantidad pedidos mensual
        $cantPedidosMes = Pedidos::whereIn('negocio_id', $arrayNeg)->whereYear('fecha', date('Y'))->whereMonth('fecha', date('m'))->count();
        // catindad pedidos del dia
        $cantPedidosDia = Pedidos::whereIn('negocio_id', $arrayNeg)->whereDate('fecha', date('Y-m-d'))->count();

        //monto total de pedidos Anual
        $montoPedidosAnual = Pedidos::whereIn('negocio_id', $arrayNeg)->whereYear('fecha', date('Y'))->sum('total');
        //monto total de pedidos Mensual
        $montoPedidosMes = Pedidos::whereIn('negocio_id', $arrayNeg)->whereYear('fecha', date('Y'))->whereMonth('fecha', date('m'))->sum('total');
        //monto total de pedidos del Dia
        $montoPedidosDia = Pedidos::whereIn('negocio_id', $arrayNeg)->whereDate('fecha', date('Y-m-d'))->sum('total');

        // monto total de ventas Entregadas Anual
        $montoPedidosEntregadoAnual = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado', 'Entregado')->whereYear('fecha', date('Y'))->sum('total');
        // monto total de ventas Entregadas mensual
        $montoPedidosEntregadoMes = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado', 'Entregado')->whereYear('fecha', date('Y'))->whereMonth('fecha', date('m'))->sum('total');
        // monto total de ventas Entregadas del dia
        $montoPedidosEntregadoDia = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado', 'Entregado')->whereDate('fecha', date('Y-m-d'))->sum('total');


        // monto total de ventas Pendiente Anual
        $montoPedidosPendienteAnual = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado',
        'Pendiente')->whereYear('fecha', date('Y'))->sum('total');
        // monto total de ventas Pendiente del Mes
        $montoPedidosPendienteMes = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado', 'Pendiente')->whereYear('fecha', date('Y'))->whereMonth('fecha', date('m'))->sum('total');
        // monto total de ventas Pendiente del dia
        $montoPedidosPendienteDia = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado', 'Pendiente')->whereDate('fecha', date('Y-m-d'))->sum('total');




        // monto total de ventas Enviado Anual
        $montoPedidosEnviadoAnual = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado',
        'Enviado')->whereYear('fecha', date('Y'))->sum('total');
        // monto total de ventas Enviado mensual
        $montoPedidosEnviadoMes = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado', 'Enviado')->whereYear('fecha', date('Y'))->whereMonth('fecha', date('m'))->sum('total');
        // monto total de ventas Enviado del dia
        $montoPedidosEnviadoDia = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado', 'Enviado')->whereDate('fecha', date('Y-m-d'))->sum('total');




        // cantidad de pedidos Pendiente Anual
        $cantidadPedidosPendienteAnual = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado',
        'Pendiente')->whereYear('fecha', date('Y'))->count('total');
        // cantidad de pedidos Pendiente mensual
        $cantidadPedidosPendienteMes = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado',
        'Pendiente')->whereYear('fecha', date('Y'))->whereMonth('fecha', date('m'))->count('total');
        // cantidad de pedidos Pendiente del dia
        $cantidadPedidosPendienteDia = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado',
        'Pendiente')->whereDate('fecha', date('Y-m-d'))->count('total');


        // cantidad de pedidos Enviados Anual
        $cantidadPedidosEnviadoAnual = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado',
        'Enviado')->whereYear('fecha', date('Y'))->count('total');
        // cantidad de pedidos Enviados mensual
        $cantidadPedidosEnviadoMes = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado',
        'Enviado')->whereYear('fecha', date('Y'))->whereMonth('fecha', date('m'))->count('total');
        // cantidad de pedidos Enviados del dia
        $cantidadPedidosEnviadoDia = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado',
        'Enviado')->whereDate('fecha', date('Y-m-d'))->count('total');




        // cantidad de pedidos Entregados Anual
        $cantidadPedidosEntregadoAnual = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado',
        'Entregado')->whereYear('fecha', date('Y'))->count('total');
        // cantidad de pedidos Entregados mensual
        $cantidadPedidosEntregadoMes = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado',
        'Entregado')->whereYear('fecha', date('Y'))->whereMonth('fecha', date('m'))->count('total');
        // cantidad de pedidos Entregados del dia
        $cantidadPedidosEntregadoDia = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado',
        'Entregado')->whereDate('fecha', date('Y-m-d'))->count('total');


        $pedidos= Pedidos::with('cliente', 'negocio')->whereIn('negocio_id', $arrayNeg)->orderBy('id', 'DESC')->take(5)->get();

        return view('home', compact('cantPedidosAnual' , 'cantPedidosMes', 'cantPedidosDia', 'montoPedidosAnual', 'montoPedidosMes', 'montoPedidosDia', 'montoPedidosEntregadoAnual',
        'montoPedidosEntregadoMes', 'montoPedidosEntregadoDia', 'montoPedidosPendienteAnual',
        'montoPedidosPendienteMes', 'montoPedidosPendienteDia', 'montoPedidosEnviadoAnual',
        'montoPedidosEnviadoMes', 'montoPedidosEnviadoDia', 'cantidadPedidosPendienteAnual',
        'cantidadPedidosPendienteMes', 'cantidadPedidosPendienteDia', 'cantidadPedidosEnviadoAnual',
        'cantidadPedidosEnviadoMes', 'cantidadPedidosEnviadoDia', 'cantidadPedidosEntregadoAnual',
        'cantidadPedidosEntregadoMes', 'cantidadPedidosEntregadoDia','pedidos'
        ));
    }

    // PARA VERIFICAR EL OTP
    public function verificar(Request $request){

        $this->validate($request, [
            'otp' => 'required|numeric'
        ]);

        $usuario = User::where('id', auth()->user()->id)->first();

        if($usuario->otp == $request->otp){
            $usuario->verificado = true;
            $usuario->save();
            return redirect('/home');
        } else {
            return back()->with('error', 'El codigo OTP es incorrecto');
        }
    }

    // PARA REENVIAR OTP
    public function reenviar(){
        $paraOtp = rand(100000, 999999);

        $usuario = User::where('id', auth()->user()->id)->first();
        $usuario->otp = $paraOtp;
        $usuario->save();

        // enviamos el SMS con el OTP
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_TOKEN');
        $from = env('TWILIO_FROM');

        try {
            $client = new Client($sid, $token);

            $client->messages->create($usuario->telefono, [
                'from' => $from,
                'body' => "Tu codigo OTP es: " . $paraOtp . ". No lo compartas con nadie."
            ]);
            return redirect('/home')->with('info', 'Se envió el OTP a tu número de teléfono');
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', 'No se pudo enviar el mensaje. Intentalo de nuevo.');
        }
    }
}
