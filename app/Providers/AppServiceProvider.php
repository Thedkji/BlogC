<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

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
        $dataCate = Category::orderByDesc('id')->get();

        $dataTag = Tag::orderByDesc('id')->get();

        view()->share(compact('dataCate', 'dataTag'));
    }
}
