<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

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

        return view('site.details', compact('produto'));
    }

    public function categoria($id) 
    {
        //Usar o método get pois precisamos resgatar todos que tem o id de seleecionada categoria
        $produtos = Produto::where('id_categoria', $id)->get();
        $produtos = Produto::where('id_categoria', $id)->paginate();
        
        return view('site.categoria', compact('produtos'));
    }
}
