<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Genre;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $genres = Genre::where('delete_flag', false)->get();

        config(['app.genres' => $genres]);
    }
}
