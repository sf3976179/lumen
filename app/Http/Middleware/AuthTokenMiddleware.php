<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class AuthTokenMiddleware
{
    /**
     * Handle an incoming request.
     * 允许请求过滤器
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
          // 允许通过中间件
          return $next($request);
        }else{
          abort('401');
        }
    }
}
