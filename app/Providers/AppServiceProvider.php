<?php

namespace App\Providers;

use App\Models\Categoria;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Fazendo isso coneguimos acessar essa chave e seus dados em todas as views
        $categoriasMenu = Categoria::all();
        view()->share('categoriasMenu', $categoriasMenu);
    }
}
