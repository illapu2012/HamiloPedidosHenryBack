<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Negocios;
use App\Models\Productos;
use Livewire\WithPagination;

class PedidosComponente extends Component
{
    use WithPagination;
    public $negocio_id, $negocios=[], $buscarProducto='';

    public function mount(){
        $this->negocios = Negocios::where('usuario_id', auth()->user()->id)->get();
    }

    public function render()
    {
        $productos = Productos::where('nombre', 'LIKE', '%' .$this->buscarProducto. '%')
                                ->where('negocio_id', $this->negocio_id)
                                ->paginate(10);
        return view('livewire.pedidos-componente', compact('productos'));
    }

    //SELECCIONAR EMPRESA

    public function seleccionaNegocio($param){
        $this->negocio_id = $param;
    }
}
