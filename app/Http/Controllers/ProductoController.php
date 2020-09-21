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
        return Producto::all();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
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
        //
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
