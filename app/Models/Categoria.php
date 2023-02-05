<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function productos()
    {
        return $this->hasMany( Product::class, 'id_categoria', 'id' );
    } 

    public static $rules = [
        'name' => 'required | unique:categorias',
    ];

    public static $messages = [
        'name.required' => 'El campo nombre es obligatorio',
        'name.unique' => 'La categoría ingresada ya existe en nuestras bases de datos',
    ];


}
