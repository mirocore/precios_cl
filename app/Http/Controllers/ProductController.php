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

    public function index(Request $request){
        
        $orden = $request->input('orden') ? $request->input('orden') : "created_at" ;
        $dir = $request->input('dir') ? $request->input('dir') : 'desc';
        $categoria = $request->input('categ') ? $request->input('categ') : '';

        $products = Product::with('categoria')
                                ->orderBy($orden, $dir)
                                ->when($categoria, function ($query, $categoria) {
                                    $query->where('id_categoria', $categoria);
                                })
                                ->paginate(10);

        // CALCULO EL PRECIO POR UNIDAD                        
        foreach ($products as $prod) {
            $prod["unit"] = $prod["price"] / $prod["amount"];
            $prod["unit"] = $formatted = number_format($prod["unit"], 2, '.', '');
            ;
            $prod["categoria_nombre"] = $prod["categoria"]["name"]; 
        }

        // LISTADO DE CATEGORIAS PARA EL FILTRO
        $categorias = Categoria::all();

        return Inertia::render('admin/products/listado', [
            'products' => $products,
            'orden' => $orden,
            'dir' => $dir,
            'categorias' => $categorias,
            'categ' => $categoria
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
        $request->validate(Product::$rulesEdit, Product::$messages);
        
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

        return redirect()->back()->with('message', [
            "type" => "success",
            "msg" => "Se ha editado exitosamente el estado del producto: '" .  $producto->name  . "'"
        ]);
    }
}
