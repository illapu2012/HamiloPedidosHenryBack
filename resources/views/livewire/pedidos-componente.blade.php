<div>
    @if ($negocio_id > 0)
        Negocio Seleccionado  {{ $negocio_id}}

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Seleccionar Productos</div>
                <div class="card-body">
                    <input wire:model.live='buscarProducto' type="text" class="form-control">
                    <div class="table-responsive">
                        <table class="table table-bordered mt-2">
                            <thead>
                                <tr>
                                    <th>IMAGEN</th>
                                    <th>PRODUCTO</th>
                                    <th>COSTO</th>
                                    <th>AGREGAR</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $itemPro)
                                    <tr>
                                        <td>
                                            <img src="{{$itemPro->getImagenUrl()}}" alt="" height="40px">
                                        </td>
                                        <td>{{ $itemPro->nombre }}</td>
                                        <td>{{ $itemPro->costo }}</td>
                                        <td>
                                            <button class="btn btn-primary">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        {{ $productos->links() }}
                    </div>
                </div>
                </div>

            </div>
            <div class="col-md6"></div>
        </div>
    @else
        <div class="row justify-content-center">
            @foreach ($negocios as $itemNeg)
            <div class="col-md-4 p-1">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <img src="{{ $itemNeg->getImagenurl() }}" alt="" class="rounded" height="200px">
                        <h2>{{ $itemNeg->nombre }}</h2>
                        <button wire:click='seleccionaNegocio({{ $itemNeg->id }})' class="btn btn-primary">Seleccionar</button>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    @endif
</div>
