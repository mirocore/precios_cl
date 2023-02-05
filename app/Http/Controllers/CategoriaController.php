<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoriaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //$categorias = Categoria::latest()->paginate(5);
        $categorias = Categoria::with('productos')->latest()->paginate(5);


        return Inertia::render('admin/categorias/listado', [
            'categorias' => $categorias
        ]);
    }

    public function create(){
        return Inertia::render('admin/categorias/formnuevo');
    }

    public function store(Request $request){
        
        // Validacion
        $request->validate(Categoria::$rules, Categoria:: $messages);


        $nuevaCategoria = Categoria::create([
            'name' => $request->name
        ]);


        return redirect()->route('categorias.index')->with('message', [
            "type" => "success",
            "msg" => "Se ha creado exitósamente la categoría: '" .  $nuevaCategoria->name  . "'"
        ]);
    }

    public function destroy(Categoria $categoria){

        //TODO VALIDAR SI EXISTE

        $categoria->delete();

        return redirect()->route('categorias.index')
            ->with('message', [
                "type" => "success",
                "msg" => "Se ha borrado exitósamente la categoría: '" .  $categoria->name  . "'"
            ]);
    }


    public function edit(Categoria $categoria){
        return Inertia::render('admin/categorias/formedit', [
            "categoria" => $categoria
        ]);
    }

    public function update(Request $request, Categoria $categoria){
        
        // VALIDACION
        $request->validate(Categoria::$rules, Categoria:: $messages);
        
        $categoria->update( $request->all() );

        return redirect()->route('categorias.index')
            ->with('message', [
                "type" => "success",
                "msg" => "Se ha editado exitósamente la categoría: '" .  $categoria->name  . "'"
            ]);
    }
}
