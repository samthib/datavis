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
      /* Use of View::composer in the guest area for the tests*/
      if (Str::contains(url()->current(), 'admin')) {
        View::share([
            'design' => Design::where('active', 1)->first(),
            'footerPages' => Page::where('title', '!=', 'A-propos')->get(),
          ]);
      } else {
        View::composer('*', function ($view) {
          $view->with('design', Design::where('active', 1)->first())
               ->with('footerPages', Page::where('title', '!=', 'A-propos')->get());
        });
      }
    }
}
