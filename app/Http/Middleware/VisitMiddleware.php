<?php

namespace App\Http\Middleware;

use Closure;

use App\Models\Visit;
use Illuminate\Http\Request;

class VisitMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /* User's IP adress */
        $ip = request()->ip();

        /* Visits counter */
        $visits = Visit::firstOrCreate(
          ['date' => date(now()->toDateString())],
          ['count' => 0]
        );

        $visits->increment('count');

        return $next($request);
    }
}
