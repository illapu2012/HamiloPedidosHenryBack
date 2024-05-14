@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Bienvenido</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    {{-- <li class="breadcrumb-item active">Starter Page</li> --}}
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $cantPedidosAnual }}</h3>
                        <p>Cantidad de pedidos del Anio</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $cantPedidosMes }}</h3>
                        <p>Cantidad de pedidos del Mes</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $cantPedidosDia }}</h3>
                        <p>Cantidad de pedidos del Dia</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ number_format($montoPedidosAnual) }}</h3>
                        <p>Monto de pedidos del Anio</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ number_format($montoPedidosMes) }}</h3>
                        <p>Monto de pedidos del Mes</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ number_format($montoPedidosDia) }}</h3>
                        <p>Monto de pedidos del Dia</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ number_format($montoPedidosEntregadoAnual) }}</h3>
                        <p>Monto de pedidos Entregados del Anio</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ number_format($montoPedidosEntregadoMes) }}</h3>
                        <p>Monto de pedidos Entregados del Mes</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ number_format($montoPedidosEntregadoDia) }}</h3>
                        <p>Monto de pedidos Entregados del Dia</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ number_format($montoPedidosPendienteAnual) }}</h3>
                        <p>Monto de pedidos Pendientes del Anio</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ number_format($montoPedidosPendienteMes) }}</h3>
                        <p>Monto de pedidos Pendientes del Anio</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ number_format($montoPedidosPendienteDia) }}</h3>
                        <p>Monto de pedidos Pendientes del Anio</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ number_format($montoPedidosEnviadoAnual) }}</h3>
                        <p>Monto de pedidos Enviadodel Anio</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ number_format($montoPedidosEnviadoMes) }}</h3>
                        <p>Monto de pedidos Enviadodel Anio</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ number_format($montoPedidosEnviadoDia) }}</h3>
                        <p>Monto de pedidos Enviadodel Anio</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                </div>
            </div>
            {{-- cantidad --}}

            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $cantidadPedidosPendienteAnual}}</h3>
                        <p>Cantidad de pedidos Pendientes del Anio</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $cantidadPedidosPendienteMes }}</h3>
                        <p>Cantidad de pedidos Pendientes del Mes</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $cantidadPedidosPendienteDia }}</h3>
                        <p>Cantidad de pedidos Pendientes del Dia</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $cantidadPedidosEnviadoAnual}}</h3>
                        <p>Cantidad de pedidos Enviados del Anio</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $cantidadPedidosEnviadoMes }}</h3>
                        <p>Cantidad de pedidos Enviados del Mes</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $cantidadPedidosEnviadoDia }}</h3>
                        <p>Cantidad de pedidos Enviados del Dia</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                </div>
            </div>



            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $cantidadPedidosEntregadoAnual}}</h3>
                        <p>Cantidad de pedidos Entregados del Anio</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $cantidadPedidosEntregadoMes }}</h3>
                        <p>Cantidad de pedidos Entregados del Mes</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $cantidadPedidosEntregadoDia }}</h3>
                        <p>Cantidad de pedidos Entregados del Dia</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CLIENTE</th>
                            <th>NEGOCIO</th>
                            <th>FECHA</th>
                            <th>TOTAL</th>
                            <th>ESTADO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $item)
                            <tr>
                                <td>{{ $item->id}}</td>
                                <td>{{ $item->cliente->name}}</td>
                                <td>{{ $item->negocio->nombre}}</td>
                                <td>{{ $item->fecha}}</td>
                                <td>{{ $item->total}}</td>
                                <td>
                                    @if ($item->estado == 'Entregado')
                                        <span class="badge badge-success">Entregado</span>
                                    @elseif ($item->estado == 'Enviado')
                                        <span class="badge badge-warning">Enviado</span>
                                    @else
                                        <span class="badge badge-danger">Pendiente</span>
                                @endif
                                </td>
                                <td>
                                    <a href="{{ url('/pedidos/ver/'.$item->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                    {{-- <a href="{{ url('/negocios/actualizar/'.$item->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> --}}
                                    {{-- @if ($item->estado == 'pendiente')
                                        <a href="{{ url('/pedidos/estado/'.$item->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i></a>
                                    @else
                                        <a href="{{ url('/pedidos/estado/'.$item->id) }}" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                                    @endif --}}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{-- {{ $pedidos->links('pagination::bootstrap-4')}} --}}
            </div>


            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
