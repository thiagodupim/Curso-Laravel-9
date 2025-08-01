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
}
