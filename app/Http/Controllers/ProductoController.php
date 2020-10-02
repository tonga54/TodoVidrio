<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;
use Validator;
use App\Producto;
use App\Imagen;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.productos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'titulo' => 'required|max:128',
            'descripcion' => 'required',
            'imagenes' => 'required',
            'activo' => 'boolean'
        ];

        $messages = [
            'required' => 'El campo :attribute es requerido.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->passes()){
            $producto = new Producto();
            $producto->titulo = $request->titulo;
            $producto->descripcion = $request->descripcion;
            $producto->activo = $request->activo;
            $producto->save();
    
            if ($request->hasFile('imagenes')) {
                foreach($request->file('imagenes') as $imagen){
                    if ($imagen->isValid()) {
                        $imagen_name = uniqid("img_");
                        $extension = $imagen->extension();
                        $imagen->storeAs('/public', $imagen_name.".".$extension);
                        $url = Storage::url($imagen_name.".".$extension);
                        $imagen = new Imagen();
                        $imagen->path = $url;
                        $imagen->producto_id = $producto->id;
                        $imagen->save();
                    }
                }
            }
    
            $request->session()->flash('success', 'Producto guardado con exito!');
            return redirect('admin/productos');
        }else{
            return back()->withErrors($validator, 'productos')->withInput(); 
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAll(Request $request)
    {
        return Producto::orderBy('created_at', 'desc')->get();
        // return Producto::with('imagenes')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::where('id', $id)->first();
        if($producto != null){
            return view('public.productos.detalle', compact('producto'));
        }
        else{
            // 404
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::where('id', $id)->first();
        return view('admin.productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'titulo' => 'required|max:128',
            'descripcion' => 'required',
            'imagenes' => 'required',
            'activo' => 'boolean'
        ];

        $messages = [
            'required' => 'El campo :attribute es requerido.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->passes()){
            $producto = Producto::where('id', $id)->first();
            if($producto != null){
                $producto->titulo = $request->titulo;
                $producto->descripcion = $request->descripcion;
                $producto->activo = ($request->activo == null) ? 0 : 1;
                $producto->save();
                $producto->imagenes()->delete();

                if ($request->hasFile('imagenes')) {
                    foreach($request->file('imagenes') as $imagen){
                        if ($imagen->isValid()) {
                            $imagen_name = uniqid("img_");
                            $extension = $imagen->extension();
                            $imagen->storeAs('/public', $imagen_name.".".$extension);
                            $url = Storage::url($imagen_name.".".$extension);
                            $imagen = new Imagen();
                            $imagen->path = $url;
                            $imagen->producto_id = $producto->id;
                            $imagen->save();
                        }
                    }
                }
                $request->session()->flash('success', 'Producto editado con exito!');
                return redirect('admin/productos');
            }else{
                $request->session()->flash('danger', 'No se encontro el producto');
                return back();
            }
        }else{
            return back()->withErrors($validator, 'productos')->withInput(); 
        }
    }

    public function show_list(){
        $productos = Producto::with("imagenes")->where('activo', '1')->orderBy('created_at', 'desc')->get();
        return view('public.productos.index', compact('productos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = [
            "response" => false
        ];
        $producto = Producto::where('id', $id)->first();
        if($producto != null){
            $response["response"] = $producto->delete();
        }

        return $response;
    }
}
