<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /* Usando um middleware para todo o controller
        public function __construct()
        {
            $this->middleware('auth');
        }
    */

    /* Aplicando middleware somente nos métodos que eu preciso
        public function __construct()
        {
            $this->middleware('auth')->only('index');
        }
    */

    /* Aplicando middleware com excessões de alguns métodos
        public function __construct()
        {
            $this->middleware('auth')->except(['index', 'contato']);
        }
    */
        
    public function index() 
    {
        return view('admin.dashboard');
    }
}
