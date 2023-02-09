<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $products = Product::with('categoria')->latest()->paginate(5);
        return Inertia::render('admin/products/listado', [
            'products' => $products
        ]);
    }

    public function create(){

        $categorias = Categoria::all();
        return Inertia::render('admin/products/formNuevo', [
            'categorias' => $categorias
        ]);
    }

    public function store(Request $request){

        // VALIDACION
        $request->validate(Product::$rules, Product::$messages);
        
        // OBTENGO LOS DATOS
        $data = $request->input();

        // NUEVO REGISTRO
        $producto = Product::create($data);

        return redirect()->route('products.index')->with('message', [
            "type" => "success",
            "msg" => "Se ha creado exitósamente el producto: '" .  $producto->name  . "'"
        ]);
    }

    public function edit(Product $producto){
        $categorias = Categoria::all();
        return Inertia::render('admin/products/formEdit', [
            'producto' => $producto, 
            'categorias' => $categorias]);
    }

    public function update(Request $request, Product $producto){
        
        // VALIDACION
        $request->validate(Product::$rules, Product::$messages);
        
        $producto->update( $request->all() );

        return redirect()->route('products.index')
            ->with('message', [
                "type" => "success",
                "msg" => "Se ha editado exitósamente la categoría: " . $producto->name
            ]);
    }

    public function destroy(Product $producto){
        // TODO VALIDAR SI EXISTE

        $producto->delete();

        return redirect()->route('products.index')
            ->with('message', [
                "type" => "success",
                "msg" => "Se ha borrado exitósamente el producto: '" .  $producto->name  . "'"
            ]);
    }

    public function cambiarEstado(Product $producto){

        if($producto['state'] === 0){
            $producto['state'] = 1;
        }else{
            $producto['state'] = 0;
        }

        $producto->save();

        return redirect()->route('products.index')->with('message', [
            "type" => "success",
            "msg" => "Se ha editado exitosamente el estado del producto: '" .  $producto->name  . "'"
        ]);
    }
}
