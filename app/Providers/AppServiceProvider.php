<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

use Illuminate\Pagination\Paginator;

use App\Models\Design;
use App\Models\Page;

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
      Paginator::useBootstrap();

      /* Custom style on all views */
      // View::share([
      //   'design' => Design::where('active', 1)->first(),
      //   'pages' => Page::where('title', '!=', 'A-propos')->get(),
      // ]);

      View::composer('*', function ($view) {
        $view->with('design', Design::where('active', 1)->first())
        ->with('pages', Page::where('title', '!=', 'A-propos')->get());
      });
    }
}
