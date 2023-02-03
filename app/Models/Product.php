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
}
