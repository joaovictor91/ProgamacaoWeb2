<?php

namespace App\Providers;

use ConsoleTVs\Charts\Registrar;
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
    public function boot(Registrar $registrar)
    {
        $registrar->register([
            \App\Charts\GraficoProduto::class
        ]);
    }
}
