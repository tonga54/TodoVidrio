<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    public function imagenes()
    {
        return $this->hasMany('App\Imagen');
    }
}
