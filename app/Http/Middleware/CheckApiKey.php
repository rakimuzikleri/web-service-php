<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Input;
class CheckApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $api_key = Input::get('api_key');
        if($api_key != '2')
            return Response()->json(array('message' => 'There is no api key!'),404);
        else
            return $next($request);

    }
}
