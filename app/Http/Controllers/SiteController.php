<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SiteController extends Controller
{
    public function index()
    {
        // return "index";

        $produtos = Produto::paginate(3);

        return view('site.home', compact('produtos'));
    }

    public function details($slug)
    {
        // Usar o método first pois precisamos apenas de um produto em especifico
        $produto = Produto::where('slug', $slug)->first();

        // Gate::authorize('ver-produto', $produto);
        $this->authorize('verProduto', $produto);

        return view('site.details', compact('produto'));
    }

    public function categoria($id) 
    {
        $categoria = Categoria::find($id); // Find consegue buscar a categoria pelo seu id

        /*Usar o método get pois precisamos resgatar todos que tem o id de seleecionada categoria
        $produtos = Produto::where('id_categoria', $id)->get(); */
        $produtos = Produto::where('id_categoria', $id)->paginate(3);
        
        return view('site.categoria', compact('produtos', 'categoria'));
    }
}
