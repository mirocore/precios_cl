<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['name', 'amount', 'state', 'price', 'id_categoria'];

    public function categoria()
    {
        return $this->belongsTo( Categoria::class, 'id_categoria', 'id' );
    }

    public static $rules = [
        'name' => 'required | min:5 | unique:products',
        'id_categoria' => 'required',
        'amount' => 'required | numeric',
        'price' => 'required | numeric'
    ];

    public static $rulesEdit = [
        'name' => 'required | min:5',
        'id_categoria' => 'required',
        'amount' => 'required | numeric',
        'price' => 'required | numeric'
    ];

    public static $messages = [
        'name.required' => 'El campo Nombre es obligatorio',
        'name.unique' => 'Ya existe un producto con ese nombre en nuestra base de datos',
        'name.min' => 'El nombre debe tener un mínimo de 5 caracteres',
        'id_categoria.required' => 'Debe seleccionar una categoría',
        'amount.required' => 'El campo Cantidad es obligatorio',
        'amount.numeric' => 'El campo Cantidad debe ser un número',
        'price.required' => 'El campo Precio es obligatorio',
        'price.numeric' => 'El campo Precio debe ser un número',
    ];
}
