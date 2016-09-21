<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class ApiCustomMiddleware
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
      $token = $request->input('api_token');

      if (! $token)
        throw new \Exception('Token não passado');

      $user = User::where('api_token', $token)->first();

      if (! $user)
        throw new \Exception('O Token não é válido');

      return $next($request);
    }
}
