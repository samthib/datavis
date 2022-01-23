<?php

namespace App\Providers;

use App\Models\Page;

use App\Models\Design;

use Illuminate\Support\Str;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
      Paginator::useBootstrap();
      
      /* Custom style on all views */
      // View::share([
        //   'design' => Design::where('active', 1)->first(),
        //   'pages' => Page::where('title', '!=', 'A-propos')->get(),
        // ]);
        
        View::composer('*', function ($view) {
          /* Designs parts for Guests */
          if (!Str::contains(url()->current(), 'admin')) {
            $view->with('design', Design::where('active', 1)->first())
                 ->with('pages', Page::where('title', '!=', 'A-propos')->get());
          }
        });

    }
}
