@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Pedidos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Pedidos</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Total</div>
                    <div class="card-body">
                        <div class="text-center">
                            <h3 class="mt-3"><b>Total:</b> {{ $pedido->total }}</h3>
                        </div>
                        <div class="mt-3">
                            <p><strong>Cliente:</strong> <br> {{ $pedido->cliente->name }}</p>
                            <p><strong>Negocio:</strong> <br> {{ $pedido->negocio->nombre}}</p>
                            <p><strong>Comentarios:</strong> <br> {{ $pedido->comentarios }}</p>
                            <p><strong>Coordernadas:</strong> <br> {{ $pedido->coordenadas}}</p>
                            <p><strong>Estado:</strong>
                                @if ($pedido->estado == 'Entregado')
                                    <span class="badge badge-success">Entregado</span>
                                @else
                                    <span class="badge badge-danger">Pendiente</span>
                                @endif
                            </p>
                            <p><strong>Fecha de creación:</strong> {{ $pedido->fecha }}</p>
                        </div>
                        <div class="m-3 text-center">
                            <a href="{{ url('/pedidos') }}" class="btn btn-primary">Volver al listado</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalles</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>IMAGEN</th>
                                        <th>NOMBRE</th>
                                        <th>COSTO</th>
                                        <th>CANTIDAD</th>
                                        <th>SUBTOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pedido->detalles as $item)
                                        <tr>
                                            <td>{{ $item->producto->id }}</td>
                                            <td>
                                                <img src="{{ $item->producto->getImagenUrl() }}" alt="imagen" height="40px" >
                                            </td>
                                            <td>{{ $item->producto->nombre }}</td>
                                            <td>{{ $item->costo }}</td>
                                            <td>{{ $item->cantidad }}</td>
                                            <td>
                                                {{ $item->costo * $item->cantidad}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
