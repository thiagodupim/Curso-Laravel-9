<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return redirect()->route('admin.dashboard');
//     //return view('welcome');
// });

// Route::get('/empresa', function(){
//     return view('site/empresa');
// });

// // Ao invés do código acima, podemos fazer:
// Route::view('/empresa', 'site/empresa');

// Route::any('/any', function(){
//     return "Permite todo tipo de acesso http (put, delete, get, post)";
// });

// Route::match(['get', 'post'], '/match', function(){
//     return "Permite apenas acessos definidos";
// });

// Route::get('/produto/{id}/{cat?}', function($id, $cat = ''){
//     return "O id do produto é:".$id."<br>"."A categoria é:".$cat;
// });

// Route::get('/sobre', function(){
//     return redirect('/empresa');
// });

// // Ao invés do código acima, podemos fazer:
// Route::redirect('/sobre', '/empresa');

// Route::get('/timesnownews', function(){
//     return view('news');
// })->name('noticias');

// Route::get('/novidades', function(){
//     return redirect()->route('noticias');
// });

// // Usando grupo de rotas com prefixo
// Route::prefix('admin')->group(function(){

//     Route::get('dashboard', function(){
//         return "dashboard";
//     });

//     Route::get('users', function(){
//         return "users";
//     });

//     Route::get('clientes', function(){
//         return "clientes";
//     });
// });

// // Usando grupo de rotas com nome
// Route::name('admin.')->group(function(){

//     Route::get('admin/dashboard', function(){
//         return "dashboard";
//     })->name('dashboard');

//     Route::get('admin/users', function(){
//         return "users";
//     })->name('users');

//     Route::get('admin/clientes', function(){
//         return "clientes";
//     })->name('clientes');
// });

// Route::group([
//     'prefix' => 'admin',
//     'as' => 'admin.'
// ], function(){
    
//     Route::get('dashboard', function(){
//         return "dashboard";
//     })->name('dashboard');

//     Route::get('users', function(){
//         return "users";
//     })->name('users');

//     Route::get('clientes', function(){
//         return "clientes";
//     })->name('clientes');
// });

Route::resource('produtos', ProdutoController::class);

Route::get('/', [SiteController::class, 'index'])->name('site.index');