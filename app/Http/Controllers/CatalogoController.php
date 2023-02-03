<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CatalogoController extends Controller
{
    public function index(){

        $categorias = Categoria::latest()->get();
        $test = [];
        for ($i = 0; $i < count($categorias); $i++) {
            $productos = Product::where("state", 1)->where("id_categoria", $categorias[$i]["id"])->get();
            if(count($productos) > 0){
                $categorias[$i]["productos"] = $productos;
            }
        }


        return Inertia::render('Home', [
            'categorias' => $categorias
        ]);
    }
}
