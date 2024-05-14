<?php

namespace App\Http\Controllers\Api;

use App\Models\Negocios;
use App\Models\Productos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductosController extends Controller
{
    public function index($id){
        $productos = Productos::where('negocio_id', $id)->orderBy('id', 'desc')->paginate(10);

        foreach($productos as $value){
            $value->imagen = $value->getImagenUrl();
        }
        return response()->json(['mensaje'=> 'Datos Cargados', 'datos'
        => $productos, 200]);
    }
}
