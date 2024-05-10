<?php

namespace App\Http\Controllers;

use App\Models\Negocios;
use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductosController extends Controller
{
    public function index(){
        //opcion 1
        // $productos = Productos::with('negocio')
        //             ->whereHas('negocio', function($query){
        //                 $query->where('usuario_id', auth()->user()->id)
        //             })
        //             ->orderBy('id', 'desc')->paginate(10);

    // OPCION 2
            // $negocios = Negocio::where('usuario_id', auth()->user()->id->get());
            // $arrayNegocios = [];
            // foreach($negocios as $value) {
            //     $arrayNegocios[] = $value->id;
            // }
            // $productos = Productos::whereIn('negocio_id', $arrayNegocios)->orderBy('id', 'desc')-paginate(10);

    // OPCION 3
            $arrayNeg = Negocios::where('usuario_id', auth()->user()->id)->get()->pluck('id');
            $productos = Productos::whereIn('negocio_id', $arrayNeg)->orderBy('id', 'desc')->paginate(10);
            return view('productos.index', compact('productos'));
    }

    public function create() {

        $negocios = Negocios::where('usuario_id', auth()->user()->id)->get();
        return view('productos.create', compact('negocios'));
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image',
            'costo' => 'required|numeric',
            'negocio_id' => 'required|exists:negocios,id',
        ]);

        if($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $nombreImagen = uniqid('producto_') . '.png';
            if(!is_dir(public_path('/imagenes/productos/'))){
                File::makeDirectory(public_path() . '/imagenes/productos/', 0777, true);
            }
            $imagen->move(public_path().'/imagenes/productos/', $nombreImagen);
        } else {
            $nombreImagen = 'default.png';
        }

        $producto = new Productos();
        $producto->nombre = $request->nombre;
        $producto->imagen = $nombreImagen;
        $producto->descripcion = $request->descripcion;
        $producto->costo = $request->costo;
        $producto->estado = true;
        $producto->negocio_id = $request->negocio_id;
        if ($producto->save()) {
            return redirect('/productos')->with('success', 'Producto agregado correctamente!');
        } else {
            return back()->with('error', 'El producto no fué agregado!');
        }
    }
    public function edit($id){
        $negocios = Negocios::where('usuario_id', auth()->user()->id)->get();
        $producto = Productos::find($id);
        return view('productos.edit', compact('negocios', 'producto'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required|string|min:10|max:500',
            'imagen' => 'required|image|mimes:png,jpg,jpeg',
            'costo' => 'required|numeric',
            'negocio_id' => 'required|exists:negocios,id',
        ]);

        $producto = Productos::find($id);
        $nombreImagen = $producto->imagen;
        if($request->hasFile('imagen')){
            // Eliminar imagen anterior
            if($producto->imagen != 'default.png'){
                if(file_exists(public_path('/imagenes/productos/'.$producto->imagen))){
                    unlink(public_path('/imagenes/productos/'.$producto->imagen));
                }
            }

            $imagen = $request->file('imagen');
            $nombreImagen = uniqid('producto_') . '.png';
            if(!is_dir(public_path('/imagenes/productos/'))){
                File::makeDirectory(public_path() . '/imagenes/productos/', 0777, true);
            }
            $imagen->move(public_path().'/imagenes/productos/', $nombreImagen);
        }

        $producto->nombre = $request->nombre;
        $producto->imagen = $nombreImagen;
        $producto->descripcion = $request->descripcion;
        $producto->estado = true;
        $producto->negocio_id = $request->negocio_id;
        if ($producto->save()) {
            return redirect('/productos')->with('success', 'Registro actualizado correctamente!');
        } else {
            return back()->with('error', 'El registro no fué actualizado!');
        }
    }

    // estado
    // public function estado($id){
    //     $producto = Productos::find($id);
    //     $producto->estado = !$producto->estado;
    //     if ($producto->save()) {
    //         return redirect('/productos')->with('success', 'Estado actualizado correctamente!');
    //     } else {
    //         return back()->with('error', 'El estado no fué actualizado!');
    //     }
    // }


}
