<?php

namespace App\Providers;

use App\Models\Statistic;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
    public function boot(): void
    {
        $stat = Statistic::firstOrCreate([], ['total_views' => 0, 'active_services' => 22]);
        View::share('stat', $stat);
        Blade::component('components.carousel', 'carousel');
    }
}
