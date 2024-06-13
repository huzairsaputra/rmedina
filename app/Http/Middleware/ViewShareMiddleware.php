<?php

namespace App\Http\Middleware;

use App\Models\Config;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ViewShareMiddleware
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
        $configs = Config::query()->get(['key', 'value'])->pluck('value', 'key');
        View::share('config', $configs);

        return $next($request);
    }
}
