<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
       $usuarios = User::all()->count();

       // Gráfico 1 - usuários
        $userData = User::select([
            DB::raw('YEAR(created_at) as ano'), // Tras apenas o ano da tabela created_at
            DB::raw('COUNT(*) as total')
        ])
        ->groupBy('ano')
        ->orderBy('ano', 'asc')
        ->get();

        // Preparar arrays
        foreach ($userData as $user) {
            $ano[] = $user->ano;
            $total[] = $user->total;
        }

        // Formatar para chartJS
        $userLabel = "'Comparativo de cadastros de usuários'";
        $userAno = implode(',', $ano); // Converte o array de anos em uma váriavel e vai separar por vírgula
        $userTotal = implode(',', $total);

        // Gráfico 2 - categorias
        $catData = Categoria::all();

        // Preparar array
         foreach ($catData as $cat) {
             $catNome[] = "'".$cat->nome."'";
             $catTotal[] = Produto::where('id_categoria', $cat->id)->count();
         }

        // Formatar para chartJS
        $catLabel = implode(',', $catNome);
        $catTotal = implode(',', $catTotal);

        return view('admin.dashboard', compact('usuarios', 'userLabel', 'userAno', 'userTotal', 'catLabel', 'catTotal'));
    }
}
